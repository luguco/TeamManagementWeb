<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('system/classes/database_connector.php');
?>
<div id="users">
  <dl>
<?php
$gdbh = globaldb();

if($_GET['group'] == "all"){

    $stmt = $gdbh->prepare("SELECT user.username FROM `user`, groups, groupplayer WHERE groupplayer.g_id = groups.g_id AND groupplayer.p_id = user.uuid GROUP BY user.username ORDER BY groups.priority, user.username");
    $stmt->execute();
    $eg = $stmt->fetchAll();

    foreach ($eg as $rw){

        $stmt = $gdbh->prepare("SELECT colors.colorhash FROM colors, groups, groupplayer, user WHERE colors.colorname = groups.usercolor AND groups.g_id = groupplayer.g_id AND groupplayer.p_id = user.uuid AND username = :User ORDER BY groups.priority");
        $stmt->bindParam(":User", $rw['username']);
        $stmt->execute();

        $res = $stmt->fetch();
?>
  <dd style="background-color:<?=$res['colorhash']?>" 
      onclick="window.open('team.php?user=<?=$rw['username']?>','_self')">
    <a id="users_txt" href="team.php?user=<?=$rw['username']?>">
      <?=$rw['username']?>
    </a>
  </dd>
<?php
}

} else {
    $stmt = $gdbh->prepare("SELECT user.username FROM groups, user, groupplayer WHERE groupplayer.g_id = groups.g_id AND groupplayer.p_id = user.uuid AND groups.name = :Group");
    $stmt->bindParam(":Group", $_GET['group']);
    $stmt->execute();
    $eg = $stmt->fetchAll();

    $stmt = $gdbh->prepare("SELECT colors.colorhash FROM colors, groups WHERE colors.colorname = groups.usercolor AND groups.name = :Group");
    $stmt->bindParam(":Group", $_GET['group']);
    $stmt->execute();
    $res = $stmt->fetch();

    foreach ($eg as $rw) {
?>  
  <dd style="background-color:<?=$res['colorhash']?>" 
      onclick="window.open('team.php?user=<?=$rw['username']?>','_self')">
    <a id="users_txt" href="team.php?user=<?=$rw['username']?>">
      <?=$rw['username']?>
    </a>
  </dd>
<?php
  }
}
?>
  </dl>
</div>
<?php
//include('include/navbar.php');
?>