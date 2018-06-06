<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 06.06.2018
 * Time: 16:34
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once ("../system/classes/class.system_connector.php");

if(isset($_POST['info'])){
system\classes\system_connector::addInfo($_POST['info'], $_POST['info_title'], $_POST['color'], $_POST['position']);
}

header("Location: /teammanagement/infos.php");
?>
