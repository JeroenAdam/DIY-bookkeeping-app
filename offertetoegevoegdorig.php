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
		$klant = $_POST[klant];
		$omschrijving = $_POST[omschrijving];
		$aantal = $_POST[aantal];
		$stukprijs = $_POST[stukprijs];
		// offertenummer aanroepen en in variabele $offertenr steken
		$queryrecords = mysql_query ("SELECT MAX(id) FROM offertes");
		$laatsteoffertenummer = mysql_result($queryrecords, 0, 0);
		$count = count($omschrijving);
		 for($i=0 ; $i < $count ; $i++){
			if (!empty($omschrijving[$i])) {
			$stukprij = $stukprijs[$i];
			$stukpr = str_replace(",",".",$stukprij);
			$stukp = ($stukpr / 1.21);
			$bedrag = ($aantal[$i] * $stukp);
			$totaalexcl = $totaalexcl + $bedrag;
			$btwbedrag = ($totaalexcl * 0.21);
			$totaalincl = ($totaalexcl + $btwbedrag);
			$vandaag = date("Ymd");
			mysql_query("INSERT INTO offerteomschrijving(offertenummer, omschrijving, aantal, stukprijs, bedrag) VALUES('$laatsteoffertenummer','$omschrijving[$i]','$aantal[$i]','$stukp','$bedrag');")or die("Create table Error: ".mysql_error());
			}
		 }
		mysql_query("INSERT INTO offertes(klantnummer, datum, totaalexcl, btwbedrag, totaalincl) VALUES('$klant','$vandaag','$totaalexcl','$btwbedrag','$totaalincl');")or die("Create table Error: ".mysql_error());
		header("Location: nieuweofferte.php");
	}

?>
</BODY>

</HTML>