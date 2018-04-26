<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Welcome page</title>

    <script src="../static/js/jquery-3.2.1.min.js"></script>
    <script src="../static/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../static/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../static/css/common.css">
</head>
<body>
<?php
require "../templates/header.php";
require "../../controller/FilmController.php";
?>

<div class="container" style="margin-left: 20px">
    <form action="admin_login_check.php" method="post">
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
                Login
            </button>
        </div>
    </form>
</div>

</body>
</html>



