<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");
require "../../../controller/FilmController.php";

$filmController = new FilmController();
$filmController->deleteById($_POST["id"]);
header('Location: list.php' );