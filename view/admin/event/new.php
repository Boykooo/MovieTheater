<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");
require_once "../../../controller/EventController.php";
require_once "../../../entity/Event.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (array_key_exists("cancel", $_POST)) {
        header('Location: list.php');
        exit;
    } else {
        $event = new Event();
        $event->name = $_POST["name"];
        $event->date = $_POST["date"];
        $event->time = $_POST["time"];
        $event->duration = $_POST["duration"];
        $event->description = $_POST["description"];
        $event->img_href = $_POST["img_href"];
        $eventController = new EventController();
        $eventController->createEvent($event);
        header('Location: list.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>New Event</title>
</head>
<body>
<?php
require "../../templates/header.php";
?>
<form action="new.php" method="POST">
    <div class="form-group row">
        <label for="name" class="col-sm-1 control-label text-right">Name</label>
        <div class="col-sm-2">
            <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                   required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="date" class="col-sm-1 control-label text-right">Date</label>
        <div class="col-sm-2">
            <input type="date" name="date" id="date" class="form-control" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="time" class="col-sm-1 control-label text-right">Time</label>
        <div class="col-sm-2">
            <input type="time" name="time" id="time" class="form-control" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="duration" class="col-sm-1 control-label text-right">Duration</label>
        <div class="col-sm-2">
            <input type="time" name="duration" id="duration" class="form-control" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-1 control-label text-right">Description</label>
        <div class="col-sm-2">
                                <textarea name="description" id="description" cols="33" rows="6"
                                          placeholder="Description"
                                          class="form-control" required></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="img_href" class="col-sm-1 control-label text-right">Image Link</label>
        <div class="col-sm-2">
            <input type="url" name="img_href" id="img_href" placeholder="Image link"
                   class="form-control" required/>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3 text-right">
            <button class="btn btn-primary edit-button" name="add">Add</button>
            <button class="btn btn-primary edit-button" name="cancel" formnovalidate>Cancel</button>
        </div>
    </div>
</form>
</body>
</html>