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
    <link rel="stylesheet" href="style/index_style.css">
</head>
<body>
<div class="headdiv">
    <a id="button_nav" style="text-decoration: none; margin: 0px 5px 0px 30px;" href="abwesenheit_hinzufuegen.php">Abwesenheit
        eintragen</a>
    <a id="button_nav" style="text-decoration: none;" href="logout.php">Logout</a>
    <a id="button_nav" style="text-decoration: none;" href="team.php">Team</a>
</div>

    <div class="maindiv">
    <?php
    echo "<dl>\n";
    $gdbh = globaldb();
    $stmt = $gdbh->prepare("SELECT Name FROM Groups");
    $stmt->execute();

    $erg = $stmt->fetchAll();
    foreach ($erg as $row) {
        echo "<dt>" . $row['Name'] . "</dt>\n";

        $stmt = $gdbh->prepare("SELECT User.Username FROM Groups, User, GroupPlayer WHERE GroupPlayer.G_ID = Groups.G_ID AND GroupPlayer.P_ID = User.UUID AND Groups.Name = :Group");
        $stmt->bindParam(":Group", $row['Name']);
        $stmt->execute();
        $eg = $stmt->fetchAll();

        foreach ($eg as $rw) {
            echo "<dd>-<a href='team.php?user=" . $rw['Username'] . "'>" . $rw['Username'] . "</a></dd>\n";
        }
    }
    echo "</dl>\n";
    ?>
    </div>
</body>
</html>
