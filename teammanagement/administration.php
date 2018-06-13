<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('system/loginsession_tester.php');

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style/administration_style.css">
    <link rel="stylesheet" href="style/header_style.css">
    <title>Pixl-Planning | Home</title>
    <link rel="icon" type="image/png" href="grafiken/logo.png" sizes="32x32">
</head>
<body>

<?php
	include('backend_handler/header.php');
	include_once ('system/classes/class.system_connector.php');
?>

<div class="maindiv">
    <div class="titlediv">
      <h1 id="title1">Systemeinstellungen</h1>
    </div>
    
    <div class="settings_container">
		<div class="settingdiv1">
		  <h2 id="title1">Meldung:</h2>
		  <form method="post" action="backend_handler/edit_header_alert.php">
			  <input type="text" name="labelinput" id="input_alert_text" placeholder="Meldung" required="required" maxlength="100" value="<?php echo (system\classes\system_connector::getHeaderAlertText());?>">
			  <br>
			  <input type="checkbox" name="checkbox" id="ckb_enable_alert"<?php  if(system\classes\system_connector::getHeaderAlertStatus() == 1) echo "checked";?>>
			  <label id="enable_alert_label" for="ckb_enable_alert">Meldung anzeigen?</label>

			  <input id="button_orange" type="submit" value="speichern">
		  </form>
		</div>

		<div class="settingdiv2">
			
		</div>
    </div>    
</div>
</body>
</html>