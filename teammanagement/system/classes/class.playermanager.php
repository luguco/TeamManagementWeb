<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 26.05.2018
 * Time: 16:43
 */
namespace system\classes;

include_once('database_connector.php');
ini_set('display_errors','1');
error_reporting(E_ALL) ;

class playermanager
{
    public static function getUUID($username)
    {
        $dgbh = globaldb();
        $stmt = $dgbh->prepare("SELECT uuid FROM user WHERE username = :Username");
        $stmt->bindParam(":Username", $username);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row['UUID'];
    }
}