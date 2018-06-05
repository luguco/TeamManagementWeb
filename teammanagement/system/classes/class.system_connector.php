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

    public static function getHeaderAlertText(){
        $gdbh = globaldb();
        $stmt = $gdbh->prepare("SELECT value FROM system_settings WHERE `key` = 'alert_text' ");
        $stmt->execute();
        return $stmt->fetch()['value'];
    }

    public static function getHeaderAlertStatus(){
        $gdbh = globaldb();
        $stmt = $gdbh->prepare("SELECT value FROM system_settings WHERE `key` = 'alert'");
        $stmt->execute();
        return $stmt->fetch()['value'];
    }

    public static function setHeaderAlert($text, $visible){

        $gdbh = globaldb();
        $stmt = $gdbh->prepare("UPDATE system_settings SET value = :Text WHERE `key` = 'alert_text'");
        $stmt->bindParam(":Text", $text);
        $stmt->execute();

        $stmt = $gdbh->prepare("UPDATE system_settings SET value = :Visible WHERE `key` = 'alert'");
        $stmt->bindParam(":Visible", $visible);
        $stmt->execute();
    }

    public static function getInfos(){
        $gdbh = globaldb();
        $stmt = $gdbh->prepare("SELECT * FROM `notices` ORDER BY `index` ");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}