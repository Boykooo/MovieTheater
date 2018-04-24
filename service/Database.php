<?php

class Database {

    public static function getConnection() {
        $config = include($_SERVER["DOCUMENT_ROOT"] . "/config.php");
        $conn = null;
        try {
            $conn = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['name'] . ";", $config['user'], $config['pass'], $config['options']);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $conn;
    }
}