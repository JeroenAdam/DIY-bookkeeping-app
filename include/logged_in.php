<?php session_start();
if (!isset($_SESSION["username"])){
	$tekst = "<h2>U bent nog niet aangemeld.</h2>
		U kunt <a href=\"index.php\">hier inloggen</a>";
	echo($tekst);
	exit();
}?>