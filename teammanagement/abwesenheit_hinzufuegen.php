<?php
include ('system/loginsession_tester.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Abwesenheit eintragen</title>
    <link rel="stylesheet" href="style/main_style.css">
    <link rel="stylesheet" href="style/text_style.css">
    <link rel="stylesheet" href="style/abwesenheit_hinzufügen_style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker_begin").datepicker();
            $( "#datepicker_end" ).datepicker();
            $( "#datepicker_begin" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
            $( "#datepicker_end" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
        } );
    </script>
</head>
<body>
<!--
<div><?php
  session_start();
  $err = $_SESSION['error'];
  if (!is_null($err)) {
      echo '<label id="errmsg"><br>' . $err . '</label>';
      $_SESSION['error'] = null;
}
?></div>
-->

<div class="maindiv">
  <form method="post" action="backend_handler/absence_manager.php">
      <input style="width: 80%; height: 35px; margin: 50px 0px 0px 40px;" type="text" name="datepicker_begin" id="datepicker_begin" placeholder="Datum von" required="required">
      <input style="width: 80%; height: 35px; margin: 10px 0px 0px 40px;" type="text" name="datepicker_end" id="datepicker_end" placeholder="Datum bis" required="required">
      <br><input id="button_blue" style ="margin: 10px 0px 0px 40px;" type="submit" value="Hinzufügen">
      <a id="button_red" style="margin: 10px 0px 0px 10px; text-decoration: none;" href="index.php">zurück</a>
  </form>
  <p id="info_p">Mit dieser Funktion blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla blabla</p>
</div>  

</body>
</html>