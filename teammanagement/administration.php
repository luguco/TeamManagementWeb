<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('system/loginsession_tester.php');

?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style/administration_style.css">
    <link rel="stylesheet" href="style/header_style.css">
    <title>Pixl-Planning | Home</title>
    <link rel="icon" type="image/png" href="grafiken/logo.png" sizes="32x32">
</head>
<body>
 
  <?php
    include ('backend_handler/header.php');
  ?>

  <div class="maindiv">
    <div class="titlediv">
      <h1 id="ueberinfo1"><?php echo $_SESSION['username']?> in der Administration</h1>
      <img src="grafiken/facepalm.png" alt="Facepalm emoji" id="facepalm">
    </div>
    
    <div class="settingdiv1">
      <h1 id="title1">Meldung:</h1>
      <form method="post" action="backend_handler/absence_manager.php">
          <input type="text" id="input_alert_text" placeholder="Meldung" required="required" maxlength="100">
          <br>
          <input type="checkbox" id="ckb_enable_alert" checked>
          <label style="color: white;" for="ckb_enable_alert">Meldung anzeigen?</label>
          
          <input id="button_orange" type="submit" value="speichern">
      </form>      
    </div>
    
    <div class="settingdiv2">
      ded <br> ded <br> ded <br> ded <br> ded <br> ded <br> ded <br> ded <br> ded
    </div>    
  </div>
</body>
</html>