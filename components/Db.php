<?php
define('DB_HOST','localhost');
define('DB_NAME','fitness-club');
define('DB_CHARSET','utf8');
define('DB_USERNAME','root');
define('DB_PASSWORD','8571');

class Db{
    public static function getConnection(){
        $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";dbcharset=".DB_CHARSET,DB_USERNAME,DB_PASSWORD);
        return $db;
    }
}