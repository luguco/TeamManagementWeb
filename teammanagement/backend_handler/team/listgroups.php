<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('system/classes/database_connector.php');
?>
  <div id="groups">
    <dl>
<?php
$gdbh = globaldb();
$stmt = $gdbh->prepare("SELECT name FROM groups");
$stmt->execute();
$erg = $stmt->fetchAll();

?>
  <dt id="all_users" onclick="window.open('team.php?group=all','_self')">
    <a id="allgroup_txt" href="team.php?group=all">
      Alle Teammitglieder anzeigen
    </a>
  </dt>

<?php
foreach ($erg as $row) {

    $stmt = $gdbh->prepare("SELECT colors.colorhash FROM colors, groups WHERE colors.colorname = groups.rankcolor AND groups.name = :Group");
    $stmt->bindParam(":Group", $row['name']);
    $stmt->execute();
    $res = $stmt->fetch();
?>
  <dt style="background-color:<?=$res['colorhash']?>" 
      onclick="window.open('team.php?group=<?=$row['name']?>','_self')">
    <a id="group_txt">
      <?=$row['name']?>
    </a>
  </dt>
<?php } ?>

  </dl>
  <div id="div_new_group">
    <button id="btn_new_group">+</button>
  </div>
</div>