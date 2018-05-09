<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");

require "../../templates/header.php";
require "../../../controller/EventController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Events</title>
</head>
<body>
<div class="container-flood">
    <div style="margin: auto; width: 65%">
        <a href="new.php">
            <button class="btn btn-primary edit-button">New Event</button>
        </a>
        <h2>Events</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Description</th>
                <th>Img href</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <?php
            $eventController = new EventController();
            $events = $eventController->getEvents();
            foreach ($events as $event):?>
                <tr class="th-limit-words" style="overflow: hidden">
                    <td><?php echo $event->name ?></td>
                    <td><?php echo $event->date ?></td>
                    <td><?php echo $event->time ?></td>
                    <td><?php echo $event->duration ?></td>
                    <td><span class="limit-words"><?php echo $event->description ?></span></td>
                    <td><span class="limit-words"><?php echo $event->img_href ?></span></td>
                    <td>
                        <form action="edit.php" method="GET">
                            <input type="hidden" value="<?php echo $event->id ?>" name="id">
                            <button class="btn btn-primary edit-button">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete.php" method="POST">
                            <input type="hidden" value="<?php echo $event->id ?>" name="id">
                            <button class="btn btn-primary edit-button">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>