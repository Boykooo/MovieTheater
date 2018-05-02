<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");

require "../templates/header.php";
require "../../controller/FilmController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Movie Theater</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-5 shadow-lg film-block"><h3>Фильмы</h3></div>
        <div class="col-xs-1"></div>
        <div class="col-xs-5 bg-info film-block"><h3>События</h3></div>
    </div>
</div>
</body>
</html>