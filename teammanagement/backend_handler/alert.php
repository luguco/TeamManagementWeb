<style>
  #p_red {
    color: white;
    fonz-size: 24px;
    border-style: solid;
    border-bottom-style: dotted;
    border-width: 1px;
    border-left-width: 10px;
    border-radius: 4px;
    background-color: red;
    border-color: red;
    border-left-color: #BD1818;  
    width: 30%;
    min-width: 450px;
    margin: 25px auto 0px auto;
    padding: 10px;
  }
</style>

<?php
include ("system/classes/class.system_connector.php");

$res = system\classes\system_connector::getHeaderAlert();

if($res != "xXNot-FoundXx") {
    echo "<p id='p_red'>" . $res . "</p>";
}
?>