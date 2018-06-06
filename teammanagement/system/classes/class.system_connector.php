<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 05.06.2018
 * Time: 17:13
 */

namespace system\classes;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        $stmt = $gdbh->prepare("SELECT * FROM `notices` ORDER BY `index` ASC");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function addInfo($text, $title, $color, $positon){

        $gdbh = globaldb();
        if($positon == "als Erstes"){
            $stmt = $gdbh->prepare("UPDATE `notices` SET `index` = `index` + 1000000");
            $stmt->execute();

            $stmt = $gdbh->prepare("UPDATE `notices` SET `index` = `index` - 999999");
            $stmt->execute();

            $stmt = $gdbh->prepare("INSERT INTO `notices` (`info_text`, `info_title`, `index`, `colorname`, `type`) VALUES (:Text, :Title, '1', :Color, 'text')");
            $stmt->bindParam(":Text", $text);
            $stmt->bindParam(":Title", $title);
            $stmt->bindParam(":Color", $color);
            $stmt->execute();
        }else{
            $stmt = $gdbh->prepare("SELECT `index` FROM notices WHERE info_title = :Title");

            $positon = str_replace("nach ", "", $positon);

            $stmt->bindParam(":Title", $positon);
            $stmt->execute();

            $res = $stmt->fetch();
            $index = $res['index'];

            $stmt = $gdbh->prepare("UPDATE `notices` SET `index` = `index` + 1000000 WHERE `index` > :Index");
            $stmt->bindParam(":Index", $index);
            $stmt->execute();

            $index += 1;
            $stmt = $gdbh->prepare("INSERT INTO `notices` (`info_text`, `info_title`, `index`, `colorname`, `type`) VALUES (:Text, :Title, :Id, :Color, 'text')");
            $stmt->bindParam(":Text", $text);
            $stmt->bindParam(":Title", $title);
            $stmt->bindParam(":Color", $color);
            $stmt->bindParam(":Id", $index);
            $stmt->execute();

            $stmt = $gdbh->prepare("UPDATE `notices` SET `index` = `index` - 999999 WHERE `index` > :Index");
            $stmt->bindParam(":Index", $index);
            $stmt->execute();
        }
    }
}