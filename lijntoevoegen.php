<html>
<head>
	<title>Factuurgegevens aanpassen</title>
<META content="no-cache">

<?php
	include('./include/logged_in.php');
	include('./include/config.php');

?>

</head>
<body bgcolor="#E9E9E9">
<center><h2>Lijn toevoegen</h2></center>

<?php

	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

	$factuur = $_GET['id'];
	$factuurquery = ($_GET['id']-1);
	mysql_query("INSERT INTO omschrijving(factuurnummer, omschrijving, aantal, stukprijs, bedrag) VALUES('$factuurquery','','','','');")or die("Create table Error: ".mysql_error());
	header("Location: tebewerkenfactuur.php?id=$factuur");



?>

</body>
</html>

