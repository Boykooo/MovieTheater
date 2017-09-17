<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Welcome page</title>

    <script src="static/js/jquery-3.2.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="static/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/common.css">
</head>
<body>
<?php
require "navigation.html";
require "../controller/FilmController.php";

?>
<?php
$filmController = new FilmController();
$films = $filmController->getFilms();
?>
<div class="container-fluid block">
    <div class="row">
        <div class=" col-md-2">
            Events
        </div>
        <div class=" col-md-10">
            <div>
                <h3>Фильмы в прокате</h3>
            </div>
            <div class="container block col-md-12" style="margin-top: 10px">
                <?php foreach ($films as $film): ?>
                    <div class="film">
                        <div class="panel panel-default col-md-5">
                            <b>
                                <div class="panel-heading"><?php echo $film['name'] ?></div>
                                <div class="panel-body">
                                    <img src="<?php echo $film["img_href"] ?>" alt="Not found" width="300" height="440">
                                    <br/> <br/>
                                    Производство: <?php echo $film['production'] ?> <br/>
                                    Жанр: <?php echo $film['genre'] ?> <br/>
                                    Возврастное ограничение : <?php echo $film['pg'] ?> <br/>
                                    Режиссер: <?php echo $film['director'] ?> <br/>
                                    Продолжительность: <?php echo $film['duration'] ?> <br/>
                                    В прокате до: <?php echo $film['end_date'] ?> <br/>
                                    <form action="film.php" method="GET">
                                        <input type="hidden" name="id" value="<?php echo $film["id"] ?>">
                                        <button class="btn btn-primary details-button">
                                            Подробнее
                                        </button>
                                    </form>
                                </div>
                            </b>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php

//$filmController = new FilmController();
//
//echo json_encode($filmController->getFilms(), JSON_UNESCAPED_UNICODE);
//
?>

</body>
</html>



