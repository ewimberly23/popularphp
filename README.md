<p align="center">
    <h1 align="center">PopularPHP</h1>
    <br>
    An application that displays popular GitHub PHP projects. 
</p>


APPLICATION STACK
-----------------

PopularPHP uses the [Yii 2](http://www.yiiframework.com/) framework.



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.



CONFIGURATION
-------------

### Database

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
- PopularPHP won't create the database for you, this has to be done manually before you can access it.


STARTUP
-------

1. Initialize the database tables:

    ```
    popularphp/yii migrate
    ```

2. Load initial data:

    ```
    popularphp/yii git-hub
    ```

3. Start web server:

    ```
    popularphp/yii serve
    ```
