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
<div class="container-fluid block">
    <div class="row">
        <div class=" col-md-12">
            <div class="col-md-1"></div>
            <div class="panel panel-default col-md-4" style="font-size: 18px; padding: 0; ">
                <div class="panel-heading"><b>Персональные данные</b></div>
                <div class="panel-body">
                    <b>Имя:</b> <?php echo $account->firstname ?> <br/>
                    <b>Фамилия:</b> <?php echo $account->lastname ?> <br/>
                    <b>Дата регистрации:</b> <?php echo $account->reg_date ?> <br/>
                    <b>Email:</b> <?php echo $account->email ?> <br/>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 30px">
        <div class=" col-md-12">
            <div class="col-md-1"></div>
            <div class="panel panel-default col-md-4" style="font-size: 18px; padding: 0;">
                <div class="panel-heading"><b>Ваши заказы</b></div>
                <h2>ЗАБРОНИРОВАННЫЕ МЕСТА ЮЗЕРА</h2>
            </div>
        </div>
    </div>
</div>
</body>
</html>