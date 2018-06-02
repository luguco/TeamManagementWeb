<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 31.05.2018
 * Time: 19:03
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('system/loginsession_tester.php');
include ('system/classes/class.absencemanager.php')
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style/index_style.css">
    <link rel="stylesheet" href="style/alle_abwesenheiten.css">
    <link rel="stylesheet" href="style/header_style.css">
    <title>Titel</title>
</head>
<body>
  <div class="logodiv">
    <img src="grafiken/logo.png" alt="Logo von Pixl-Gaming" id="logo">
  </div>
  <div class="headdiv">
      <a id="button_nav" style="text-decoration: none; margin: 0px 5px 0px 30px;" href="abwesenheit_hinzufuegen.php">Abwesenheit eintragen</a>
      <a id="button_nav" style="text-decoration: none;" href="logout.php">Logout</a>
      <a id="button_nav" style="text-decoration: none;" href="team.php">Team</a>
      <a id="button_nav" style="text-decoration: none;" href="alle_abwesenheiten.php">Alle Abwesenheiten</a>
  </div>

  <div class="maindiv">
      <table id="customers">
          <thead>
          <tr>
            <th>User</th>
            <th>Von</th>
            <th>Bis</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $res = system\classes\absencemanager::allActiveAbsences();
          foreach ($res as $row){
          echo "<tr><td>" . $row['Username'] ."</td><td>" . $row['From'] . "</td><td>" . $row['To'] . "</td></tr>\n";
          }
          ?>
          </tbody>
      </table>
  </div>

</body>
</html>