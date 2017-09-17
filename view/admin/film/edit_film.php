<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Welcome page</title>

    <script src="/view/static/js/jquery-3.2.1.min.js"></script>
    <script src="/view/static/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/view/static/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/view/static/css/common.css">
</head>
<body>
<?php
require "../../navigation.html";
require "../../../controller/FilmController.php";
require_once "../../../controller/AuthController.php";
?>
<?php
$token = null;
try {
    $token = $_POST["token"];
    $authController = new AuthController();
    if(!$authController->checkCredentials($token, "ADMIN")) {
        throw new AccessDeniedException();
    }
    $id = $_POST["id"];
    $filmController = new FilmController();
    $film = $filmController->findById($id);

} catch (Exception $e) {
    header("Location: ../login.php");
}
?>
<div class="container-fluid" style="width: 100%">
    <div class="row">
        <div class="col-md-12">
            <div class="film">
                <div class="panel panel-default col-md-6">
                    <div class="panel-heading"><?php echo $film['name'] ?></div>
                    <div class="panel-body">
                        <div class="form-group col-md-12">
                            <label class="col-sm-2 control-label">
                                Name
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name"
                                       placeholder="Name" value="<?php echo $film["name"] ?>"/>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-2 control-label">
                                Start date
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="start_date"
                                       placeholder="YYYY-MM-DD" value="<?php echo $film["start_date"] ?>"/>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-2 control-label">
                                End date
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="end_date"
                                       placeholder="YYYY-MM-DD" value="<?php echo $film["end_date"] ?>"/>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-2 control-label">
                                PG
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="pg"
                                       placeholder="PG" value="<?php echo $film["pg"] ?>"/>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-2 control-label">
                                Director
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="director"
                                       placeholder="Director" value="<?php echo $film["director"] ?>"/>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="stars" class="col-sm-2 control-label">
                                Stars
                            </label>
                            <div class="col-sm-4">
                                        <textarea name="stars" id="stars" cols="33" rows="6"
                                                  placeholder="Stars"><?php echo $film["stars"] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-2 control-label">
                                Genre
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="genre"
                                       placeholder="Genre" value="<?php echo $film["genre"] ?>"/>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-2 control-label">
                                Duration
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="duration"
                                       placeholder="HH:MM:SS" value="<?php echo $film["duration"] ?>"/>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description" class="col-sm-2 control-label">
                                Description
                            </label>
                            <div class="col-sm-4">
                                        <textarea name="description" id="description" cols="33" rows="6"
                                                  placeholder="Description"><?php echo $film["description"] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description" class="col-sm-2 control-label">
                                Production
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="production"
                                       placeholder="Production" value="<?php echo $film["production"] ?>"/>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description" class="col-sm-2 control-label">
                                Image link
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="img_href"
                                       placeholder="Image link" value="<?php echo $film["img_href"] ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>