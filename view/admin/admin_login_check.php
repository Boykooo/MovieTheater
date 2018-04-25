<?php
require_once "../../controller/AuthController.php";

$email = $_POST["email"];
$password = $_POST["password"];
$authController = new AuthController();
try {
$token = $authController->login($email, $password);
} catch (Exception $exception) {
    header("Location: login.php");
}
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