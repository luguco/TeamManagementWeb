<?php
ini_set('display_errors','1');
error_reporting(E_ALL) ;
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login</title>
</head>
<body>

<?php
session_start();
$err = $_SESSION['error'];
if (!is_null($err)) {
    echo '<label id="errmsg"><br>' . $err . '</label>';
    $_SESSION['error'] = null;
}
?>
<form method="post" action="backend_handler/login.php">
    <input type="text" name="username" id="username" class="fieldlogin" placeholder="Benutzername"><br>
    <input type="password" name="password" id="password" class="fieldlogin" placeholder="Password" required minlength="6"><br>
    <input type="submit" name="login" id="login" class="loginbutton" value="Login"><br>
</form>
</body>
</html>
