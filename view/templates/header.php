<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/controller/AuthController.php";
$authController = new AuthController();
$isAuthenticated = $authController->isAuthenticated();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/MovieTheater/view/static/css/common.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="font-size: 18px">
    <img class="navbar-brand" style="height: 55px; width: 50px;" src="/MovieTheater/view/static/image/logo.jpg">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/MovieTheater/view/welcome.php">Главная</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/MovieTheater/view/films.php">Фильмы</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/MovieTheater/view/sessions.php">Сеансы</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/MovieTheater/view/events.php">События</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/MovieTheater/view/about.php">О нас</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto" style="margin-right: 20px">
            <?php if ($isAuthenticated) : ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        Личный кабинет
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item active">
                            <a class="dropdown-item" href="/MovieTheater/view/personal_area.php">Профиль</a>
                        </li>
                        <li class="nav-item active">
                            <a class="dropdown-item" href="/MovieTheater/shared/logout.php">Выйти</a>
                        </li>
                    </ul>
                </li>
            <?php else : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/MovieTheater/view/login.php">
                        Войти
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
</body>
</html>