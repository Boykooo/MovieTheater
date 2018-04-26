<?php
session_start();
require_once "../../controller/AuthController.php";
$authController = new AuthController();
$authController->login();
header("Location: admin_panel.php");
?>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8"/>-->
<!--    <title>test</title>-->
<!--</head>-->
<!--<body>-->
<!--<form id="myform" action="admin_panel.php" method="post">-->
<!--    <input type="hidden" name="token" value="--><?php //echo $account->token ?><!--"/>-->
<!--</form>-->
<!--<script type="text/javascript">-->
<!--        document.getElementById('myform').submit();-->
<!--</script>-->
<!--</body>-->
<!--</html>-->