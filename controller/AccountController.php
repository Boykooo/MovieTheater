<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/Account.php";


class AccountController {

    public function getAccount() {
        $config = include($_SERVER["DOCUMENT_ROOT"] . "/config.php");
        $token = $_SESSION[$config['tokenKey']];
        if (empty($token)) {
            return null;
        }
        return $this->getByToken($token);
    }

    public function getByEmailAndPassword($email, $password) {
        $connection = Database::getConnection();
        $statement = $connection->prepare("SELECT * from account WHERE email = :email AND password = :password");
        $statement->execute(['email' => $email, 'password' => $password]);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Account');
        $account = $statement->fetch();
        $connection = null;
        return $account;
    }

    public function getByToken($token) {
        if ($token == null || empty($token)) {
            return null;
        }
        $connection = Database::getConnection();
        $statement = $connection->prepare("select * from account where token = :token");
        $statement->execute(['token' => $token]);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Account');
        $account = $statement->fetch();
        $connection = null;
        return $account;
    }

}