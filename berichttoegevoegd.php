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
		$persoon = $_POST[keuze];
		$bericht = $_POST[bericht];
		$tijd = date("d/m/Y h:i");
		if (($persoon == "iedereen") AND ($username == "jeroen"))
               {
			mysql_query("INSERT INTO berichten(persoon, bericht, tijdstip) VALUES('anke','$bericht','$tijd');")or die("Create table Error: ".mysql_error());
			mysql_query("INSERT INTO berichten(persoon, bericht, tijdstip) VALUES('hilde','$bericht','$tijd');")or die("Create table Error: ".mysql_error());
			header("Location: factuurmaken.php");
		   }
		elseif (($persoon == "iedereen") AND ($username == "anke"))
               {
			mysql_query("INSERT INTO berichten(persoon, bericht, tijdstip) VALUES('jeroen','$bericht','$tijd');")or die("Create table Error: ".mysql_error());
			mysql_query("INSERT INTO berichten(persoon, bericht, tijdstip) VALUES('hilde','$bericht','$tijd');")or die("Create table Error: ".mysql_error());
			header("Location: factuurmaken.php");
		   }
		elseif (($persoon == "iedereen") AND ($username == "hilde"))
               {
			mysql_query("INSERT INTO berichten(persoon, bericht, tijdstip) VALUES('anke','$bericht','$tijd');")or die("Create table Error: ".mysql_error());
			mysql_query("INSERT INTO berichten(persoon, bericht, tijdstip) VALUES('jeroen','$bericht','$tijd');")or die("Create table Error: ".mysql_error());
			header("Location: factuurmaken.php");
		   }
		else {
			mysql_query("INSERT INTO berichten(persoon, bericht, tijdstip) VALUES('$persoon','$bericht','$tijd');")or die("Create table Error: ".mysql_error());
			header("Location: factuurmaken.php");
		     }
	}
	//header("Location: factuurmaken.php");
?>
</BODY>

</HTML>