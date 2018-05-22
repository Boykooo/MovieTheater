<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/admin_authenticate.php");

require "../templates/header.php";
require "../../controller/FilmController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Control panel</title>
</head>
<body>
<div class="container">
    <h3>Control panel</h3>
    <hr class="my-4">
    <div class="row">
        <a class="col-md-3 shadow-lg admin-block rounded border border-primary" href="film/list.php"
           style="color: black"><h3>Films</h3></a>
        <div class="col-md-1"></div>
        <a class="col-md-4 shadow-lg admin-block rounded border border-primary" href="session/list.php"
           style="color: black"><h3>Sessions</h3></a>
        <div class="col-md-1"></div>
        <a class="col-md-3 shadow-lg admin-block rounded border border-primary" href="event/list.php"
           style="color: black"><h3>Events</h3></a>
    </div>
</div>
</body>
</html>