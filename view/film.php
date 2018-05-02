<?php session_start() ?>
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

<div class="container">
    <div class="row" >
        <div class="col-md-12" style="text-align: center">
            <h1><?php echo $film->name ?></h1>
        </div>
        <div class="col-md-5" style="margin-top: 30px">
            <img src="<?php echo $film->img_href ?>" alt="Poster not found" width="350" height="480"/>
        </div>
        <div class="col-md-6">
            <div style="font-size: 18px; margin-top: 30px;">
                <div style="margin-top: 30px">
                    <h4>Производство</h4>
                    <?php echo $film->production ?>
                    <h4>Жанр</h4>
                    <?php echo $film->genre ?>
                    <h4>Возврастное ограничение</h4>
                    <?php echo $film->pg ?>
                    <h4>Режиссер</h4>
                    <?php echo $film->director ?>
                    <h4>В ролях</h4>
                    <?php echo $film->stars ?>
                    <h4>Продолжительность</h4>
                    <?php echo $film->duration ?>
                    <h4>В прокате до</h4>
                    <?php echo $film->end_date ?>
                    <h4>Описание</h4>
                    <?php echo $film->description ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>