<?php
session_start();
require_once "../controller/AuthController.php";
$authController = new AuthController();
$success = true;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $success = $authController->handleRegister();
    if ($success) {
        header("Location: personal_area.php");
    }
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
    <?php if (!$success) : ?>
        <div class="row" style="margin-bottom: 50px; ">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <h3>Пользователь с таким email адресом уже существует!</h3>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <form action="register.php" method="post">
                <div class="row form-group col-md-12" style="padding: 0">
                    <label for="firstname" class="col-sm-4" style="padding: 0; margin: 0">
                        Имя
                    </label>
                    <div class="col-sm-8" style="padding: 0">
                        <input type="text" class="form-control" id="firstname" name="firstname"
                               placeholder="Имя" required/>
                    </div>
                </div>

                <div class="row form-group col-md-12" style="padding: 0">
                    <label for="password" class="col-sm-4" style="padding: 0; margin: 0">
                        Фамилия
                    </label>
                    <div class="col-sm-8" style="padding: 0">
                        <input type="text" class="form-control" id="lastname" name="lastname"
                               placeholder="Фамилия" required/>
                    </div>
                </div>

                <div class="row form-group col-md-12" style="padding: 0">
                    <label for="password" class="col-sm-4" style="padding: 0; margin: 0">
                        Email
                    </label>
                    <div class="col-sm-8" style="padding: 0">
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="Email" required/>
                    </div>
                </div>

                <div class="row form-group col-md-12" style="padding: 0">
                    <label for="password" class="col-sm-4" style="padding: 0; margin: 0">
                        Пароль
                    </label>
                    <div class="col-sm-8" style="padding: 0">
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Пароль" required/>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary">
                        Зарегистрироваться
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
</div>

</body>
</html>



