<html>
<head>
	<title>Klantenbestand</title>
</head>

<?php
	include('../include/logged_in.php');
	include('../include/config.php');
?>

<link rel="stylesheet" type="text/css" href="../style/boekhouding.css" />

<?php
	include('../class.FormHandler.php');

    $conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("boekhouding") or die("geen database beschikbaar met naam boekhouding");
?>

<br>
<div class="klantenfiche"><b>KOSTEN INGEVEN</b></div>

<?php
	$db    = "boekhouding";
	$table = "kosten";

// make a new form object
$form = new FormHandler;

// permit editing
$form->PermitEdit();

// set the database data
$form->useDatabase($db, $table);

// set the table settings
$form->TableSettings(275, 0, 2, 2, 'background-color: #E9E9E9;', 'align=center');

// generate a field
$form->Textfield("Datum", "datum");
$form->Textfield("Categorie", "categorie");
$form->Textfield("Omschrijving", "omschrijving");
$form->Textfield("Totaal Excl. BTW", "totaalexcl");
$form->Textfield("BTW-bedrag", "btwbedrag");
$form->Textfield("Bedrijfsmiddelen", "bedrijfsmiddelen");

// buttons
$form->submitBtn();

// What to do if the data is saved?
$form->OnSaved("doRun");

// flush
$form->FlushForm();

// the 'commit after form' function
function doRun($id, $data) {
header("Location: kostenaanvullen.php");
}

?>