<?php session_start() ?>
<?php
include "templates/header.php";
include "../controller/EventController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Events</title>
</head>
<body>
<div class="container">
    <h3>События</h3>
    <hr class="my-4">
    <div class="col-md-12">
        <div class="row">
            <?php
            $eventController = new EventController();
            $events = $eventController->getActualEvents();
            foreach ($events as $event): ?>
                <div class="col-sm-4">
                    <div class="card text-center mb-3">
                        <img class="card-img-top" src="<?php echo $event->img_href ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $event->name ?></h5>
                            <div class="card-text">
                                <b>
                                    Дата: <?php echo $event->date ?> <br/>
                                    Время: <?php echo $event->time ?> <br/>
                                    <form action="event.php" method="GET">
                                        <input type="hidden" name="id" value="<?php echo $event->id ?>">
                                        <button class="btn btn-primary details-button">Подробнее</button>
                                    </form>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>