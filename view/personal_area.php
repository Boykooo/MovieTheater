<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");

include "templates/header.php";
require_once "../controller/AccountController.php";
$accountController = new AccountController();
$account = $accountController->getAccount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Личный кабинет</title>
</head>
<body>
<div class="container" style="margin: 0">
    <div class="row" style="font-size: 18px; margin-top: 50px">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            <h2>Персональные данные</h2>
            <div style="margin-left: 20px">
                <b>Имя:</b> <br/>
                <b>Фамилия:</b> <?php echo $account->lastname ?> <br/>
                <b>Дата регистрации:</b> <?php echo $account->reg_date ?> <br/>
                <b>Email:</b> <?php echo $account->email ?> <br/>
            </div>
        </div>
    </div>
    <div class="row" style="font-size: 18px; margin-top: 50px">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            <h2>Ваши заказы</h2>
            <div>
                <h2>ЗАБРОНИРОВАННЫЕ МЕСТА ЮЗЕРА</h2>
            </div>
        </div>
    </div>
</div>
</body>
</html>