<html>
<head>
<?php

	include('./include/logged_in.php');
	include('./include/config.php');

?>
</head>
<body>

<center><h2><font face="arial">BERICHTEN</font></h2></center>
<table align=center bgcolor="#E9E9E9" cellspacing="0" cellpadding="0">

<FORM name="berichten" method="post" action="berichttoegevoegd.php">

<select name="keuze">

<?php
	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");
		$result = mysql_query("SELECT login FROM users");
		while ($rij = mysql_fetch_array($result)) {
			if ($rij[login] == 'boekhouding') { break; }
			  else {echo "<OPTION value=\"$rij[login]\">$rij[login]</OPTION>";
		  	       }
		}
		echo "<OPTION value=\"iedereen\">iedereen</OPTION>";
?>
</select>

<br>
<tr><td>Bericht</td></tr>
<span style="font-size:4.0pt;margin-left:5pt">&nbsp;</span>
<tr><td><TEXTAREA NAME="bericht" ROWS="10" COLS="100"></TEXTAREA></td></tr>
</table>
<br><center><input type="submit" value="Verder">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Wissen"></center>
</form>
</body>
</html>