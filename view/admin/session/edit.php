<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/admin_authenticate.php");
require_once "../../../controller/SessionController.php";
require_once "../../../controller/FilmController.php";
require_once "../../../controller/HallController.php";
require_once "../../../entity/Session.php";
$sessionController = new SessionController();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (array_key_exists("cancel", $_POST)) {
        header('Location: list.php');
        exit;
    } else if ($_POST["id"] != "") {
        $session = new Session();
        $session->id = $_POST["id"];
        $session->date = $_POST["date"];
        $session->time = $_POST["time"];
        $session->cost = $_POST["cost"];
        $session->film_id = $_POST["film"];
        $session->hall_id = $_POST["hall"];

        $sessionController->updateSessionWithSessionsInfo($session);
        header('Location: list.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Edit Session</title>
</head>
<body>
<?php
require "../../templates/header.php";

$id = $_GET["id"];
$session = $sessionController->findById($id);
$filmController = new FilmController();
$films = $filmController->getActualFilms();
$hallController = new HallController();
$halls = $hallController->getHalls();
?>
<form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $session->id; ?>"/>
    <div class="form-group row">
        <label for="date" class="col-sm-1 col-form-label text-right">Date</label>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="date" name="date" placeholder="Date"
                   value="<?php echo $session->date ?>" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="time" class="col-sm-1 col-form-label text-right">Time</label>
        <div class="col-sm-2">
            <input type="time" class="form-control" id="time" name="time" placeholder="Time"
                   value="<?php echo $session->time ?>" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="cost" class="col-sm-1 col-form-label text-right">Cost</label>
        <div class="col-sm-2">
            <input type="number" class="form-control" id="cost" name="cost" placeholder="Cost"
                   value="<?php echo $session->cost ?>" min="0" max="5000" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="film" class="col-sm-1 col-form-label text-right">Film</label>
        <div class="col-sm-2">
            <select class="custom-select" id="film" name="film">
                <?php foreach ($films as $film): ?>
                    <option value="<?php echo $film->id ?>" <?php if ($film->id == $session->film_id) echo "selected" ?>>
                        <?php echo $film->name ?>
                    </option>
                <? endforeach ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="hall" class="col-sm-1 col-form-label text-right">Hall</label>
        <div class="col-sm-2">
            <select class="custom-select" id="hall" name="hall">
                <?php foreach ($halls as $hall): ?>
                    <option value="<?php echo $hall->id ?>" <?php if ($hall->id == $session->hall_id) echo "selected" ?>>
                        <?php echo $hall->name ?>
                    </option>
                <? endforeach ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 text-right">
            <button class="btn btn-primary" name="update">Update</button>
            <button class="btn btn-primary" name="cancel" formnovalidate>Cancel</button>
        </div>
    </div>
</form>
</body>
</html>