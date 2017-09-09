

<?php
//    require "navigation.html";
    require "../controller/FilmController.php";
    $filmController = new FilmController();

    echo json_encode($filmController->getFilms(), JSON_UNESCAPED_UNICODE);

?>
