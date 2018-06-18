<?php
ini_set('display_errors','1');
error_reporting(E_ALL) ;
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style/register_style.css">
    <title>Pixl-Planning | Login</title>
    <link rel="icon" type="image/png" href="grafiken/logo.png" sizes="32x32">
    
    <link rel="stylesheet" href="style/main_style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker_begin").datepicker();
            $("#datepicker_begin").datepicker("option", "dateFormat", 'dd.mm.yy');
        });
    </script>    
</head>
<body>
<div class="logo_container">
  <div class="logodiv">
      <img src="grafiken/logo.png" alt="Logo von Pixl-Gaming" id="logo">
  </div>
</div>


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
  <h1 id="title">Lula-Planning</h1>
  <h2 id="titleinfo">Register</h2>
  <form method="post" action="backend_handler/register.php">
    <input style="width: 80%; height: 35px; margin: 10px 0px 0px 40px;" type="text" name="name" id="name" class="fieldregister" placeholder="voller Name" autocomplete="off" required>
    <input style="width: 80%; height: 35px; margin: 10px 0px 0px 40px;" type="text" name="datepicker" id="datepicker_begin" placeholder="Geburtsdatum" autocomplete="off" required>     

    <input style="width: 80%; height: 35px; margin: 25px 0px 0px 40px;" type="text" name="username" id="username" class="fieldregister" placeholder="Benutzername" autocomplete="off" required>
    <input style="width: 80%; height: 35px; margin: 10px 0px 0px 40px;" type="text" name="email" id="email" class="fieldregister" placeholder="E-Mail Adresse" autocomplete="off" required>
    <input style="width: 80%; height: 35px; margin: 10px 0px 0px 40px;" type="password" name="password" id="password" class="fieldregister" placeholder="Passwort" required>
    <input style="width: 80%; height: 35px; margin: 10px 0px 0px 40px;" type="password" name="password_agn" id="password_agn" class="fieldregister" placeholder="Passwort wiederholen" required>

    <input style="width: 80%; height: 35px; margin: 25px 0px 0px 40px;" type="text" name="registercode" id="registercode" class="fieldregister" placeholder="Registrierungscode" autocomplete="off" required>
    <br>
<!--    <input type="checkbox" name="ckb_agb" id="ckb_agb" style="margin: 10px 0px 0px 40px;" required>
    <label id="ckb_agb_label" for="ckb_agb" style="margin: 13px 0px 0px 8px;">Ich bestätige die AGB</label><br><br>  -->
    
    <input id="button_blue" style ="margin: 10px 0px 0px 40px;" type="submit" name="login" id="login" class="loginbutton" value="registrieren">
    <a id="button_red" style="margin: 10px 0px 0px 10px; text-decoration: none;" href="login.php">zurück</a>
  </form>
  
  <p style="color: white; margin: 30px 0px 0px 20px; font-size: 12px;">developed by Luguco and LaetzPlaey | &copy;2018</p>
</div>
</body>
</html>