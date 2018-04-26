<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/shared/authenticate.php");

require "../templates/header.php";
require "../../controller/FilmController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Movie Theater</title>
</head>
<body>
<div class="container">
    <button class="btn btn-primary edit-button" data-toggle="modal" data-target="#newFilm">New Film</button>
    <h2>Films</h2>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
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
            <th></th>
        </tr>
        </thead>
        <?php
        $filmController = new FilmController();
        $films = $filmController->getFilms();
        foreach ($films as $film):?>
            <tr class="th-limit-words" style="overflow: hidden">
                <td><?php echo $film->name ?></td>
                <td><?php echo $film->start_date ?></td>
                <td><?php echo $film->end_date ?></td>
                <td><?php echo $film->pg ?></td>
                <td><?php echo $film->director ?></td>
                <td><span class="limit-words"><?php echo $film->stars ?></span></td>
                <td><?php echo $film->genre ?></td>
                <td><?php echo $film->duration ?></td>
                <td><span class="limit-words"><?php echo $film->description ?></span></td>
                <td><?php echo $film->production ?></td>
                <td><span class="limit-words"><?php echo $film->img_href ?></span></td>
                <td>
                    <form action="film/edit.php" method="GET">
                        <input type="hidden" value="<?php echo $film->id ?>" name="id">
                        <button class="btn btn-primary edit-button">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="film/delete.php" method="POST">
                        <input type="hidden" value="<?php echo $film->id ?>" name="id">
                        <button class="btn btn-primary delete-button">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="modal fade" id="newFilm" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">New Film</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" style="padding-right: 30px;">
                        <form action="film/new.php" method="post">
                            <div class="form-group col-md-12">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="start_date" class="col-sm-2 control-label">Start date</label>
                                <div class="col-sm-4">
                                    <input type="text" name="start_date" id="start_date" placeholder="YYYY-MM-DD"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="end_date" class="col-sm-2 control-label">End date</label>
                                <div class="col-sm-4">
                                    <input type="text" name="end_date" id="end_date" placeholder="YYYY-MM-DD"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="pg" class="col-sm-2 control-label">PG</label>
                                <div class="col-sm-4">
                                    <input type="text" name="pg" id="pg" placeholder="Parental Guidance"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="director" class="col-sm-2 control-label">Director</label>
                                <div class="col-sm-4">
                                    <input type="text" name="director" id="director" placeholder="Director"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="stars" class="col-sm-2 control-label">Stars</label>
                                <div class="col-sm-4">
                                    <textarea name="stars" id="stars" cols="33" rows="6" placeholder="Stars"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="genre" class="col-sm-2 control-label">Genre</label>
                                <div class="col-sm-4">
                                    <input type="text" name="genre" id="genre" placeholder="Genre"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="duration" class="col-sm-2 control-label">Duration</label>
                                <div class="col-sm-4">
                                    <input type="text" name="duration" id="duration" placeholder="HH:MM:SS"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-4">
                                    <textarea name="description" id="description" cols="33" rows="6"
                                              placeholder="Description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="production" class="col-sm-2 control-label">Production</label>
                                <div class="col-sm-4">
                                    <input type="text" name="production" id="production" placeholder="Production"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="img_href" class="col-sm-2 control-label">Image link</label>
                                <div class="col-sm-4">
                                    <input type="text" name="img_href" id="img_href" placeholder="Image link"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <button class="btn btn-primary edit-button">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>