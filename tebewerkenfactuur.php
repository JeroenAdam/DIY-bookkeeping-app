<?php
include('./include/logged_in.php');
include('./include/config.php');
$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");


if (isset($_POST["bevestiging"])){
	$query="UPDATE facturen SET
		id = '". $_POST["id"] ."',
		klantnummer = '". $_POST["klantnummer"] . "',
		datum = '". $_POST["datum"] . "'
		WHERE id='" .$_POST["id"] ."'";
	$id3 = $_POST[id3];
	$omschrijving = $_POST[omschrijving];
	$aantal = $_POST[aantal];
	$stukprijs = $_POST[stukprijs];
	$count = count($omschrijving);
		 for($i=1 ; $i <= $count ; $i++){
		   if (!empty($omschrijving[$i])) {
			$bedrag = ($aantal[$i] * $stukprijs[$i]);
			$totaalexcl = $totaalexcl + $bedrag;
			$btwbedrag = $totaalexcl * 0.21;
			$totaalincl = $totaalexcl + $btwbedrag;
			$id4 = $id3[$i];
			$oms = $omschrijving[$i];
			$aan = $aantal[$i];
			$stu = $stukprijs[$i];
		$query2 = "UPDATE omschrijving SET
			omschrijving = '$oms',
			aantal = '$aan',
			stukprijs = '$stu',
			bedrag = '$bedrag'
			WHERE id = '$id4'";
  		$query3 = "UPDATE facturen SET
			totaalexcl = '$totaalexcl',
			btwbedrag = '$btwbedrag',
			totaalincl = '$totaalincl'
			WHERE id='" .$_POST["id"] ."'";
		$result2 = mysql_query($query2) or die ("FOUT: " . mysql_error());
		$result3 = mysql_query($query3) or die ("FOUT: " . mysql_error());
	          }
		  }
	$result = mysql_query($query) or die ("FOUT: " . mysql_error());

	if ($result) {
	header("Location: facturen.php");
	}
}else{
		$temp=($_GET["id"]-1);
		$query="SELECT id, klantnummer, datum FROM facturen WHERE id='" .$_GET["id"] ."'";
		$query2="SELECT id, omschrijving, aantal, stukprijs FROM omschrijving WHERE factuurnummer='$temp'";
		$result = mysql_query($query) or die ("FOUT: " . mysql_error());
		$result2 = mysql_query($query2) or die ("FOUT: " . mysql_error());
?>
<html>
<head>
	<title>Factuurgegevens aanpassen</title>
</head>
<body bgcolor="#E9E9E9">
<center><h2>Wijzig de gegevens</h2></center>
<?php
while (list($id, $klantnummer, $datum) = mysql_fetch_row($result)){
	$id2=$id;
	$kln=$klantnummer;
	$dat=$datum;
}
?>
<table align=center>
<form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="post">
		<input type="hidden" name="bevestiging" value="1">
Factuurnr.:	<input type="text" name="id" value="<?php echo($id2);?>" size="10"><br>
Klantnr.:		<input type="text" name="klantnummer" value="<?php echo($kln);?>" size="30"><br>
Datum:	<input type="text" name="datum" value="<?php echo($dat);?>" size="30"><br><br>

<?php
$teller = 0;
while (list($id, $omschrijving, $aantal, $stukprijs) = mysql_fetch_row($result2)){
	$id3=$id;
	$oms=$omschrijving;
	$aan=$aantal;
	$stu=$stukprijs;
	// hier wordt het aantal lijnen in de variabele teller gestoken
	$teller++;
	echo "<input type=\"hidden\" name=\"id3[$teller]\" value=\"$id3\">";
	echo "&nbsp;<input type=\"text\" name=\"omschrijving[$teller]\" value=\"$oms\" size=\"70\">";
	echo "<input type=\"text\" name=\"aantal[$teller]\" value=\"$aan\" size=\"3\">";
	echo "<input type=\"text\" name=\"stukprijs[$teller]\" value=\"$stu\" size=\"8\"><br>";
	}
?>
<br><center><A HREF="lijntoevoegen.php?id=<?php echo"$_GET[id]"; ?>">Lijn toevoegen</A>
<br><br><hr><br>
<input type="Submit" value="Bijwerken">
<input type="Button" value="Terug" onclick="javascript:history.back();">
</form>
</table>
<?php
}
?>

</body>
</html>
