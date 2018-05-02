<?php
session_start();
include "templates/header.php";
include "../controller/FilmController.php";
include "../controller/SessionController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Sessions</title>
</head>
<body>
<div class="container">
    <h3>Сеансы</h3>
    <hr class="my-4">
    <div class="col-md-12">
        <?php
        $filmController = new FilmController();
        $sessionController = new SessionController();
        $films = $filmController->getFilms();
        foreach ($films as $film): ?>
            <div class="row">
                <div class="col-md-4">
                    <a href="film.php?id=<?php echo $film->id ?>" style="color: black">
                        <h4><?php echo $film->name ?></h4>
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <?php
                        $sessions = $sessionController->findByFilmId($film->id);
                        foreach ($sessions as $session):?>
                            <div class="col-md-2 text-center border border-primary rounded schedule">
                                <a href="session.php?id=<?php echo $session->id ?>" style="color: black">
                                    <h4><?php echo date('H:i', strtotime($session->time)) ?></h4>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <br/><br/>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>