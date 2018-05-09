<?php
session_start();
include "templates/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<style>
    #map {
        height: 45%;
        position: ;
    }

    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
<head>
    <meta charset="UTF-8"/>
    <title>Contact</title>
</head>
<body>
<div class="container">
    <div>
        <h3>Контакты</h3>
    </div>
    <hr class="my-4">
    <div class="row">
        <div class="col-md-3" style="margin-top: 30px">
            <img src="static/image/contact.jpg" alt="Image not found" style="width: 100%">
        </div>
        <div class="col-md-6">
            <div style="font-size: 18px; margin-top: 30px;">
                <div style="font-size: 20px; margin-top: 30px">
                    <h4>Телефон</h4>
                    +7 (999) 999-99-99
                    <br/><br/>
                    <h4>Электронная почта</h4>
                    our-cinema@mail.ru
                    <br/><br/>
                    <h4>Адрес</h4>
                    г. Воронеж, Университетская пл., 1
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<br/>
<div id="map" class="container"></div>
<script>
    function initMap() {
        var uluru = {lat: 51.656355, lng: 39.2066511};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA76vFwigEflJ_QYL6UT_XuXsRxJgH5brU&callback=initMap"
        async defer></script>
</body>
</html>