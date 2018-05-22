<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/admin_authenticate.php");
require_once "../../../controller/SessionController.php";
require_once "../../../controller/FilmController.php";
require_once "../../../controller/HallController.php";
require_once "../../../entity/Session.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (array_key_exists("cancel", $_POST)) {
        header('Location: list.php');
        exit;
    } else {
        $session = new Session();
        $session->date = $_POST["date"];
        $session->time = $_POST["time"];
        $session->cost = $_POST["cost"];
        $session->film_id = $_POST["film"];
        $session->hall_id = $_POST["hall"];
        $sessionController = new SessionController();
        $sessionController->createSessionWithSessionsInfo($session);
        header('Location: list.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>New Session</title>
</head>
<body>
<?php
require "../../templates/header.php";

$filmController = new FilmController();
$films = $filmController->getActualFilms();
$hallController = new HallController();
$halls = $hallController->getHalls();
?>
<form action="new.php" method="POST">
    <div class="form-group row">
        <label for="date" class="col-sm-1 col-form-label text-right">Date</label>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="date" name="date" placeholder="Date" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="time" class="col-sm-1 col-form-label text-right">Time</label>
        <div class="col-sm-2">
            <input type="time" class="form-control" id="time" name="time" placeholder="Time" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="cost" class="col-sm-1 col-form-label text-right">Cost</label>
        <div class="col-sm-2">
            <input type="number" class="form-control" id="cost" name="cost" placeholder="Cost" min="0" max="5000" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="film" class="col-sm-1 col-form-label text-right">Film</label>
        <div class="col-sm-2">
            <select class="custom-select" id="film" name="film">
                <?php foreach ($films as $film): ?>
                    <option value="<?php echo $film->id ?>"><?php echo $film->name ?></option>
                <? endforeach ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="hall" class="col-sm-1 col-form-label text-right">Hall</label>
        <div class="col-sm-2">
            <select class="custom-select" id="hall" name="hall">
                <?php foreach ($halls as $hall): ?>
                    <option value="<?php echo $hall->id ?>"><?php echo $hall->name ?></option>
                <? endforeach ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 text-right">
            <button class="btn btn-primary" name="add">Add</button>
            <button class="btn btn-primary" name="cancel" formnovalidate>Cancel</button>
        </div>
    </div>
</form>
</body>
</html>