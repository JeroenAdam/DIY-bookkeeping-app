
<?php
if (!empty($_POST)){

	include('../../include/logged_in.php');
	include('../../include/config.php');

	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

			$from = $_POST["from"];
			$to = $_POST["to"];
			echo "<b><u>Overzicht diensten</u></b>";
			echo "<table>";
			$queryrecords = mysql_query ("SELECT totaalexcl FROM facturen WHERE datum>=$from AND datum<=$to");
			while ($rij = mysql_fetch_array($queryrecords)) {
					reset($queryrecords);
					$totaal = $totaal + $rij[totaalexcl];
			}

			$querydiensten = mysql_query ("SELECT omschrijving, bedrag, factuurnummer FROM omschrijving WHERE omschrijving like '%erkuren%'");
			while ($rij2 = mysql_fetch_array($querydiensten)) {
					$factuurnummer = $rij2[factuurnummer];
					$querydiensten2 = mysql_query ("SELECT datum FROM facturen WHERE id=$factuurnummer");
					while ($rij3 = mysql_fetch_array($querydiensten2)) {
					 if ($rij3[datum]>=$from AND $rij3[datum]<=$to) {
						$bedrag = $rij2[bedrag];
						$diensten = $diensten + $bedrag;
						echo "<tr><td>$rij2[factuurnummer]&nbsp;&nbsp;&nbsp;</td><td>";
						echo "$rij2[omschrijving]</td><td>";
						printf(number_format($bedrag, 2, ',', '.'));
						echo "</td></tr>";
					 }
					}

			}
					$handelsgoederen = $totaal - $diensten;
					echo "</table>";

					echo "<br><br><table>";
					echo "<tr><td><b>Verkopen Handelsgoederen: ";
					printf(number_format($handelsgoederen, 2, ',', '.'));

					echo "</b></td></tr><tr><td><b>Levering diensten: ";
					printf(number_format($diensten, 2, ',', '.'));

					echo "</b></td></tr></table>";
}

?>

<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>KLANTEN</TITLE>

</HEAD>

<BODY bgcolor="#8C9DEC">

<form name="form1" method="post" action="verkopen.php">
OMZET van deze periode:&nbsp;<input name="from" type="text"  size="8">
&nbsp;tot&nbsp;<input name="to" type="text"  size="8">
<input type="submit" name="Submit" value="Verder">


</form>

</BODY>

</HTML>