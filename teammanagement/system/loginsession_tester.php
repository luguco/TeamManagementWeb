<?php
session_start();

if(isset($_SESSION['logindate']) && $_SESSION['logindate'] + 3600 > time()){
    $_SESSION['logindate'] = time();
}else{
    unset($_SESSION['logindate']);
    header("Location: /teammanagement/login.php");
    die();
}
