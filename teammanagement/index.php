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
    <title>Pixl-Planning | Home</title>
    <link rel="icon" type="image/png" href="grafiken/logo.png" sizes="32x32">
</head>
<body>
 
  <?php
    include ('backend_handler/header.php');
  ?>

  <div class="maindiv">
    <h1 id="ueberinfo1">Willkommen, <?php echo $_SESSION['username']?></h1>
    <p id="p_blue">Das Pixl Team- und Projektmanagement System erlaubt es dir, wie der Name schon sagt, logisch und einfach dein Team und dessen Projekte zu verwalten.</p>
    
    <p id="p_orange">Funktionen, wie immer über die aktuellsten Abwesenheiten der Teammitglieder bescheid zu wissen, oder deren aktuellen Aufgaben aktiv zu verfolgen, vereinfachen den Workflow enorm. <br> Geplant sind aktuell viele Funktionen, wie Rangverwaltungen mit Rechtesystem, ein Ticketsystem für die einfache und produktive interne Struktur und weitere nützliche Helfersysteme.</p>
    <p id="p_green">Pixl-Planning by Luguco and LaetzPlaey | &copy;2018 by Pixl-Gaming | V0.3.1</p>
  </div>
</body>
</html>