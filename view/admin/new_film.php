<?php

require_once "../../controller/AuthController.php";
require_once "../../controller/FilmController.php";
require_once "../../entity/Film.php";
//try {
$token = $_POST["token"];
$authController = new AuthController();
if ($authController->checkCredentials($token, "ADMIN")) {

    $name = $_POST["name"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $pg = $_POST["pg"];
    $director = $_POST["director"];
    $stars = $_POST["stars"];
    $genre = $_POST["genre"];
    $duration = $_POST["duration"];
    $description = $_POST["description"];
    $production = $_POST["production"];
    $img_href = $_POST["img_href"];

    $film = new Film(null, $name, $start_date, $end_date, $pg, $director, $stars, $genre,
        $duration, $description, $production, $img_href);
    $filmController = new FilmController();
    $filmController->createFilm($film);
    $data = array("token" => $token);
    //redirect_post("admin_panel.php", array("token" => $token));
} else {
    throw new AccessDeniedException();
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>test</title>
</head>
<body>
<form id="myform" action="admin_panel.php" method="post">
    <input type="hidden" name="token" value="<?php echo $token ?>"/>
</form>
<script type="text/javascript">
    document.getElementById('myform').submit();
</script>
</body>
</html>


