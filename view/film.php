<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Film</title>
</head>
<body>

<?php include "templates/header.php"; ?>
<?php include "../controller/FilmController.php"; ?>

<?php
$filmController = new FilmController();
$id = $_GET["id"];
$film = $filmController->findById($id);
?>
<div class="container-fluid" style="width: 100%">
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <div class="film">
                <div class="panel panel-default col-md-6">
                    <div class="panel-heading"><b><?php echo $film->name ?></b></div>
                    <div class="panel-body">
                        <img src="<?php echo $film->img_href ?>" alt="Poster not found" width="300" height="440"> <br/> <br/>
                        <b>Производство:</b> <?php echo $film->production ?> <br/>
                        <b>Жанр:</b> <?php echo $film->genre ?> <br/>
                        <b>Возврастное ограничение:</b> <?php echo $film->pg ?> <br/>
                        <b>Режиссер:</b> <?php echo $film->director ?> <br/>
                        <b>В ролях:</b> <?php echo $film->stars ?> <br/>
                        <b>Продолжительность:</b> <?php echo $film->duration ?> <br/>
                        <b>В прокате до:</b> <?php echo $film->end_date ?> <br/>
                        <b>Описание:</b> <?php echo $film->description ?> <br/>
                        <a href="welcome.php">
                            <button class="btn btn-primary"><b>Назад</b></button>
                        </a>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>