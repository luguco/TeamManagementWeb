<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 02.06.2018
 * Time: 15:40
 */
include_once('system/classes/database_connector.php');


echo "<div id='groups'>\n";
echo "        <dl>\n";


$gdbh = globaldb();
$stmt = $gdbh->prepare("SELECT Name FROM Groups");
$stmt->execute();
$erg = $stmt->fetchAll();


foreach ($erg as $row) {

    $stmt = $gdbh->prepare("SELECT Colors.Colorhash FROM Colors, Groups WHERE Colors.Colorname = Groups.Rankcolor AND Groups.Name = :Group");
    $stmt->bindParam(":Group", $row['Name']);
    $stmt->execute();
    $res = $stmt->fetch();

    echo "          <dt style='background-color: " . $res['Colorhash'] . "'><a id='group_txt' href='team.php?group=" . $row['Name'] . "'>" . $row['Name'] . "</a></dt>\n";
}


echo "        </dl>\n";
echo "    </div>\n";