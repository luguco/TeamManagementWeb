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
    <link rel="stylesheet" href="style/index_style.css">
    <link rel="stylesheet" href="style/header_style.css">
    <title>Titel</title>
</head>
<body>
  <?php
  include ('backend_handler/header.php');
  ?>

  <div class="maindiv">
  <!--  Hier die Anwesenheits Übersicht und so yk-->
  Das hier ist die Hauptseite
  
  
    <p style="color: white; margin: 450px 0px 0px 20px; font-size: 12px;">developed by Luguco and LaetzPlaey | c2018</p>
  </div>

</body>
</html>