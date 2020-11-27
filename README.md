# Github Top Starred Repos service

### **Setup instructions**

**Prerequisites:** 

* Depending on your OS, the appropriate version of Docker Community Edition has to be installed on your machine.  ([Download Docker Community Edition](https://hub.docker.com/search/?type=edition&offering=community))

**Installation steps:** 
1. Copy `.env.example` to `.env` in `src` DIR (and set the DB connection config):

    ```
    DB_HOST=mysql-db
    DB_PORT=3306
    DB_DATABASE=appdb
    DB_USERNAME=user
    DB_PASSWORD=myuserpass
    ```
2. Create two new textfiles named `db_root_password.txt` and `db_password.txt` and place your preferred database passwords inside:

    ```
    $ echo "myrootpass" > db_root_password.txt
    $ echo "myuserpass" > db_password.txt
    ```

3. Open a new terminal/CMD, navigate to this repository root (where `docker-compose.yml` exists) and execute the following command:

    ```
    $ docker-compose up -d
    ```


4. Give permission to `src/storage` DIR:

    ```
    $ chmod -R 777 src/storage/
    ```
5. After the whole stack is up, enter the app container and install PHP dependencies:
    ```
    $ docker exec -it app bash
    $ composer install
    ```
6. That's it! Navigate to [http://localhost](http://localhost) to access the application.
