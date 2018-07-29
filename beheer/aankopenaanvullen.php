<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>KLANTEN</TITLE>
<?php
	include('../include/logged_in.php');
	include('../include/config.php');

?>
</HEAD>

<BODY bgcolor="#8C9DEC">

<?php
	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("boekhouding") or die("geen database beschikbaar met naam boekhouding");


			$queryhg = mysql_query("SELECT * FROM aankopen");
			$queryaankopen = mysql_query ("SELECT MAX(id) FROM aankopen");
		    $laatsteaankoop = mysql_result($queryaankopen, 0, 0);

			while ($rij = mysql_fetch_array($queryhg))
			{

			  do {
				 if ($rij[handelsgoederen] == 0) {
					$handelsgoederen = ($rij[totaalexcl] - $rij[vervoerskosten]);
				 mysql_query("UPDATE aankopen SET handelsgoederen='$handelsgoederen' WHERE id=$rij[id];")or die("Create table Error: ".mysql_error());
				 }

				 if ($rij[totaalexcl] == 0) {
					$totaalexcl = ($rij[handelsgoederen] + $rij[vervoerskosten]);
				 mysql_query("UPDATE aankopen SET totaalexcl='$totaalexcl' WHERE id=$rij[id];")or die("Create table Error: ".mysql_error());
				 }

				 if ($rij[btwbedrag] == 0) {
					$btwbedrag = ($rij[totaalexcl] * 0.21);
				 mysql_query("UPDATE aankopen SET btwbedrag='$btwbedrag' WHERE id=$rij[id];")or die("Create table Error: ".mysql_error());
				 }

				 if (($rij[totaalincl] == 0) && ($rij[btwbedrag] != 0) && ($rij[totaalexcl] != 0)) {
					$totaalincl = ($rij[totaalexcl] + $rij[btwbedrag]);
				 mysql_query("UPDATE aankopen SET totaalincl='$totaalincl' WHERE id=$rij[id];")or die("Create table Error: ".mysql_error());
				 }


			  } while (0);

			}

			$queryhg2 = mysql_query("SELECT * FROM aankopen WHERE id=$laatsteaankoop");
			while ($rij2 = mysql_fetch_array($queryhg2))
			{

			  if ($rij2[totaalincl] == 0) {
			     header("Location: aankopenaanvullen.php");
			  }

			  if ($rij2[totaalincl] != 0) {
				 header("Location: aankopeningeven.php");
			  }
			}

?>
</BODY>

</HTML>