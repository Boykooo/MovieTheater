<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/admin_authenticate.php");
require "../../../controller/FilmController.php";

$filmController = new FilmController();
$filmController->deleteById($_POST["id"]);
header('Location: list.php' );