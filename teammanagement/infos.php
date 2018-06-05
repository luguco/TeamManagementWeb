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
    <link rel="stylesheet" href="style/infos_style.css">
    <link rel="stylesheet" href="style/header_style.css">
    <title>Pixl-Planning | Info</title>
    <link rel="icon" type="image/png" href="grafiken/logo.png" sizes="32x32">
</head>
<body>

<?php
include('backend_handler/header.php');
?>

<div class="maindiv">
    <h1 id="ueberinfo1">Aktuelle Informationen</h1>

    <?php
    include_once "system/classes/class.system_connector.php";

    $res = system\classes\system_connector::getInfos();
    foreach ($res as $rs){
        echo "<p id='p_" . $rs['colorname'] . "'>" . $rs['info_text'] . "</p>\n";
    }
    ?>

</div>
</body>
</html>