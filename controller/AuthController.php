<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/exception/AccountNotFoundException.php";
require_once "$root/util/DebugHelper.php";
require_once "$root/entity/Account.php";

class AuthController {

    private $tokenKey = 'Auth-Token';

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];
        }
        if (empty($email) || empty($password)) {
            return;
        }

        $connection = Database::getConnection();
        $statement = $connection->prepare("SELECT * from account WHERE email = :email AND password = :password");
        $statement->execute(['email' => $email, 'password' => $password]);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Account');
        $account = $statement->fetch();
        if ($account == null) {
            $this->logout();
        } else {
            $_SESSION[$this->tokenKey] = $account->token;
        }
    }

    private function findByToken($token) {
        if ($token == null || empty($token)) {
            return null;
        }
        $connection = Database::getConnection();
        $statement = $connection->prepare("select * from account where token = :token");
        $statement->execute(['token' => $token]);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Account');
        $account = $statement->fetch();
        return $account;
    }

    public function authenticate() {
        $token = $_SESSION[$this->tokenKey];
        $account = $this->findByToken($token);
        if ($account == null) {
            $this->logout();
        }
    }

    public function isAuthenticated() {
        return $_SESSION[$this->tokenKey] != null;
    }

    private function destroySession() {
        if ($_SESSION[$this->tokenKey] != null) {
            unset($_SESSION[$this->tokenKey]);
            session_destroy();
        }
    }

    public function logout() {
        $this->destroySession();
        header("Location: /view/welcome.php");
    }

}

