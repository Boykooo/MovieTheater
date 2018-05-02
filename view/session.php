<?php
session_start();
include "templates/header.php";
include "../controller/FilmController.php";
include "../controller/SessionController.php";
include "../controller/HallController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Session</title>
</head>
<?php
$filmController = new FilmController();
$sessionController = new SessionController();
$hallController = new HallController();

$session = $sessionController->findById($_GET["id"]);
$film = $filmController->findById($session->film_id);
$hall = $hallController->findById($session->hall_id);
?>
<body>
<div class="container">
    <h3>Сеанс</h3>
    <hr class="my-4">
    <div style="font-size: 20px">
        <a href="film.php?id=<?php echo $film->id ?>" style="color: black">
            <?php echo $film->name ?>
        </a>
        <br/>
        <?php echo date('H:i, ', strtotime($session->time)) . date('j.m, ', strtotime($session->date)) . $hall->name ?>
    </div>
</div>
</body>
</html>