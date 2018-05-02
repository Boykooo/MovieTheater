<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/controller/AuthController.php";
$authController = new AuthController();
$authController->adminAuthenticate();
?>