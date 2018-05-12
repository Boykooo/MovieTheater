<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");

include "templates/header.php";
require_once "../controller/AccountController.php";
require_once "../controller/TicketController.php";
require_once "../controller/SessionInfoController.php";
$accountController = new AccountController();
$account = $accountController->getAccount();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sessionInfoController = new SessionInfoController();
    $sessionInfoController->cancelReservation();
}

$ticketController = new TicketController();
$tickets = $ticketController->getConvertedTicketsByCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Личный кабинет</title>
</head>
<body>
<div class="container-fluid">
    <div class="row" style="font-size: 18px; margin-top: 50px">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            <div class="row">
                <h2>Персональные данные</h2>
            </div>
            <b>Имя:</b> <?php echo $account->firstname ?> <br/>
            <b>Фамилия:</b> <?php echo $account->lastname ?> <br/>
            <b>Дата регистрации:</b> <?php echo $account->reg_date ?> <br/>
            <b>Email:</b> <?php echo $account->email ?> <br/>
        </div>
    </div>
</div>

<div class="container-fluid" style="font-size: 18px; margin-top: 50px; width: 100%">
    <div class="row">
        <div class="col-md-1"></div>
        <h2>Забронированные места</h2>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-striped  borderless"
            ">
            <thead>
            <tr>
                <th>Фильм</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Ряд</th>
                <th>Место</th>
                <th>Стоимость</th>
                <th>Зал</th>
                <th></th>
            </tr>
            </thead>
            <?php foreach ($tickets as $ticketWrapper): ?>
                <tr class="th-limit-words" style="overflow: hidden">
                    <td><?php echo $ticketWrapper->name ?></td>
                    <td><?php echo $ticketWrapper->date ?></td>
                    <td><?php echo $ticketWrapper->time ?></td>
                    <td><?php echo $ticketWrapper->row ?></td>
                    <td> <?php echo $ticketWrapper->seat_number ?> </td>
                    <td> <?php echo $ticketWrapper->cost ?> </td>
                    <td> <?php echo $ticketWrapper->hall_id ?> </td>
                    <td style="text-align: center">
                        <form action="personal_area.php" method="post">
                            <input type="hidden" value="<?php echo $ticketWrapper->session_info_id ?>" name="session_info_id">
                            <button class="btn btn-danger edit-button">Отменить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
    <!--                    --><?php //foreach ($tickets as $ticket): ?>
    <!--                        <div class="col-md-3">-->
    <!--                            <div style="margin-left: 20px">-->
    <!--                                <b>Фильм:</b> --><?php //echo $ticket->name ?><!-- <br/>-->
    <!--                                <b>Дата:</b> --><?php //echo $ticket->date ?><!-- <br/>-->
    <!--                                <b>Время:</b> --><?php //echo $ticket->time ?><!-- <br/>-->
    <!--                                <b>Ряд:</b> --><?php //echo $ticket->row ?><!-- <br/>-->
    <!--                                <b>Место:</b> --><?php //echo $ticket->seat_number ?><!-- <br/>-->
    <!--                                <b>Стоимость:</b> --><?php //echo $ticket->cost ?><!-- <br/>-->
    <!--                                <b>Номер зала:</b> --><?php //echo $ticket->hall_id ?><!-- <br/>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    --><?php //endforeach; ?>
</body>
</html>