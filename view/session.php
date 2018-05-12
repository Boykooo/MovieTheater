<?php
session_start();
include "templates/header.php";
include "../controller/FilmController.php";
include "../controller/SessionController.php";
include "../controller/SessionInfoController.php";
include "../controller/HallController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Session</title>
</head>
<?php
$filmController = new FilmController();
$sessionController = new SessionController();
$hallController = new HallController();
$sessionInfoController = new SessionInfoController();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sessionInfoController->reservation();
}

$session = $sessionController->findById($_GET["id"]);
$film = $filmController->findById($session->film_id);
$hall = $hallController->findById($session->hall_id);
$sessionInfos = $sessionInfoController->findBySessionId($session->id);


$rowCount = $hall->row_count;
$seats = array();
foreach ($sessionInfos as $sessionInfo) {
    $rowSeats = $seats[$sessionInfo->row];
    if ($rowSeats == null) {
        $rowSeats = array();
    }
    array_push($rowSeats, $sessionInfo);
    $seats[$sessionInfo->row] = $rowSeats;
}

?>
<body>
<div class="container">
    <h3>Сеанс</h3>
    <hr class="my-4">
    <div style="font-size: 20px">
        <a href="film.php?id=<?php echo $film->id ?>" style="color: black">
            <?php echo $film->name ?>
        </a>
        <br/>
        <?php echo date('H:i, ', strtotime($session->time)) . date('j.m, ', strtotime($session->date)) . $hall->name ?>
    </div>
    <div class="row" style="margin-top: 50px">
        <div class="col-md-8" style="font-size: 18px">
            <div class="col-md-10">
                <?php foreach ($seats as $row => $rowSeats): ?>
                    <div class="row">
                        <div class="col-md-2 text-center">
                            Ряд <?php echo $row ?>
                        </div>
                        <?php foreach ($rowSeats as $seat): ?>
                            <div href="#" class="col-md-1 text-center border border-primary rounded schedule"
                                 id="seatBlock<?php echo $seat->id ?>"
                                 value="disable"
                                 style="background-color: <?php echo $seat->status === "FREE" ?  'white' :  '#9F63D4' ?>"
                                 onclick="seatClick(<?php echo $seat->id ?>, this, <?php echo $seat->cost ?>, '<?php echo $seat->status ?>')">
                                <span>
                                        <?php echo $seat->seat_number ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="col-md-4">
            <div>
                <div class="row" style="font-size: 18px;">
                    Итоговая цена: <span id="finalPrice" style="margin-left: 10px">0</span>
                </div>
                <div class="row">
                    <button class="btn btn-primary details-button" onclick="reservationSeats()">
                        Забронировать места
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var sessionInfoIds = [];

    function seatClick(seatID, seat, price, seatStatus) {
        if (seatStatus === "FREE") {
            var seatClicked = document.getElementById('seatBlock' + seatID).value === 'active';
            var finalPrice = parseInt(document.getElementById('finalPrice').innerHTML);
            if (seatClicked) {
                finalPrice -= price;
                document.getElementById('seatBlock' + seatID).value = 'disable';
                document.getElementById('seatBlock' + seatID).style.backgroundColor = 'white';
                var index = sessionInfoIds.indexOf(seatID);
                if (index >= 0) {
                    sessionInfoIds.splice(index, 1);
                }
            } else {
                finalPrice += price;
                document.getElementById('seatBlock' + seatID).value = 'active';
                document.getElementById('seatBlock' + seatID).style.backgroundColor = '#0fc415';
                sessionInfoIds.push(seatID);
            }
            document.getElementById('finalPrice').innerHTML = finalPrice.toString();
        }
    }

    function reservationSeats() {
        if (sessionInfoIds.length > 0) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'session.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send("sessionInfoIds=" + JSON.stringify(sessionInfoIds));
            xhr.onreadystatechange = function () {
                location.reload();
            };
        }
    }

</script>

</body>
</html>