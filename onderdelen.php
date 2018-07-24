<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>Budget Computers - Prijslijst onderdelen - Tel.: 09 / 383 00 25</TITLE>
<?php

	include('./include/logged_in.php');
	include('./include/config.php');

?>
</HEAD>

<BODY bgcolor="white">

<?php
	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("budgetcomputers") or die("geen database beschikbaar met naam budgetcomputers");

	echo ("\n<TABLE width=\"100%\" border=\"0\">");

 	if (!empty($_POST)) {
		reset ($_POST);
			while (list($onderdeel) = each ($_POST)) {
			if ($onderdeel != "submit") {

		$onderdeel_up = $onderdeel;
		if ($onderdeel == "_nieuw") $onderdeel_up = "nieuw";
		if ($onderdeel == "cdrom") $onderdeel_up = "cd/dvd/writer";
		if ($onderdeel == "hdd") $onderdeel_up = "hard disk";
		if ($onderdeel == "iocard") $onderdeel_up = "i/o card";
		if ($onderdeel == "diskdrive") $onderdeel_up = "disk drive";
		if ($onderdeel == "digitalcameras") $onderdeel_up = "digital cameras";
		if ($onderdeel == "mp3player") $onderdeel_up = "mp3 players";
		$onderdeel_up = strtoupper($onderdeel_up);


				echo ("\n<TR><TD width=\"600\"><b>$onderdeel_up</b></TD></TR>");
				$result = mysql_query("SELECT description, prijs FROM $onderdeel");
				while ($row = mysql_fetch_array($result)) {
					echo ("<TR><TD width=\"800\">\n$row[description]</TD><TD width=\"100\">");
				if ($row["prijs"] != "0.00") echo("$row[prijs]</TD></TR>");
				else echo "&nbsp</TD></TR>";

				}
				echo "\n<TR><TD>&nbsp</TD></TR>";
			}
		}echo "\n</TABLE>";

	}

	else { echo ("Geen onderdelen geselecteerd!</TABLE><br>\n<a href=\"prijzenafdrukken.php\">Terugkeren</a>"); }



?>

</BODY>

</HTML>