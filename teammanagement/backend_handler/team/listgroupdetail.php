<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 03.06.2018
 * Time: 14:10
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('system/classes/database_connector.php');


echo "<div id='users'>\n";
echo "        <dl>\n";

$gdbh = globaldb();
$stmt = $gdbh->prepare("SELECT user.username FROM groups, user, groupplayer WHERE groupplayer.g_id = groups.g_id AND groupplayer.p_id = user.uuid AND groups.name = :Group");
$stmt->bindParam(":Group", $_GET['group']);
$stmt->execute();
$eg = $stmt->fetchAll();

$stmt = $gdbh->prepare("SELECT colors.colorhash FROM colors, groups WHERE colors.colorname = groups.usercolor AND groups.name = :Group");
$stmt->bindParam(":Group", $_GET['group']);
$stmt->execute();
$res = $stmt->fetch();

foreach ($eg as $rw) {
    echo "<dd style='background-color: " . $res['colorhash'] . "'><a id='users_txt' href='team.php?user=" . $rw['username'] . "'>" . $rw['username'] . "</a></dd>\n";
}

echo "        </dl>\n";
echo "    </div>\n";