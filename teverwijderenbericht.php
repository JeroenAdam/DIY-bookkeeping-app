<html>
<head>
	<title>Bericht verwijderen</title>
</head>
<body>

<?php
include('./include/logged_in.php');
include('./include/config.php');
$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

	$query="DELETE FROM berichten WHERE id='". $_GET["id"] ."'";
	$result = mysql_query($query) or die ("FOUT: " . mysql_error());
	if ($result){
	header("Location: berichten.php");
	}

?>
</body>
</html>
