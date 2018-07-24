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
<tr><td><input type="text" name="omschrijving[0]" size="70"></td><td><input type="text" name="aantal[0]" size="3"></td><td><input type="text" name="stukprijs[0]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[1]" size="70"></td><td><input type="text" name="aantal[1]" size="3"></td><td><input type="text" name="stukprijs[1]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[2]" size="70"></td><td><input type="text" name="aantal[2]" size="3"></td><td><input type="text" name="stukprijs[2]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[3]" size="70"></td><td><input type="text" name="aantal[3]" size="3"></td><td><input type="text" name="stukprijs[3]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[4]" size="70"></td><td><input type="text" name="aantal[4]" size="3"></td><td><input type="text" name="stukprijs[4]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[5]" size="70"></td><td><input type="text" name="aantal[5]" size="3"></td><td><input type="text" name="stukprijs[5]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[6]" size="70"></td><td><input type="text" name="aantal[6]" size="3"></td><td><input type="text" name="stukprijs[6]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[7]" size="70"></td><td><input type="text" name="aantal[7]" size="3"></td><td><input type="text" name="stukprijs[7]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[8]" size="70"></td><td><input type="text" name="aantal[8]" size="3"></td><td><input type="text" name="stukprijs[8]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[9]" size="70"></td><td><input type="text" name="aantal[9]" size="3"></td><td><input type="text" name="stukprijs[9]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[10]" size="70"></td><td><input type="text" name="aantal[10]" size="3"></td><td><input type="text" name="stukprijs[10]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[11]" size="70"></td><td><input type="text" name="aantal[11]" size="3"></td><td><input type="text" name="stukprijs[11]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[12]" size="70"></td><td><input type="text" name="aantal[12]" size="3"></td><td><input type="text" name="stukprijs[12]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[13]" size="70"></td><td><input type="text" name="aantal[13]" size="3"></td><td><input type="text" name="stukprijs[13]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[14]" size="70"></td><td><input type="text" name="aantal[14]" size="3"></td><td><input type="text" name="stukprijs[14]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[15]" size="70"></td><td><input type="text" name="aantal[15]" size="3"></td><td><input type="text" name="stukprijs[15]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[16]" size="70"></td><td><input type="text" name="aantal[16]" size="3"></td><td><input type="text" name="stukprijs[16]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[17]" size="70"></td><td><input type="text" name="aantal[17]" size="3"></td><td><input type="text" name="stukprijs[17]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[18]" size="70"></td><td><input type="text" name="aantal[18]" size="3"></td><td><input type="text" name="stukprijs[18]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[19]" size="70"></td><td><input type="text" name="aantal[19]" size="3"></td><td><input type="text" name="stukprijs[19]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[20]" size="70"></td><td><input type="text" name="aantal[20]" size="3"></td><td><input type="text" name="stukprijs[20]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[21]" size="70"></td><td><input type="text" name="aantal[21]" size="3"></td><td><input type="text" name="stukprijs[21]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[22]" size="70"></td><td><input type="text" name="aantal[22]" size="3"></td><td><input type="text" name="stukprijs[22]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[23]" size="70"></td><td><input type="text" name="aantal[23]" size="3"></td><td><input type="text" name="stukprijs[23]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[24]" size="70"></td><td><input type="text" name="aantal[24]" size="3"></td><td><input type="text" name="stukprijs[24]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[25]" size="70"></td><td><input type="text" name="aantal[25]" size="3"></td><td><input type="text" name="stukprijs[25]" size="8"></td></tr>
<tr><td><input type="text" name="omschrijving[26]" size="70"></td><td><input type="text" name="aantal[26]" size="3"></td><td><input type="text" name="stukprijs[26]" size="8"></td></tr>
</table>
<br><center><input type="submit" value="Verder">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Wissen"></center>
</form>
<center><a href="offertes.php">OFFERTE AFDRUKKEN</a></center>
</body>
</html>