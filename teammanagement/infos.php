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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include('backend_handler/header.php');
?>

<div class="maindiv">
    <div class="head_container">
        <div id="title_flex1">
            <h1 id="title1">Aktuelle Anliegen</h1>
        </div>
        <div id="title_flex2">
            <!--      Dieses <i> nur, wenn Recht dafür vorhanden (Div muss aber bleiben)-->
            <button class="fa fa-edit" id="edit_icon" onclick="window.location.href='neue_info.php'"></button>
        </div>
    </div>

    <?php
    include_once "system/classes/class.system_connector.php";

    $res = system\classes\system_connector::getInfos();

    foreach ($res as $rs) {
        echo "<div class='infos'>\n";
        echo"       <p id='label_title_info'>" . $rs['info_title'] . "</p>\n" .
            "       <p id='p_" . $rs['colorname'] . "'>" . $rs['info_text'] . "</p>\n" .
            "       <button title='Eintrag löschen' id='btn_del_info' type='button'>X</button>\n";

        echo "    </div>\n";
    }
    ?>
</div>
</body>
</html>