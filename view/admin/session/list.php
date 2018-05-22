<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");

require "../../templates/header.php";
require "../../../controller/SessionController.php";
require "../../../controller/FilmController.php";
require_once "../../../controller/HallController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Sessions</title>
</head>
<body>
<div class="container-flood">
    <div style="margin: auto; width: 45%">
        <a href="new.php">
            <button class="btn btn-primary edit-button">New Session</button>
        </a>
        <h2>Sessions</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Cost</th>
                <th>Film</th>
                <th>Hall</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <?php
            $sessionController = new SessionController();
            $filmController = new FilmController();
            $hallController = new HallController();
            $sessions = $sessionController->getSessions();
            foreach ($sessions as $session):
                $film = $filmController->findById($session->film_id);
                $hall = $hallController->findById($session->hall_id);
                ?>
                <tr class="th-limit-words" style="overflow: hidden">
                    <td><?php echo $session->date ?></td>
                    <td><?php echo $session->time ?></td>
                    <td><?php echo $session->cost ?></td>
                    <td><?php echo $film->name ?></td>
                    <td><?php echo $hall->name ?></td>
                    <td>
                        <form action="edit.php" method="GET">
                            <input type="hidden" value="<?php echo $session->id ?>" name="id">
                            <button class="btn btn-primary edit-button">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete.php" method="POST">
                            <input type="hidden" value="<?php echo $session->id ?>" name="id">
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
</div>