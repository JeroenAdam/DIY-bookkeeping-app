<html>
<title>BETALING</title>
<head>

<?php
	include('./include/logged_in.php');
	include('./include/config.php');
?>

</head>
<body>

<?php

    $conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

$query = "UPDATE facturen SET
			betaling ='" .$_GET["bet"] ."'
			WHERE id='" .$_GET["id"] ."'";
$result = mysql_query($query) or die ("FOUT: " . mysql_error());
header("Location: factuurmaken.php");

?>

</body>
</html>