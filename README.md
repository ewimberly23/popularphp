<p align="center">
    <h1 align="center">PopularPHP</h1>
    <br>
    An application that displays popular GitHub PHP projects.
</p>



APPLICATION STACK
-----------------

PopularPHP uses:
- [Yii 2](http://www.yiiframework.com/) framework
- Mysql



INSTALLATION
------------

[PHP](http://php.net/downloads.php) 7.0+
- Be sure your version includes [cURL](https://secure.php.net/manual/en/curl.installation.php).

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Install [Mysql](https://dev.mysql.com/downloads/mysql/), version 5.7.* or greater, if you do not have it.



CONFIGURATION
-------------

### Database

Create your database. Be sure to use the following default settings:

```mysql
CREATE DATABASE github CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
or
```mysql
CREATE DATABASE github CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
```


Edit the file `popularphp/config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=github',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8mb4',
];
```

**NOTES:** 
- The charset `utf8mb4` and collation `utf8mb4_unicode_ci/utf8mb4_bin` are critical!



STARTUP
-------

1. Initialize vendor dir:

    ```
    cd popularphp
    composer install
    ```

2. Initialize the database tables:

    ```
    yii migrate
    ```

3. Load initial data: (optional)

    ```
    yii git-hub
    ```

4. Start web server:

    ```
    yii serve
    ```

