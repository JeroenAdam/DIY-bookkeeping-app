<?php
include('../include/logged_in.php');
include("../include/config.php");

	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("boekhouding") or die("geen database beschikbaar met naam boekhouding");


if (!empty($_POST)){
	// Eerst controleren of login al bestaat in database
	$login = $_POST["login"];
	$wachtwoord = $_POST["wachtwoord"];
	$query = "SELECT * from users WHERE login='$login';";
	$result = mysql_query($query) or die ("FOUT: " . mysql_error());
	if (mysql_num_rows($result) > 0) {
		// login al aanwezig in de database, foutmelding tonen
		$tekst = "Deze login (<b>$login</b>) bestaat al\n. 
			<a href=\"" . $_SERVER["PHP_SELF"] ."\">Opnieuw registreren</a>\n";
		die($tekst);	
	}else{
		// OK, Query opbouwen
		$query="INSERT INTO users (login, wachtwoord) VALUES ('$login', md5('$wachtwoord'))";
		$result = mysql_query($query) or die ("FOUT: " . mysql_error());
		$tekst = "Bedankt voor uw aanmelding. 
			U kunt nu <a href=\"../index.php\">inloggen</a>";
		die ($tekst);
	}
}
?>
<html>
<head>
<title>Registreren</title>
</head>

<body>
<h2>Registeren</h2>
Welkom, u kunt zich hier registreren.
<hr>
<form name="form1" method="post" action="<?php echo($_SERVER["PHP_SELF"]);?>">
Login: <input name="login" type="text"
	size="30" maxlength="40"> (maximaal 40 tekens)<br>
Wachtwoord: <input name="wachtwoord" type="password"
	size="10" maxlength="8"> (maximaal 8 tekens)<br>
	<input type="submit" name="submit" value="Registeren">
	<input name="reset" type="reset" value="Leegmaken">
</form>
</body>
</html>
