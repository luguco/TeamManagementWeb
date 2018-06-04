<?php
//HIER LOGINÜBERPRÜFUNG EINBAUEN
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Abwesenheit eintragen</title>
    <link rel="stylesheet" href="style/main_style.css">
    <link rel="stylesheet" href="style/text_style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker_begin" ).datepicker();
            $( "#datepicker_end" ).datepicker();
        } );
    </script>
</head>
<body>
<?php
session_start();
$err = $_SESSION['error'];
if (!is_null($err)) {
    echo '<label id="errmsg"><br>' . $err . '</label>';
    $_SESSION['error'] = null;
}
?>
<form method="post" action="backend_handler/absence_manager.php">
    <input type="text" id="datepicker_begin" placeholder="Datum von" required="required">
    <input type="text" id="datepicker_end" placeholder="Datum bis" required="required">
    <input type="submit" value="Hinzufügen">
</form>

</body>
</html>