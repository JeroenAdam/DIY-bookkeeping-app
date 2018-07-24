<?php
session_start(); // sessie beginnen
// controleren of pagina correct is aangeroepen.
if (!empty($_POST)){
	include("./include/config.php");
	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

	$wachtwoordmd5 = md5($_POST["wachtwoord"]);
	$query = "SELECT login, wachtwoord FROM users
				WHERE login='" . $_POST["login"] ."'
				AND wachtwoord='$wachtwoordmd5'";
	$result = mysql_query($query) or die("FOUT : " . mysql_error());
	if (mysql_num_rows($result) > 0){
        // login gevonden, registreer gegevens in session
				$username = $_POST["login"];
				$wachtwoord = $wachtwoordmd5;
        session_register("username");
				session_register("wachtwoord");
				/*
				Indien u in een live-applicatie nog meer gegevens hebt opgeslagen
				voor een user, deze dan uitlezen via mysql_fetch_row($result) en
				toekennen aan diverse variabelen voor gebruik elders in de site.
				Voor deze kleine applicatie is dat echter niet nodig.
				*/
        // Doorsturen naar beveiligde pagina
  switch ($username)
  {   	case "hilde":
		{
		  $weekdag = getdate();
			if (($weekdag[weekday] == "Wednesday") OR ($weekdag[weekday] == "Thursday") OR ($weekdag[weekday] == "Friday"))
			     {

				  $tijdstip = localtime(time(),1);
				  if((($tijdstip[tm_hour] == 10) OR ($tijdstip[tm_hour] == 11)) OR
		  		     (($tijdstip[tm_hour] == 9) AND ($tijdstip[tm_min] >= 45)) OR
     	       		     (($tijdstip[tm_hour] == 12) AND ($tijdstip[tm_min] <= 15))
				    )
					{ header("Location: factuurmaken.php");
      	 			  exit();
 					}
				 	  else { echo "<center><font face=arial size=2 color=red><strong>Geen toegang</strong></font></center>";
		 	 		 	 }

			     }
					  else { echo "<center><font face=arial size=2 color=red><strong>Geen toegang</strong></font></center>";
		 	 		 	 }
		}
		break;


   		default:{
			   header("Location: factuurmaken.php");
      	  	   exit();

	     		  }

  }

	  }else{
			// Ongeldige login of wachtwoord.
  			header("Location: index.php?login=wrong");
		}
}else{

?>

<html>
<head>
<title>Inloggen</title>
</head>

<body>
<center><br><br><br><br><img width=200 src="./images/logologin.gif"></center><br>
<table align=center>
<form name="form1" method="post" action="index.php">
	<tr><td align=right><font size=2 face="verdana">Login</font></td><td><input name="login" type="text"  size="10"></td></tr>
	<tr><td align=right><font size=2 face="verdana">Wachtwoord</font></td><td><input name="wachtwoord" type="password" size="10"></td></tr>
</table>
<br>

<center><input type="image" src="./images/login.gif" name="Submit" value="Inloggen"></center>

<?php

if (!empty($_GET)) {

echo "<br><br><center><font face=arial size=2 color=red><strong>Ongeldige login of wachtwoord</strong></font></center>";

}

?>

</form>
</body>
</html>

<?php
}
?>