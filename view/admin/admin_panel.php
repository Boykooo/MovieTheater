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
require "../navigation.html";
require "../../controller/FilmController.php";
require_once "../../controller/AuthController.php";
?>
<?php
$token = null;
try {
    $token = $_POST["token"];
    $authController = new AuthController();
    if(!$authController->checkCredentials($token, "ADMIN")) {
        throw new AccessDeniedException();
    }
} catch (Exception $e) {
    header("Location: login.php");
}

$filmController = new FilmController();
$films = $filmController->getLast20Films();
?>
<div class="container">
    <button class="btn btn-primary edit-button" data-toggle="modal" data-target="#newFilm">
        New film
    </button>
    <h2>Last 20 films</h2>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Start date</th>
            <th>End date</th>
            <th>PG</th>
            <th>Director</th>
            <th>Stars</th>
            <th>Genre</th>
            <th>Duration</th>
            <th>Description</th>
            <th>Production</th>
            <th>Img href</th>
            <th></th>
        </tr>
        </thead>
        <?php foreach ($films as $film): ?>
            <tr class="th-limit-words" style="overflow: hidden">
                <td><?php echo $film["id"] ?></td>
                <td><?php echo $film["name"] ?></td>
                <td><?php echo $film["start_date"] ?></td>
                <td><?php echo $film["end_date"] ?></td>
                <td><?php echo $film["pg"] ?></td>
                <td><?php echo $film["director"] ?></td>
                <td><span class="limit-words"><?php echo $film["stars"] ?></span></td>
                <td><?php echo $film["genre"] ?></td>
                <td><?php echo $film["duration"] ?></td>
                <td><span class="limit-words"><?php echo $film["description"] ?></span></td>
                <td><?php echo $film["production"] ?></td>
                <td><span class="limit-words"><?php echo $film["img_href"] ?></span></td>
                <td>
                    <button class="btn btn-primary edit-button">
                        Edit
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="modal fade" id="newFilm" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title">
                    New film
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12" style="padding-right: 30px;">
                            <form action="new_film.php" method="post">
                                <div class="form-group col-md-12">
                                    <label class="col-sm-2 control-label">
                                        Name
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="name" placeholder="Name"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-sm-2 control-label">
                                        Start date
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="start_date"
                                               placeholder="YYYY-MM-DD"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-sm-2 control-label">
                                        End date
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="end_date"
                                               placeholder="YYYY-MM-DD"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-sm-2 control-label">
                                        PG
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="pg" placeholder="PG"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-sm-2 control-label">
                                        Director
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="director" placeholder="Director"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="stars" class="col-sm-2 control-label">
                                        Stars
                                    </label>
                                    <div class="col-sm-4">
                                        <textarea name="stars" id="stars" cols="33" rows="6"
                                                  placeholder="Stars"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-sm-2 control-label">
                                        Genre
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="genre" placeholder="Genre"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-sm-2 control-label">
                                        Duration
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="duration" placeholder="HH:MM:SS"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description" class="col-sm-2 control-label">
                                        Description
                                    </label>
                                    <div class="col-sm-4">
                                        <textarea name="description" id="description" cols="33" rows="6"
                                                  placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description" class="col-sm-2 control-label">
                                        Production
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="production"
                                               placeholder="Production"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description" class="col-sm-2 control-label">
                                        Image link
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="img_href"
                                               placeholder="Image link"/>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $token ?>" name="token">
                                <div class="form-group col-md-12">
                                    <button class="btn btn-primary edit-button">
                                        Send
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>