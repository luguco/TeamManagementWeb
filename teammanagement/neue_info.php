<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 06.06.2018
 * Time: 15:49
 */

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
    <title>Pixl-Planning | Neue Info</title>
    <link rel="icon" type="image/png" href="grafiken/logo.png" sizes="32x32">
</head>
<body>

<div class="maindiv">
<form method="post" action="backend_handler/new_alert.php">
    <input type="text" id="info" name="info" required placeholder="Neue Info">
    <input type="text" id="info_title" name="info_title" required placeholder="Info Überschrift">
    <select id="color" name ="color">
        <option>orange</option>
        <option>green</option>
        <option>blue</option>
    </select>
    <select id="position" name="position">
        <option>als Erstes</option>
        <?php
        include_once "system/classes/class.system_connector.php";
        $res = system\classes\system_connector::getInfos();

        foreach ($res as $rs){
            echo "<option>nach " . $rs['info_title'] . "</option>\n";
        }
        ?>
    </select>
    <input type="submit" value="Hinzufügen">
</form>
</div>
</body>
</html>