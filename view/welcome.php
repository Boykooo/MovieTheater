<?php
include "templates/header.php";
include "../controller/FilmController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Movie Theater</title>
</head>
<body>
<div class="container-fluid block">
    <div class="row">
        <div class=" col-md-2"></div>
        <div class=" col-md-10">
            <div>
                <h3>Фильмы в прокате</h3>
            </div>
            <div class="container block col-md-12" style="margin-top: 10px">
                <?php
                $filmController = new FilmController();
                $films = $filmController->getFilms();
                foreach ($films as $film): ?>
                    <div class="film">
                        <div class="panel panel-default col-md-5">
                            <b>
                                <div class="panel-heading"><?php echo $film->name ?></div>
                                <div class="panel-body">
                                    <img src="<?php echo $film->img_href ?>" alt="Poster not found" width="300"
                                         height="440">
                                    <br/> <br/>
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

</body>
</html>



