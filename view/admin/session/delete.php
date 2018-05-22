<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");
require "../../../controller/SessionController.php";

$sessionController = new SessionController();
$sessionController->deleteByIdWithSessionsInfo($_POST["id"]);
header('Location: list.php');