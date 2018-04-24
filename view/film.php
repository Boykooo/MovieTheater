<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>test</title>

    <script src="static/js/jquery-3.2.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="static/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/common.css">
</head>
<body>

<?php include "templates/header.html"; ?>
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
                    <div class="panel-heading"><?php echo $film->name ?></div>
                    <div class="panel-body">
                        <img src="<?php echo $film->img_href ?>" alt="Poster not found" width="300" height="440"> <br/> <br/>
                        Производство: <?php echo $film->production ?> <br/>
                        Жанр: <?php echo $film->genre ?> <br/>
                        Возврастное ограничение : <?php echo $film->pg ?> <br/>
                        Режиссер: <?php echo $film->director ?> <br/>
                        Продолжительность: <?php echo $film->duration ?> <br/>
                        В прокате до: <?php echo $film->end_date ?> <br/>
                        <form action="film.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $film->id ?>">
                            <button class="btn btn-primary">
                                Подробнее
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>



</body>
</html>



