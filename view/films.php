<?php
session_start();
include "templates/header.php";
include "../controller/FilmController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Films</title>
</head>
<body>
<div class="container">
    <h3>Фильмы в прокате</h3>
    <hr class="my-4">
    <div class="col-md-12">
        <div class="row">
            <?php
            $filmController = new FilmController();
            $films = $filmController->getActualFilms();
            foreach ($films as $film): ?>
                <div class="col-sm-4">
                    <div class="card text-center mb-3">
                        <img class="card-img-top" src="<?php echo $film->img_href ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $film->name ?></h5>
                            <div class="card-text">
                                <b>
                                    Производство: <?php echo $film->production ?> <br/>
                                    Жанр: <?php echo $film->genre ?> <br/>
                                    Возврастное ограничение : <?php echo $film->pg ?> <br/>
                                    Режиссер: <?php echo $film->director ?> <br/>
                                    Продолжительность: <?php echo $film->duration ?> <br/>
                                    В прокате до: <?php echo $film->end_date ?> <br/>
                                    <form action="film.php" method="GET">
                                        <input type="hidden" name="id" value="<?php echo $film->id ?>">
                                        <button class="btn btn-primary details-button">Подробнее</button>
                                    </form>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

</body>
</html>



