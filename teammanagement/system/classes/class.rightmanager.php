<?php
/**
 * Created by PhpStorm.
 * User: luguco
 * Date: 10.06.2018
 * Time: 14:28
 */

namespace system\classes;

include_once('database_connector.php');

class rightmanager
{
    public static function userHasPermission($permission, $username){

        $dgbg = globaldb();
        $stmt = $dgbg->prepare("SELECT rights.right_name FROM rights, grouprights, groupplayer, user WHERE grouprights.r_id = rights.r_id AND grouprights.g_id = groupplayer.g_id AND groupplayer.p_id = user.uuid AND user.username = :User AND rights.right_name = :Perm GROUP BY rights.right_name");
        $stmt->bindParam(":User", $username);
        $stmt->bindParam(":Perm", $permission);
        $stmt->execute();

        if($stmt->rowCount() == 1){
            return true;
        }else{
            return false;
        }
    }

    public static function setPermission($group, $permission, $value){

        if($value){

        }else{

        }

    }
    //Get all user permissions
    //SELECT rights.right_name FROM rights, grouprights, groupplayer, user WHERE grouprights.r_id = rights.r_id AND grouprights.g_id = groupplayer.g_id AND groupplayer.p_id = user.uuid AND user.username = 'LaetzPlaey' GROUP BY rights.right_name
}