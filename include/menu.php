<table align=center cellspacing="0" cellpadding="0">
<tr><td class="topmenucol">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="factuurmaken.php" class="menu">FACTUREN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="klanten.php" class="menu">KLANTEN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="prijzenafdrukken.php" class="menu">PRIJSLIJST</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="offertemaken.php" class="menu">OFFERTES</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="berichten.php" class="menu">BERICHTEN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="kassa.php">KASSA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

	if ($username == "$Administrator")
      {
	   echo "<a href=\"beheer.php\">BEHEER</a>&nbsp;&nbsp;&nbsp;&nbsp;";
	}
?>
</td></tr>
</table>
