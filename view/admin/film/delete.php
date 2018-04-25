<?php
require "../../../controller/FilmController.php";

$filmController = new FilmController();
$filmController->deleteById($_POST["id"]);
header('Location: ../admin_panel.php' );