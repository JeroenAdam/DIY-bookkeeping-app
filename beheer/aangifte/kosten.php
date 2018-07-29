
<?php
if (!empty($_POST)){

	include('../../include/logged_in.php');
	include('../../include/config.php');

	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

			$from = $_POST["from"];
			$to = $_POST["to"];
			$queryrecords = mysql_query ("SELECT totaalexcl, btwbedrag, bedrijfsmiddelen FROM kosten WHERE datum>=$from AND datum<=$to");
			while ($rij = mysql_fetch_array($queryrecords)) {
					reset($queryrecords);
					$tellertotaal = $tellertotaal + $rij[totaalexcl];
					$tellerbedrijfsmiddelen = $tellerbedrijfsmiddelen + $rij[bedrijfsmiddelen];
					$tellerdiversen = $tellertotaal - $tellerbedrijfsmiddelen;
					$tellerbtwbedrag = $tellerbtwbedrag + $rij[btwbedrag];

			}
					echo "TOTAAL KOSTEN: <b>";
					printf(number_format($tellertotaal, 2, ',', '.'));
					echo "</b><br>BTW-BEDRAG: <b>";
					printf(number_format($tellerbtwbedrag, 2, ',', '.'));
					echo "</b><br>DIVERSE KOSTEN: <b>";
					printf(number_format($tellerdiversen, 2, ',', '.'));
					echo "</b><br>BEDRIJFSMIDDELEN: <b>";
					printf(number_format($tellerbedrijfsmiddelen, 2, ',', '.'));
					echo "</b>";


}

?>

<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>KLANTEN</TITLE>

</HEAD>

<BODY bgcolor="#8C9DEC">

<form name="form1" method="post" action="kosten.php">
KOSTEN van deze periode:&nbsp;<input name="from" type="text"  size="8">
&nbsp;tot&nbsp;<input name="to" type="text"  size="8">
<input type="submit" name="Submit" value="Verder">


</form>


</BODY>

</HTML>