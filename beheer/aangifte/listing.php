
<?php
if (!empty($_POST)){

	include('../../include/logged_in.php');
	include('../../include/config.php');

	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

			$from = $_POST["from"];
			$to = $_POST["to"];
			$bedrag = $_POST["bedrag"];
			$queryrecords = mysql_query ("SELECT klantnummer, totaalexcl, btwbedrag FROM facturen WHERE datum>=$from AND datum<=$to");

			while ($rij = mysql_fetch_array($queryrecords)) {
					reset($queryrecords);
					$klantnummer = $rij[klantnummer];
					$totaalexcl = $rij[totaalexcl];
					$btwbedrag = $rij[btwbedrag];

					$queryrecords2 = mysql_query ("SELECT klantnaam, klantbtw FROM KLANTEN WHERE id=$klantnummer");
						echo "<table>";
						while ($rij = mysql_fetch_array($queryrecords2)) {
							if ((!empty($rij['klantbtw'])) && $totaalexcl>=$bedrag) {
							    echo "<tr><td width=250>$rij[klantnaam]</td><td width=150>$rij[klantbtw]</td><td width=150>";
							    printf(number_format($totaalexcl, 2, ',', '.'));
						    	echo "</td><td width=200>";
						    	printf(number_format($btwbedrag, 2, ',', '.'));
						    	echo "</td></tr>";
						    						    }
						}
						echo "<table>";
			}
}

?>

<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>LISTING</TITLE>

</HEAD>

<BODY bgcolor="white">
<br>
<form name="form1" method="post" action="listing.php">
LISTING van deze periode:&nbsp;<input name="from" type="text"  size="8">
&nbsp;tot&nbsp;<input name="to" type="text"  size="8">
Minimum omzetbedrag<input name="bedrag" type="text"  size="3">
<input type="submit" name="Submit" value="Verder">


</form>

</BODY>

</HTML>