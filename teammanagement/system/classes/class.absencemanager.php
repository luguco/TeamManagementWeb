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

    public static function newAbsence($username,$reason, $from, $to)
    {

        $err = self::checkInput($username, $reason, $from, $to);
        if ($err !== "") return $err;

        if (strtotime($from) > strtotime($to)) return "Das Ende muss nach dem Anfang liegen!";
        if (strtotime($from) < strtotime('today')) return "Das Datum liegt in der Vergangenheit!";

        $uuid = playermanager::getUUID($username);
        $dgbh = globaldb();
        $stmt = $dgbh->prepare("INSERT INTO absence_dates (`uuid`, `reason`, `from`, `to`) VALUES (:UUID, :Reason, :From, :To)");
        $stmt->bindParam(":UUID", $uuid);
        $stmt->bindParam(":Reason", $reason);
        $stmt->bindParam(":From", $from);
        $stmt->bindParam(":To", $to);
        $stmt->execute();

        return "SUCC";
    }

    public static function deleteAbsence($username, $from, $to){
        $gdbh = globaldb();

        $stmt = $gdbh->prepare("DELETE FROM `absence_dates` WHERE `uuid` = :UUID AND `from` = :From AND `to` = :To");
        $stmt->bindParam(":UUID", playermanager::getUUID($username));
        $stmt->bindParam(":From", $from);
        $stmt->bindParam(":To", $to);
        $stmt->execute();


    }

    public static function checkInput($username, $reason,  $from, $to)
    {
        if (!isset($username)) return "Kein Benutzername angegeben";
        if (!isset($from)) return "Kein Startdatum angegeben";
        if (!isset($to)) return "Kein Enddatum angegeben";
        if (!isset($reason)) return "Kein Grund angegeben";

        $muster = '/^\d{4}-\d{2}-\d{2}$/';
        if (!preg_match($muster, $from)) return "Das ist kein korrektes Datum";
        if (!preg_match($muster, $to)) return "Das ist kein korrektes Datum";
        return "";
    }

    public static function allActiveAbsences(){
        $dgbh = globaldb();
        $stmt = $dgbh->prepare("SELECT user.username, absence_dates.reason, absence_dates.from, absence_dates.to FROM absence_dates, user WHERE absence_dates.uuid = user.uuid AND absence_dates.to >= CURRENT_DATE Order By absence_dates.from");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}