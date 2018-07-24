<html>
<head>

<SCRIPT>

function doBlink() {
  var blink = document.all.tags("BLINK")
  for (var i=0; i < blink.length; i++)
    blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : ""
}

function startBlink() {
  // Make sure it is IE4
  if (document.all)
    setInterval("doBlink()",250)
}
window.onload = startBlink;
</SCRIPT>

<?php

	include('./include/logged_in.php');
	include('./include/config.php');

?>

<link rel="stylesheet" type="text/css" href="style/boekhouding.css" />

</head>
<body>

<?php

	include('./include/menu.php');

?>

<br>
<table align=center bgcolor="#E9E9E9" cellspacing="0" cellpadding="0">

<FORM name="klantkiezen" method="post" action="offertetoegevoegd.php">

<select name="klant"><OPTION>--------------    Kies een klant    --------------</Option>

<?php

		$result = mysql_query("SELECT id, klantnaam FROM KLANTEN ORDER BY klantnaam");
		while ($rij = mysql_fetch_array($result)) {
		echo "<OPTION value=\"$rij[id]\">$rij[klantnaam]</OPTION>";	}
?>
</select>
<?php
		$query = mysql_query("SELECT berichtengelezen FROM users WHERE login='$username'");
		$rijberichtengelezen = mysql_fetch_array($query);
		$berichtengelezen = $rijberichtengelezen[berichtengelezen];

		$query2 = mysql_query ("SELECT tijdstip FROM berichten WHERE persoon='$username'");
		while ($rijberichten = mysql_fetch_array($query2)) {
		   if ($berichtengelezen < $rijberichten[tijdstip])
		   {     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face=\"Arial\" color=\"red\"><b><BLINK SPEED=250>Er zijn nieuwe berichten</BLINK></b></font>";
			   break;
		   }
		}
?>


</font>


<br>
<tr><td>Omschrijving</td><td>Aant.</td><td>Incl. BTW</td></tr>
<span style="font-size:4.0pt;margin-left:5pt">&nbsp;</span>
<tr>
<td><textarea cols='70' rows='27' name='omschrijving'></textarea></td>
<td><textarea cols='3' rows='27' name='aantal'></textarea></td>
<td><textarea cols='8' rows='27' name='stukprijs'></textarea></td>
</tr>
</table>
<br><center><input type="submit" value="Verder">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Wissen"></center>
</form>
<center><a href="offertes.php">OFFERTE AFDRUKKEN</a></center>
</body>
</html>