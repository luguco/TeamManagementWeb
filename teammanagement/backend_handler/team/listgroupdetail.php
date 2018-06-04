<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 03.06.2018
 * Time: 14:10
 */
include_once('system/classes/database_connector.php');


echo "<div id='users'>\n";
echo "        <dl>\n";

$gdbh = globaldb();
$stmt = $gdbh->prepare("SELECT User.Username FROM Groups, User, GroupPlayer WHERE GroupPlayer.G_ID = Groups.G_ID AND GroupPlayer.P_ID = User.UUID AND Groups.Name = :Group");
$stmt->bindParam(":Group", $_GET['group']);
$stmt->execute();
$eg = $stmt->fetchAll();

$stmt = $gdbh->prepare("SELECT Colors.Colorhash FROM Colors, Groups WHERE Colors.Colorname = Groups.Usercolor AND Groups.Name = :Group");
$stmt->bindParam(":Group", $_GET['group']);
$stmt->execute();
$res = $stmt->fetch();

foreach ($eg as $rw) {
    echo "<dd style='background-color: " . $res['Colorhash'] . "'><a id='users_txt' href='team.php?user=" . $rw['Username'] . "'>" . $rw['Username'] . "</a></dd>\n";
}

echo "        </dl>\n";
echo "    </div>\n";