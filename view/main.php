<?php

require_once "../controller/TestController.php";

$testController = new TestController();

echo json_encode($testController->getData());