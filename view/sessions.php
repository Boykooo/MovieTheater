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
        $days = array(
            $today = new DateTime(),
            $tomorrow = new DateTime('+1 day'),
            $day_after_tomorrow = new DateTime('+2 day')
        );
        ?>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="font-size: 18px">
            <?php
            $isActive = true;
            foreach ($days as $day):?>
                <li class="nav-item">
                    <a class="nav-link <?php if ($isActive) {
                        echo "active show";
                        $isActive = false;
                    } ?>" id="pills-<?php echo $day->format("d") ?>-tab" data-toggle="pill"
                       href="#pills-<?php echo $day->format("d") ?>" role="tab"
                       aria-controls="pills-<?php echo $day->format("d") ?>" aria-selected="true"
                       style="font-weight: bold">
                        <?php
                        echo $day->format("d.m");
                        ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <?php
            $filmController = new FilmController();
            $sessionController = new SessionController();
            $films = $filmController->getActualFilms();
            $isActive = true;
            foreach ($days as $day):?>
                <div class="tab-pane fade <?php if ($isActive) {
                    echo "show active";
                    $isActive = false;
                } ?>" id="pills-<?php echo $day->format("d") ?>" role="tabpanel"
                     aria-labelledby="pills-<?php echo $day->format("d") ?>-tab">
                    <?php
                    foreach ($films as $film):
                        $sessions = $sessionController->findByFilmIdDate($film->id, $day->format('Y-m-d'));
                        if (empty($sessions)) {
                            continue;
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="film.php?id=<?php echo $film->id ?>" style="color: black">
                                    <h4><?php echo $film->name ?></h4>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <?php
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
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>