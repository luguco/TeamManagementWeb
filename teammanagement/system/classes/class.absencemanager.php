<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 26.05.2018
 * Time: 15:31
 */

namespace system\classes;

include_once('database_connector.php');
include_once('class.playermanager.php');

class absencemanager
{

    public static function newAbsence($username, $from, $to)
    {

        $err = self::checkInput($username, $from, $to);
        if ($err !== "") return $err;

        if (strtotime($from) > strtotime($to)) return "Das Ende muss nach dem Anfang liegen!";
        if (strtotime($from) < strtotime('today')) return "Das Datum liegt in der Vergangenheit!";

        $uuid = playermanager::getUUID($username);
        $dgbh = globaldb();
        $stmt = $dgbh->prepare("INSERT INTO absence_dates (`uuid`, `from`, `to`) VALUES (:UUID, :From, :To)");
        $stmt->bindParam(":UUID", $uuid);
        $stmt->bindParam(":From", $from);
        $stmt->bindParam(":To", $to);
        $stmt->execute();

        return "SUCC";
    }

    public static function checkInput($username, $from, $to)
    {
        if (!isset($username)) return "Kein Benutzername angegeben";
        if (!isset($from)) return "Kein Startdatum angegeben";
        if (!isset($to)) return "Kein Enddatum angegeben";

        $muster = '/^\d{4}-\d{2}-\d{2}$/';
        if (!preg_match($muster, $from)) return "Das ist kein korrektes Datum";
        if (!preg_match($muster, $to)) return "Das ist kein korrektes Datum";
        return "";
    }

    public static function allActiveAbsences(){
        $dgbh = globaldb();
        $stmt = $dgbh->prepare("SELECT user.username, absence_dates.from, absence_dates.to FROM absence_dates, user WHERE absence_dates.uuid = user.uuid AND absence_dates.to >= CURRENT_DATE Order By user.username");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}