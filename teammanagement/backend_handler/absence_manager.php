<?php

include('../system/classes/class.absencemanager.php');
session_start();
$err = system\classes\absencemanager::newAbsence($_SESSION['username'], $_POST['reason'], $_POST['datepicker_begin'], $_POST['datepicker_end']);

if ($err == "SUCC") {
    echo "Abwesenheit erfolgreich hinzugefügt";
    //header("Location: /teammanagement/index.php");
} else {
    $_SESSION['error'] = $err;
    header("Location: /teammanagement/abwesenheit_hinzufuegen.php");
}