<?php

require_once "../../../controller/FilmController.php";
require_once "../../../entity/Film.php";

$film = new Film();
$film->name = $_POST["name"];
$film->start_date = $_POST["start_date"];
$film->end_date = $_POST["end_date"];
$film->pg = $_POST["pg"];
$film->director = $_POST["director"];
$film->stars = $_POST["stars"];
$film->genre = $_POST["genre"];
$film->duration = $_POST["duration"];
$film->description = $_POST["description"];
$film->production = $_POST["production"];
$film->img_href = $_POST["img_href"];

$filmController = new FilmController();
$filmController->createFilm($film);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>test</title>
</head>
<body>
<form id="myform" action="../admin_panel.php" method="post">
</form>
<script type="text/javascript">
    document.getElementById('myform').submit();
</script>
</body>
</html>


