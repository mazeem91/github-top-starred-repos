<!-- View stored in resources/views/greeting.blade.php -->

<html>
    <body>
        <h1>Github Top Starred Repositories</h1>
        <form action="">
        <label for="language">Language:</label>
        <input type="text" id="language" name="language" value="{{ $oldInputs['language'] ?? '' }}"> 
        <label for="from_date">From Date:</label>
        <input type="date" id="from_date" name="from_date" value="{{ $oldInputs['from_date'] ?? '2020-01-10' }}">
        <label for="count">Quantity (between 1 and 100):</label>
        <input type="number" id="count" name="count" min="1" max="100" value="{{ $oldInputs['count'] ?? 5 }}"> 
        <input type="submit">
        <form>
        <ul>
            @foreach ($repos as $repo)
                <li>
                <p>{{ $repo['name'] }}  <span style="color:blue;"> "{{ $repo['language'] }}"</span></p>
                </li>

            @endforeach
        </ul> 
    </body>
</html>