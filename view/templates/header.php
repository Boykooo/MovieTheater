<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/controller/AuthController.php";
$authController = new AuthController();
$isAuthenticated = $authController->isAuthenticated();
$signActionUrl = $isAuthenticated ? '/MovieTheater/shared/logout.php'  : '#';
$signActionName = $isAuthenticated ? 'Выйти' : 'Войти';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <script src="/MovieTheater/view/static/js/jquery-3.2.1.min.js"></script>
    <script src="/MovieTheater/view/static/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/MovieTheater/view/static/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/MovieTheater/view/static/css/common.css">
</head>
<body>

<nav class="navbar navbar-default" style="font-size: 16px">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/MovieTheater/view/welcome.php">Movie theater</a>
        </div>
        <ul class="nav navbar-nav">
            <a class="navbar-brand" href="/MovieTheater/view/welcome.php">Фильмы</a>
        </ul>
        <ul class="nav navbar-nav">
            <a class="navbar-brand" href="/MovieTheater/view/events.php">События</a>
        </ul>
        <ul class="nav navbar-nav navbar-right" style="margin-right: 20px">
            <li>
                <a href="<?php echo $signActionUrl?>">
                    <?php echo $signActionName ?>
                </a>
            </li>
        </ul>
    </div>
</nav>

</body>
</html>