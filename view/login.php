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

<div class="container" style="margin: 0; margin-top: 50px">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <form action="login_check.php" method="post">
                <div class="row form-group col-md-12" style="padding: 0">
                    <label for="email" class="col-sm-4" style="padding: 0; margin: 0">
                        Email
                    </label>
                    <div class="col-sm-8" style="padding: 0">
                        <input class="form-control" id="email" name="email"
                               placeholder="Email"/>
                    </div>
                </div>

                <div class="row form-group col-md-12" style="padding: 0">
                    <label for="password" class="col-sm-4" style="padding: 0; margin: 0">
                        Password
                    </label>
                    <div class="col-sm-8" style="padding: 0">
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
    </div>

</div>
</div>


</body>
</html>



