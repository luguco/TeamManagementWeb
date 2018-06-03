<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 02.06.2018
 * Time: 15:40
 */
include_once('system/classes/database_connector.php');
echo "<dl>\n";
$gdbh = globaldb();
$stmt = $gdbh->prepare("SELECT Name FROM Groups");
$stmt->execute();

$erg = $stmt->fetchAll();
foreach ($erg as $row) {
    $stmt = $gdbh->prepare("SELECT Colors.Colorhash FROM Colors, Groups WHERE Colors.Colorname = Groups.Rankcolor AND Groups.Name = :Group");
    $stmt->bindParam(":Group", $row['Name']);
    $stmt->execute();
    $res = $stmt->fetch();

    echo "        <dt style='background-color: " . $res['Colorhash'] . "'><a href='team.php?group=" . $row['Name'] . "'>" . $row['Name'] . "</a></dt>\n";

    $stmt = $gdbh->prepare("SELECT User.Username FROM Groups, User, GroupPlayer WHERE GroupPlayer.G_ID = Groups.G_ID AND GroupPlayer.P_ID = User.UUID AND Groups.Name = :Group");
    $stmt->bindParam(":Group", $row['Name']);
    $stmt->execute();
    $eg = $stmt->fetchAll();

    $stmt = $gdbh->prepare("SELECT Colors.Colorhash FROM Colors, Groups WHERE Colors.Colorname = Groups.Usercolor AND Groups.Name = :Group");
    $stmt->bindParam(":Group", $row['Name']);
    $stmt->execute();
    $res = $stmt->fetch();

    foreach ($eg as $rw) {
        echo "            <dd style='background-color: " . $res['Colorhash'] . "'><a href='team.php?user=" . $rw['Username'] . "'>" . $rw['Username'] . "</a></dd>\n";
    }
}
echo "    </dl>\n";