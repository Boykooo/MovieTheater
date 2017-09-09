<?php

class Database
{
    // get the database connection
    public static function getConnection()
    {
        $host = "localhost";
        $db_name = "movietheater";
        $username = "root";
        $password = "root";


        $conn = null;
        try {
//            $conn = new PDO(
//                "mysql:host=$host;dbname=$db_name;charset=utf8;",
//                $username,
//                $password,
//                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8; ")
//            );
//            $conn->exec("SET NAMES 'utf8'");

            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8 ',
            );

            $conn = new PDO("mysql:host=$host;dbname=$db_name;", $username, $password, $options);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $conn;
    }
}