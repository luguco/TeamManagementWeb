<?php
ini_set('display_errors','1');
error_reporting(E_ALL) ;
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style/login_style.css">
    <title>Pixl-Planning | Login</title>
    <link rel="icon" type="image/png" href="grafiken/logo.png" sizes="32x32">
</head>
<body>
<div class="logodiv">
    <img src="grafiken/logo.png" alt="Logo von Pixl-Gaming" id="logo">
</div>

<?php 
  include ('backend_handler/notice.php');
?>

<div class="maindiv">
  <?php
    session_start();
    if(isset($_SESSION['error'])) {
        $err = $_SESSION['error'];
        if (!is_null($err)) {
            echo '<p id="errmsg">' . $err . '</p>';
            $_SESSION['error'] = null;
        }
    }
  ?> 
  <h1 id="title">Pixl-Gaming</h1>
  <h2 id="titleinfo">Management</h2>
  <form method="post" action="backend_handler/login.php">
      <input style="width: 80%; height: 35px; margin: 10px 0px 0px 40px;" type="text" name="username" id="username" class="fieldlogin" placeholder="Benutzername"><br>
      <input style="width: 80%; height: 35px; margin: 10px 0px 0px 40px;" type="password" name="password" id="password" class="fieldlogin" placeholder="Password" required minlength="6"><br>
      <input id="button_blue" style ="margin: 10px 0px 0px 40px;" type="submit" name="login" id="login" class="loginbutton" value="Login"><br>
  </form>
  
  <p style="color: white; margin: 30px 0px 0px 20px; font-size: 12px;">developed by Luguco and LaetzPlaey | c2018</p>
</div>
</body>
</html>
