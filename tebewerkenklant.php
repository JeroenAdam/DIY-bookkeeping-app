<html>
<head>
	<title>Klantenbestand</title>
</head>

<?php
	include('./include/logged_in.php');
	include('./include/config.php');
?>

<link rel="stylesheet" type="text/css" href="style/boekhouding.css" />

<?php
	include('class.FormHandler.php');
	include('./include/menu.php');
?>

<br>
<div class="klantenfiche">KLANTENFICHE</div>
<br>

<?php
	$db    = "$DBName";
	$table = "KLANTEN";

// make a new form object
$form = new FormHandler;

// permit editing
$form->PermitEdit();

// set the database data
$form->useDatabase($db, $table);

// set the table settings
$form->TableSettings(275, 0, 2, 2, 'background-color: #E9E9E9;', 'align=center');

// generate a field
$form->Textfield("Klantnr.", "id");
$form->Textfield("Naam", "klantnaam");
$form->Textfield("Straat", "klantstraat");
$form->Textfield("Plaats", "klantplaats");
$form->Textfield("Telefoon", "klanttelefoon");
$form->Textfield("BTW nr.", "klantbtw");

// buttons
$form->submitBtn();

// What to do if the data is saved?
$form->OnSaved("doRun");

// flush
$form->FlushForm();

// the 'commit after form' function
function doRun($id, $data) {
header("Location: factuurmaken.php");
}

?>