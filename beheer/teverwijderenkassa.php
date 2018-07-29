<html>
<head>
	<title>Kassaverkoop verwijderen</title>
</head>
<body>

<?php
include('../include/logged_in.php');
include('../include/config.php');
$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
$conndb = mysql_select_db("boekhouding") or die("geen database beschikbaar met naam boekhouding");

	
	$queryrecords = mysql_query("SELECT MAX(id) FROM kassa");
	$laatsterecord = mysql_result($queryrecords, 0, 0);
	$query = mysql_query ("SELECT * FROM kassa WHERE id=$laatsterecord");
	$result = mysql_fetch_array($query) or die ("FOUT: " . mysql_error());
	$saldovoor = $result[saldo];

	$query2 = mysql_query ("SELECT * FROM kassa WHERE id='". $_GET["id"] ."'");
	$result2 = mysql_fetch_array($query2) or die ("FOUT: " . mysql_error());
	$bedrag = $result2[bedrag];

	$saldo = $saldovoor - $bedrag;

	$querydelete="DELETE FROM kassa WHERE id='". $_GET["id"] ."'"; 
	$result3 = mysql_query($querydelete) or die ("FOUT: " . mysql_error());

	$queryrecordsopnieuw = mysql_query("SELECT MAX(id) FROM kassa");
	$laatsterecordopnieuw = mysql_result($queryrecordsopnieuw, 0, 0);
	$update = "UPDATE kassa SET saldo='$saldo' WHERE id=$laatsterecordopnieuw";	
	$sql = mysql_query($update) or die ( mysql_error( ) );

	if ($result3){
	
	$queryrecords = mysql_query("SELECT MAX(id) FROM kassa");
	$laatsterecord = mysql_result($queryrecords, 0, 0);
	$query = mysql_query ("SELECT * FROM kassa WHERE id=$laatsterecord");
	$result = mysql_fetch_array($query) or die ("FOUT: " . mysql_error());

		$saldo = $result[saldo];
		$update = "UPDATE kassa SET saldo='$saldo'";	

	header("Location: ../kassa.php");
	}

?>
</body>
</html>
