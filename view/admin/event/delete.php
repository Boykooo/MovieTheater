<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");
require "../../../controller/EventController.php";

$eventController = new EventController();
$eventController->deleteById($_POST["id"]);
header('Location: list.php');