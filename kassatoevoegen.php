<html>
<head>
<?php

	include('./include/logged_in.php');
	include('./include/config.php');

?>
</head>
<body>

<center><h2><font face="arial">KASSAVERKOOP TOEVOEGEN</font></h2></center>
<table align=center bgcolor="#E9E9E9" cellspacing="0" cellpadding="0">

<FORM name="kassa" method="post" action="kassatoegevoegd.php">

<tr><td><input type="text" name="omschrijving" size="70"></td><td><input type="text" name="bedrag" size="8"></td></tr>

</table>

<br><center><input type="submit" value="Verder">&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Wissen"></center>


</form>
</body>
</html>