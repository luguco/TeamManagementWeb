<?php
ini_set('display_errors','1');
error_reporting(E_ALL) ;

session_start();

include ('../system/classes/class.loginmanager.php');

$err = system\classes\loginmanager::Login($_POST['username'], $_POST['password']);

if($err == "LOG SUCC"){
    $_SESSION['logindate'] = time();

    $_SESSION['username'] = $_POST['username'];
    unset($_POST['username']);
    unset($_POST['password']);

    header("Location: /teammanagement/index.php");
}else{
    $_SESSION['error'] = $err;
    unset($_POST['username']);
    unset($_POST['password']);
    header("Location: /teammanagement/login.php");
}