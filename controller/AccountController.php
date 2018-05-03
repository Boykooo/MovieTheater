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
        if (empty($token)) {
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

    public function createAccount(Account $account) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('INSERT INTO account(email, firstname, lastname, reg_date, token, role, password)
            VALUES (:email, :firstname, :lastname, :reg_date, :token, :role, :password)');
        $statement->execute(array(
            'email' => $account->email,
            'firstname' => $account->firstname,
            'lastname' => $account->lastname,
            'reg_date' => $account->reg_date,
            'token' => $account->token,
            'role' => $account->role,
            'password' => $account->password,
        ));
        $connection = null;
    }

    public function findByEmail($email) {
        $connection = Database::getConnection();
        $statement = $connection->prepare("select * from account where email = :email");
        $statement->execute(['email' => $email]);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Account');
        $account = $statement->fetch();
        $connection = null;
        return $account;
    }

}