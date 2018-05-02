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
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="static/image/1.jpeg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Уютные залы</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="static/image/2.jpeg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Новинки кино</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="static/image/3.jpeg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Современный дизайн</h1>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="jumbotron">
    <h1 class="display-4">Добро пожаловать!</h1>
    <p class="lead">Встречайте, новый современный кинотеатр уже в вашем городе.</p>
    <hr class="my-4">
    <p>У нас вы найдете не только новинки современного кино, но и фестивальные работы, кино знакомое с детства и различные мероприятия.</p>
</div>
</body>
</html>



