<?php

class DB
{
    public static $connection;
    public static function connect()
    {
        self::$connection = new mysqli('localhost', 'root', '', 'db_coffee');

        if (self::$connection->connect_error) {
            die("Connection failed: " . self::$connection->connect_error);
        }
        return self::$connection;
    }
}
