<?php session_start() ?>
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

<div class="container">
    <div class="row" >
        <div class="col-md-12" style="text-align: center">
            <h1><?php echo $event->name ?></h1>
        </div>
        <div class="col-md-5" style="margin-top: 30px">
            <img src="<?php echo $event->img_href ?>" alt="Poster not found" width="350" height="480"/>
        </div>
        <div class="col-md-6">
            <div style="font-size: 18px; margin-top: 30px;">
                <div style="margin-top: 30px">
                    <h4>Дата</h4>
                    <?php echo $event->date ?>
                    <h4>Время</h4>
                    <?php echo $event->time ?>
                    <h4>Продолжительность</h4>
                    <?php echo $event->duration ?>
                    <h4>Описание</h4>
                    <?php echo $event->description ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>