<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");
require_once "../../../controller/FilmController.php";
require_once "../../../entity/Film.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (array_key_exists("cancel", $_POST)) {
        header('Location: list.php');
        exit;
    } else {
        $film = new Film();
        $film->name = $_POST["name"];
        $film->start_date = $_POST["start_date"];
        $film->end_date = $_POST["end_date"];
        $film->pg = $_POST["pg"];
        $film->director = $_POST["director"];
        $film->stars = $_POST["stars"];
        $film->genre = $_POST["genre"];
        $film->duration = $_POST["duration"];
        $film->description = $_POST["description"];
        $film->production = $_POST["production"];
        $film->img_href = $_POST["img_href"];
        $filmController = new FilmController();
        $filmController->createFilm($film);
        header('Location: list.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>New Film</title>
</head>
<body>
<?php
require "../../templates/header.php";
?>

<form action="new.php" method="POST">
    <div class="form-group row">
        <label for="name" class="col-sm-1 col-form-label text-right">Name</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="start_date" class="col-sm-1 col-form-label text-right">Start Date</label>
        <div class="col-sm-2">
            <input type="date" name="start_date" id="start_date" class="form-control" required/>
        </div>
    </div>

    <div class="form-group row">
        <label for="end_date" class="col-sm-1 control-label text-right">End Date *</label>
        <div class="col-sm-2">
            <input type="date" name="end_date" id="end_date" class="form-control" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="pg" class="col-sm-1 control-label text-right">PG *</label>
        <div class="col-sm-2">
            <input type="number" name="pg" id="pg" placeholder="Parental Guidance"
                   class="form-control" min="0" max="21" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="director" class="col-sm-1 control-label text-right">Director *</label>
        <div class="col-sm-2">
            <input type="text" name="director" id="director" placeholder="Director"
                   class="form-control" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="stars" class="col-sm-1 control-label text-right">Stars *</label>
        <div class="col-sm-2">
            <textarea name="stars" id="stars" cols="33" rows="6" placeholder="Stars"
                      class="form-control" required></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="genre" class="col-sm-1 control-label text-right">Genre *</label>
        <div class="col-sm-2">
            <input type="text" name="genre" id="genre" placeholder="Genre"
                   class="form-control" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="duration" class="col-sm-1 control-label text-right">Duration *</label>
        <div class="col-sm-2">
            <input type="time" name="duration" id="duration" placeholder="HH:MM:SS"
                   class="form-control" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-1 control-label text-right">Description *</label>
        <div class="col-sm-2">
            <textarea name="description" id="description" cols="33" rows="6"
                      placeholder="Description"
                      class="form-control" required></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="production" class="col-sm-1 control-label text-right">Production *</label>
        <div class="col-sm-2">
            <input type="text" name="production" id="production" placeholder="Production"
                   class="form-control" required/>
        </div>
    </div>
    <div class="form-group row">
        <label for="img_href" class="col-sm-1 control-label text-right">Image Link *</label>
        <div class="col-sm-2">
            <input type="url" name="img_href" id="img_href" placeholder="Image link"
                   class="form-control" required/>
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