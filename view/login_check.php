<?php
session_start();
require_once "../controller/AuthController.php";
$authController = new AuthController();
$authController->login();
header("Location: personal_area.php");
?>