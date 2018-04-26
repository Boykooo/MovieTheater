<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/controller/AuthController.php";
$authController = new AuthController();
$isAuthenticated = $authController->isAuthenticated();
$signActionUrl = $isAuthenticated ? '/shared/logout.php'  : '#';
$signActionName = $isAuthenticated ? 'Выйти' : 'Войти';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <script src="/view/static/js/jquery-3.2.1.min.js"></script>
    <script src="/view/static/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/view/static/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/view/static/css/common.css">
</head>
<body>

<nav class="navbar navbar-default" style="font-size: 16px">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/view/welcome.php">Movie theater</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#">Some page</a></li>
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