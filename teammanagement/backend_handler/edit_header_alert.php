<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 05.06.2018
 * Time: 21:49
 */
include_once ('../system/classes/class.system_connector.php');

if(isset($_POST['labelinput'])) {

    isset($_POST['checkbox']) ? $box = 1 :  $box = 0;
    echo $_POST['labelinput'];
    echo "<br>";
    echo $box;
    system\classes\system_connector::setHeaderAlert($_POST['labelinput'], $box);

    unset($_POST['labelinput']);
    unset($_POST['checkbox']);

}
header("Location: /teammanagement/administration.php");