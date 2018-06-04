<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 09.01.2018
 * Time: 18:07
 */

namespace system\classes;
ini_set('display_errors', '1');
error_reporting(E_ALL);
include_once('database_connector.php');

class loginmanager
{

    public static function Login($username, $password)
    {
        $res = self::checkInput($username, $password);
        if ($res !== "") return $res;

        $dgbh = globaldb();

        $stmt = $dgbh->prepare('SELECT * FROM user WHERE username = :Username');
        $stmt->bindParam(":Username", $username);
        $stmt->execute();
        if ($stmt->rowCount() != 1) return "Benutzername inkorrekt";
        $row = $stmt->fetch();
        if (self::checkPassword($password, $row['password_hash'])) {
            if (self::getTrys($username) > 0) {
                self::resetTrys($username);
                return "LOG SUCC";
            } else {
                return "Passwort wurde zu oft falsch eingegeben!\nBitte einen Administrator ansprechen";
            }
        } else {
            if (self::getTrys($username) > 0) {
                self::removeTry($username);
                return "Falsches Passwort!\nVerbleibende Versuche: " . self::getTrys($username);
            }
            return "Passwort wurde zu oft falsch eingegeben!\nBitte einen Administrator ansprechen";
        }
    }

    public static function checkInput($username, $password)
    {
        if (!isset($username)) return "Kein Benutzername angegeben";
        if (!isset($password)) return "Kein Passwort angegeben";
        if (!strlen($password) >= 6) return "Passwort ist zu kurz";
        return "";
    }

    public static function checkPassword($password, $passwordDb)
    {
        if (substr($passwordDb, 0, 1) == "$") {
            if (password_verify($password, $passwordDb)) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

    public static function removeTry($username)
    {
        $gdbh = globaldb();

        $stmt = $gdbh->prepare('UPDATE user SET trys = trys - 1 WHERE username = :Username');
        $stmt->bindParam(":Username", $username);
        $stmt->execute();

    }

    public static function resetTrys($username)
    {
        $gdbh = globaldb();

        $stmt = $gdbh->prepare('UPDATE user SET trys = 3 WHERE username = :Username');
        $stmt->bindParam(":Username", $username);
        $stmt->execute();
    }

    public static function getTrys($username)
    {
        $gdbh = globaldb();

        $stmt = $gdbh->prepare('SELECT trys FROM user WHERE username = :Username');
        $stmt->bindParam(":Username", $username);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {

            $row = $stmt->fetch();
            return $row['trys'];

        } else {
            return 0;
        }
    }
}