<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 05.06.2018
 * Time: 17:13
 */

namespace system\classes;

include_once('database_connector.php');

class system_connector
{

    public static function getHeaderAlert(){
        $gdbh = globaldb();
        $stmt = $gdbh->prepare("SELECT sys.value FROM system_settings AS sys, system_settings AS helper WHERE sys.key = 'alert_text' AND helper.key = 'alert' AND helper.value = '1'");
        $stmt->execute();

        if($stmt->rowCount() > 0) {

            $res = $stmt->fetch();
            return $res['value'];
        }
        return "xXNot-FoundXx";
    }

    public static function getInfos(){
        $gdbh = globaldb();
        $stmt = $gdbh->prepare("SELECT * FROM `notices` ORDER BY `index` ");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}