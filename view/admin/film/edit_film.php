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
require "../../templates/header.html";
require "../../../controller/FilmController.php";
require_once "../../../controller/AuthController.php";
?>
<?php
$token = null;
try {
    $token = $_POST["token"];
    $authController = new AuthController();
    if (!$authController->checkCredentials($token, "ADMIN")) {
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
                    <div class="panel-heading"><?php echo $film->name ?></div>
                    <div class="panel-body">
                        <form action="edit_film.php?id=<?php echo $film->id ?>" method="post">
                            <div class="form-group col-md-12">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="name" id="name" placeholder="Name"
                                           class="form-control" value="<?php echo $film->name ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="start_date" class="col-sm-2 control-label">Start date</label>
                                <div class="col-sm-4">
                                    <input type="text" name="start_date" id="start_date" placeholder="YYYY-MM-DD"
                                           class="form-control" value="<?php echo $film->start_date ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="end_date" class="col-sm-2 control-label">End date</label>
                                <div class="col-sm-4">
                                    <input type="text" name="end_date" id="end_date" placeholder="YYYY-MM-DD"
                                           class="form-control" value="<?php echo $film->end_date ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="pg" class="col-sm-2 control-label">PG</label>
                                <div class="col-sm-4">
                                    <input type="text" name="pg" id="pg" placeholder="Parental Guidance"
                                           class="form-control" value="<?php echo $film->pg ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="director" class="col-sm-2 control-label">Director</label>
                                <div class="col-sm-4">
                                    <input type="text" name="director" id="director" placeholder="Director"
                                           class="form-control" value="<?php echo $film->director ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="stars" class="col-sm-2 control-label">Stars</label>
                                <div class="col-sm-4">
                                <textarea name="stars" id="stars" cols="33" rows="6" placeholder="Stars"
                                          class="form-control"><?php echo $film->stars ?></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="genre" class="col-sm-2 control-label">Genre</label>
                                <div class="col-sm-4">
                                    <input type="text" name="genre" id="genre" placeholder="Genre"
                                           class="form-control" value="<?php echo $film->genre ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="duration" class="col-sm-2 control-label">Duration</label>
                                <div class="col-sm-4">
                                    <input type="text" name="duration" id="duration" placeholder="HH:MM:SS"
                                           class="form-control" value="<?php echo $film->duration ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-4">
                                <textarea name="description" id="description" cols="33" rows="6"
                                          placeholder="Description"
                                          class="form-control"><?php echo $film->description ?></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="production" class="col-sm-2 control-label">Production</label>
                                <div class="col-sm-4">
                                    <input type="text" name="production" id="production" placeholder="Production"
                                           class="form-control" value="<?php echo $film->production ?>"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="img_href" class="col-sm-2 control-label">Image link</label>
                                <div class="col-sm-4">
                                    <input type="text" name="img_href" id="img_href" placeholder="Image link"
                                           class="form-control" value="<?php echo $film->img_href ?>"/>
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo $token ?>" name="token">
                            <div class="form-group col-md-12">
                                <button class="btn btn-primary edit-button">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>