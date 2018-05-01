<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Event</title>
</head>
<body>

<?php include "templates/header.php"; ?>
<?php include "../controller/EventController.php"; ?>

<?php
$eventController = new EventController();
$id = $_GET["id"];
$event = $eventController->findById($id);
?>
<div class="container-fluid" style="width: 100%">
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="film">
                <div class="panel panel-default col-md-6">
                    <div class="panel-heading"><b><?php echo $event->name ?></b></div>
                    <div class="panel-body">
                        <img src="<?php echo $event->img_href ?>" alt="Poster not found" width="300" height="440"> <br/> <br/>
                        <b>Дата:</b> <?php echo $event->date ?> <br/>
                        <b>Время:</b> <?php echo $event->time ?> <br/>
                        <b>Продолжительность:</b> <?php echo $event->duration ?> <br/>
                        <b>Описание:</b> <?php echo $event->description ?> <br/>
                        <a href="events.php">
                            <button class="btn btn-primary"><b>Назад</b></button>
                        </a>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>