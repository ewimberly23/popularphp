<p align="center">
    <h1 align="center">PopularPHP</h1>
    <br>
    An application that displays popular GitHub PHP projects.
</p>



APPLICATION STACK
-----------------

PopularPHP uses the [Yii 2](http://www.yiiframework.com/) framework.



INSTALLATION
------------

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).



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

1. Initialize vendor dir:

    ```
    cd popularphp
    composer install
    ```

2. Initialize the database tables:

    ```
    yii migrate
    ```

3. Load initial data:

    ```
    yii git-hub
    ```

4. Start web server:

    ```
    yii serve
    ```

