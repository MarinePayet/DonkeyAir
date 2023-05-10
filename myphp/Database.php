<?php

define('ENV', "test");

class DataBase 
{

    private static $instance = null;

    public static function getPdo()
    {
        if (self::$instance === null){
            self::$instance = new PDO('mysql:host=localhost; dbname=donkeyair', 'root', '', 
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        };
        return self::$instance;
    }



}