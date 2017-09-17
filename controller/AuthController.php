<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/exception/AccountNotFoundException.php";

class AuthController
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function login($email, $password)
    {
        $query = "select * from account where email = '$email' and password = '$password'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row == null) {
            throw new AccountNotFoundException();
        }

        return $row["token"];
    }

    public function checkCredentials($token, $role){
        $account = $this->findByToken($token);
        return $account["role"] == $role;
    }

    private function findByToken($token) {
        $query = "select * from account where token = '$token'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row == null) {
            throw new AccountNotFoundException();
        }

        return $row;
    }
}

