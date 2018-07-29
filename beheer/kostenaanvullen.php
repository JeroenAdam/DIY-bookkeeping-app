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


			$queryhg = mysql_query("SELECT * FROM kosten");
			while ($rij = mysql_fetch_array($queryhg))
			{

			  do {
  				 if (($rij[totaalexcl] == 0) && ($rij[bedrijfsmiddelen] != 0)){
					$totaalexcl = $rij[bedrijfsmiddelen];
				 mysql_query("UPDATE kosten SET totaalexcl='$totaalexcl' WHERE id=$rij[id];")or die("Create table Error: ".mysql_error());
				 }

				 if ($rij[totaalincl] == 0) {
					$totaalincl = $rij[totaalexcl] + $rij[btwbedrag];
				 mysql_query("UPDATE kosten SET totaalincl='$totaalincl' WHERE id=$rij[id];")or die("Create table Error: ".mysql_error());
				 }

		      } while (0);

			}
			header("Location: kosteningeven.php");

?>
</BODY>

</HTML>