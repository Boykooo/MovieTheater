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
<div class="container-fluid block">
    <div class="row">
        <div class=" col-md-2"></div>
        <div class=" col-md-10">
            <div>
                <h3>События</h3>
            </div>
            <div class="container block col-md-12" style="margin-top: 10px">
                <?php
                $eventController = new EventController();
                $events = $eventController->getEvents();
                foreach ($events as $event): ?>
                    <div class="film">
                        <div class="panel panel-default col-md-5">
                            <b>
                                <div class="panel-heading"><?php echo $event->name ?></div>
                                <div class="panel-body">
                                    <img src="<?php echo $event->img_href ?>" alt="Poster not found" width="300"
                                         height="440">
                                    <br/> <br/>
                                    Дата: <?php echo $event->date ?> <br/>
                                    Время: <?php echo $event->time ?> <br/>
                                    <form action="event.php" method="GET">
                                        <input type="hidden" name="id" value="<?php echo $event->id ?>">
                                        <button class="btn btn-primary details-button">Подробнее</button>
                                    </form>
                                </div>
                            </b>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>