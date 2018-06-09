<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 02.06.2018
 * Time: 15:40
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('system/classes/database_connector.php');


echo "<div id='groups'>\n";
echo "        <dl>\n";


$gdbh = globaldb();
$stmt = $gdbh->prepare("SELECT name FROM groups");
$stmt->execute();
$erg = $stmt->fetchAll();

echo "          <dt id='all_users'><a id='group_txt' href='team.php?group=all'>Alle Teammitglieder</a></dt>\n";
foreach ($erg as $row) {

    $stmt = $gdbh->prepare("SELECT colors.colorhash FROM colors, groups WHERE colors.colorname = groups.rankcolor AND groups.name = :Group");
    $stmt->bindParam(":Group", $row['name']);
    $stmt->execute();
    $res = $stmt->fetch();

    echo "          <dt style='background-color: " . $res['colorhash'] . "'><a id='group_txt' href='team.php?group=" . $row['name'] . "'>" . $row['name'] . "</a></dt>\n";
}


echo "        </dl>\n";
echo "    </div>\n";