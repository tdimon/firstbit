<?php
require_once 'vendor/autoload.php';
class_alias('\RedBeanPHP\R', '\R');

class Model
{
    public static function init()
    {
        $fileName = __HOME__ . '/settings.json';
        if (!file_exists($fileName)) {
            $settings = [
                'host' => 'localhost',
                'dbname' => 'testSQL',
                'login' => 'root',
                'password' => ''
            ];
            file_put_contents($fileName, json_encode($settings));
        }
        $fileSettings = json_decode(file_get_contents($fileName), true);
        $host = $fileSettings['host'];
        $dbName = $fileSettings['dbname'];
        $login = $fileSettings['login'];
        $password = $fileSettings['password'];

        R::setup("mysql:host=$host;dbname=$dbName", $login, $password);
        if(!R::testConnection()) die('No DB connection!');

        R::ext('xdispense', function( $type ){
            return R::getRedBean()->dispense( $type );
        });
    }
}