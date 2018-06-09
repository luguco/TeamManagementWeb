<?php
include('system/loginsession_tester.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pixl-Planning | Abwesenheit</title>
    <link rel="icon" type="image/png" href="grafiken/logo.png" sizes="32x32">

    <link rel="stylesheet" href="style/main_style.css">
    <link rel="stylesheet" href="style/abwesenheit_hinzufügen_style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker_begin").datepicker();
            $("#datepicker_end").datepicker();
            $("#datepicker_begin").datepicker("option", "dateFormat", 'yy-mm-dd');
            $("#datepicker_end").datepicker("option", "dateFormat", 'yy-mm-dd');
        });
    </script>
</head>
<body>

<div class="logodiv">
    <img src="grafiken/logo.png" alt="Logo von Pixl-Gaming" id="logo">
</div>

<div class="maindiv">
  <h1 id="ueberinfo1">Abwesenheit hinzufügen:</h1>
    
  <form method="post" action="backend_handler/absence_manager.php">
      <input style="width: 80%; height: 35px; margin: 25px 0px 0px 40px;" type="text" name="reason" id="reason" required="required" placeholder="Grund">
       
      <input style="width: 80%; height: 35px; margin: 25px 0px 0px 40px;" type="text" name="datepicker_begin" id="datepicker_begin" placeholder="Datum von" required="required">
        
      <input style="width: 80%; height: 35px; margin: 10px 0px 0px 40px;" type="text" name="datepicker_end" id="datepicker_end" placeholder="Datum bis" required="required">
      
      <br><input id="button_blue" style="margin: 10px 0px 0px 40px;" type="submit" value="Hinzufügen">
        
      <a id="button_red" style="margin: 10px 0px 0px 10px; text-decoration: none;" href="alle_abwesenheiten.php">zurück</a>
  </form>
  <p style="color: white; margin: 38px 0px 0px 20px; font-size: 12px;">developed by Luguco and LaetzPlaey | c2018</p>
</div>
</body>
</html>