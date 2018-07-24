<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>KLANTEN</TITLE>
<?php
	include('./include/logged_in.php');
	include('./include/config.php');

?>
</HEAD>

<BODY bgcolor="#8C9DEC">

<?php
	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

	if (!empty($_POST)) {
		reset ($_POST);
		$omschrijving = $_POST[omschrijving];
		$bedrag = $_POST[bedrag];
		$vandaag = date("Ymd");

			$queryrecords = mysql_query("SELECT MAX(id) FROM kassa");
			$laatsterecord = mysql_result($queryrecords, 0, 0);

			$query = mysql_query ("SELECT saldo FROM kassa WHERE id=$laatsterecord");
			$result = mysql_fetch_array($query);
		   $saldo = $result[saldo];
		$saldo = $saldo + $bedrag;
		mysql_query("INSERT INTO kassa(datum, omschrijving, bedrag, saldo) VALUES('$vandaag','$omschrijving','$bedrag','$saldo');")or die("Create table Error: ".mysql_error());
		header("Location: factuurmaken.php");

	}
	//header("Location: factuurmaken.php");
?>
</BODY>

</HTML>