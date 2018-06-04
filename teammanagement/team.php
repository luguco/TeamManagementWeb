<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 31.05.2018
 * Time: 17:15
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('system/loginsession_tester.php');
include_once('system/classes/database_connector.php');
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="style/header_style.css">
  <link rel="stylesheet" href="style/team_style.css">
  <title>Pixl-Planning | Team</title>
  <link rel="icon" type="image/png" href="grafiken/logo.png" sizes="32x32">
</head>
<body>
  <?php
    include ('backend_handler/header.php');
  ?>
  <div class="maindiv">
    <?php
      include('backend_handler/team/listgroups.php');

      if(isset($_GET['user'])){
      }  else if(isset($_GET['group'])){
          include "backend_handler/team/listgroupdetail.php";
      }
    ?>
  </div>
</body>
</html>
