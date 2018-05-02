<?php
session_start();
require_once "../controller/AuthController.php";
$authController = new AuthController();
$isAuthenticated = $authController->isAuthenticated();
if ($isAuthenticated) {
    header("Location: /MovieTheater/view/personal_area.php");
}
include "templates/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Вход в личный кабинет</title>
</head>
<body>

<div class="container" style="margin-left: 20px">
    <form action="login_check.php" method="post">
        <div class="row form-group">
            <label for="email" class="col-sm-2" style="padding: 0">
                Email
            </label>
            <div class="col-sm-4">
                <input class="form-control" id="email" name="email"
                       placeholder="Email"/>
            </div>
        </div>

        <div class="row form-group">
            <label for="password" class="col-sm-2" style="padding: 0">
                Password
            </label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Password"/>
            </div>
        </div>

        <div class="row">
            <button class="btn btn-primary">
                Войти
            </button>
        </div>
    </form>
</div>

</body>
</html>



