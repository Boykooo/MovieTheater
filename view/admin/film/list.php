<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");

require "../../templates/header.php";
require "../../../controller/FilmController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Films</title>
</head>
<body>
<div class="container-flood">
    <div style="margin: auto; width: 80%">
        <a href=" new.php">
            <button class="btn btn-primary edit-button">New Film</button>
        </a>
        <h2>Films</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Start date</th>
                <th>End date</th>
                <th>PG</th>
                <th>Director</th>
                <th>Stars</th>
                <th>Genre</th>
                <th>Duration</th>
                <th>Description</th>
                <th>Production</th>
                <th>Img href</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <?php
            $filmController = new FilmController();
            $films = $filmController->getFilms();
            foreach ($films as $film):?>
                <tr class="th-limit-words" style="overflow: hidden">
                    <td><?php echo $film->name ?></td>
                    <td><?php echo $film->start_date ?></td>
                    <td><?php echo $film->end_date ?></td>
                    <td><?php echo $film->pg ?></td>
                    <td><?php echo $film->director ?></td>
                    <td><span class="limit-words"><?php echo $film->stars ?></span></td>
                    <td><?php echo $film->genre ?></td>
                    <td><?php echo $film->duration ?></td>
                    <td><span class="limit-words"><?php echo $film->description ?></span></td>
                    <td><?php echo $film->production ?></td>
                    <td><span class="limit-words"><?php echo $film->img_href ?></span></td>
                    <td>
                        <form action="edit.php" method="GET">
                            <input type="hidden" value="<?php echo $film->id ?>" name="id">
                            <button class="btn btn-primary edit-button">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete.php" method="POST">
                            <input type="hidden" value="<?php echo $film->id ?>" name="id">
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