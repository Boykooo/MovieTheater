<?php
session_start();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/controller/AuthController.php";
$authController = new AuthController();
$authController->logout();
?>

