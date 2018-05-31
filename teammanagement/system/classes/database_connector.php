<?php
function globaldb()
{
    try {
        $gdbh = new PDO('mysql:host=78.46.149.85;dbname=pixlcloud_team', 'root', 'RHEuturkLJuCCuHvR3fK', array(
            PDO::ATTR_PERSISTENT => true
        ));
        return $gdbh;
    } catch (PDOException $e) {
        echo $e;
        die;
    }
}