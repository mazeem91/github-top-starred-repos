<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $repos = $this->fetchRepos(
            $request->input('from_date') ?: '2020-01-10',
            $request->input('count') ?: 5,
            $request->input('language')
        );

        return view('main', ['repos' => $repos, 'oldInputs' => $request->all()]);
    }

    /**
     * Get Repos from Github API
     *
     * @param string $fromDate
     * @param integer $resultCount
     * @param string $language
     * @return array
     */
    protected function fetchRepos(
        string $fromDate = '2020-01-10',
        int $resultCount = 5,
        string $language = null
    ):array {
        $repos = [];
        $languageParam = $language ? "language:$language " : "";

        $client = new Client(
            [
            'base_uri' => 'https://api.github.com/search/repositories',
            'timeout'  => 10.0,
            ]
        );
        $response = $client->get(
            "?q={$languageParam}created:>{$fromDate}&sort=stars&order=desc&page=1&per_page=$resultCount"
        );
        $result = json_decode($response->getBody(), true);

        if ($result) {
            foreach ($result['items'] as $item) {
                $repos[] = ['name' => $item['name'], 'language' => $item['language']];
            }
        }
        return $repos;
    }
}
