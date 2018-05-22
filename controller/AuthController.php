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
        $account = $accountController->getByEmailAndPassword($email, sha1($password));
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

        return $account;
    }

    public function adminAuthenticate() {
        if (!$this->isAdminAuthenticated()) {
            $this->logout();
        }
    }

    public function isAdminAuthenticated() {
        $token = $_SESSION[$this->tokenKey];
        $accountController = new AccountController();
        $account = $accountController->getByToken($token);
        return $account != null || $account->role == 'ADMIN';
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

    public function handleRegister() {
        $accountController = new AccountController();
        $email = $_POST["email"];
        $accountByEmail = $accountController->findByEmail($email);
        if ($accountByEmail != null) {
            return false;
        }

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $password = $_POST["password"];
        $encryptPassword = sha1($password);
        $account = new Account();
        $account->firstname = $firstname;
        $account->lastname = $lastname;
        $account->email = $email;
        $account->password = $encryptPassword;
        $account->reg_date = date('Y-m-d');
        $account->role = 'USER';
        $account->token = $this->gen_uuid();

        $accountController->createAccount($account);

        $_SESSION[$this->tokenKey] = $account->token;

        return true;
    }

    private function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,

            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
}

