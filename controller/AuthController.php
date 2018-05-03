<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/Account.php";
require_once "$root/controller/AccountController.php";

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

        $accountController = new AccountController();
        $account = $accountController->getByEmailAndPassword($email, $password);
        if ($account == null) {
            $this->logout();
        } else {
            $_SESSION[$this->tokenKey] = $account->token;
        }
    }

    public function authenticate() {
        $token = $_SESSION[$this->tokenKey];
        $accountController = new AccountController();
        $account = $accountController->getByToken($token);
        if ($account == null) {
            $this->logout();
        }
    }

    public function adminAuthenticate() {
        $token = $_SESSION[$this->tokenKey];
        $accountController = new AccountController();
        $account = $accountController->getByToken($token);
        if ($account == null || $account->role != 'ADMIN') {
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
        header("Location: /MovieTheater/view/welcome.php");
    }

}

