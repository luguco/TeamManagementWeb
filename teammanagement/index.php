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
    <div class="logodiv">
      <img src="grafiken/logo.png" alt="Logo von Pixl-Gaming" id="logo">
    </div>
    <div class="headdiv">
      <a id="button_nav" style="text-decoration: none; margin: 0px 5px 0px 30px;" href="abwesenheit_hinzufuegen.php">Abwesenheit eintragen</a>
      <a id="button_nav" style="text-decoration: none; margin: 0px 5px 0px 0px;" href="logout.php">Logout</a>
      <a id="button_nav" style="text-decoration: none; margin: 0px 5px 0px 0px;" href="team.php">Team</a>
      <a id="button_nav" style="text-decoration: none;" href="alle_abwesenheiten.php">Alle Abwesenheiten</a>
    </div>

    <div class="maindiv">
<!--        Infos zum Tool und so..       -->
    </div>

    </body>
    </html>
<?php