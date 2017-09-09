<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>test</title>

    <script src="static/js/jquery-3.2.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="static/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/welcome.css">
</head>
<body>
<?php
require "navigation.html";
require "../controller/FilmController.php";

?>
<?php
$filmController = new FilmController();
$films = $filmController->getFilms();
$id =  $_GET["id"];
?>

<div class="container-fluid" style="margin: 0;">

</div>

<?php

//$filmController = new FilmController();
//
//echo json_encode($filmController->getFilms(), JSON_UNESCAPED_UNICODE);
//
?>

</body>
</html>



