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
  <title>Pixl-Planning | Abwesenheiten</title>
  <link rel="icon" type="image/png" href="grafiken/logo.png" sizes="32x32">
</head>
<body>
<?php
  include ('backend_handler/header.php');
?>

<div class="maindiv">
  <table id="customers">
    <thead>
      <tr>
        <th>User</th>
        <th>Von</th>
        <th>Bis</th>
        <th width="8%" style="background-color: orange;"><a href="abwesenheit_hinzufuegen.php" style="text-decoration: underline; color: white;">NEUE ABWESENHEIT</a></th>
      </tr>
      </thead>
      <tbody>
        <?php
        $res = system\classes\absencemanager::allActiveAbsences();
        foreach ($res as $row){
        echo "<tr><td>" . $row['username'] ."</td><td>" . $row['from'] . "</td><td>" . $row['to'] . "</td></tr>\n";
        }
        ?>
      </tbody>
  </table>
</div>

</body>
</html>