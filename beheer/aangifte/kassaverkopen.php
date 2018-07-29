
<?php
if (!empty($_POST)){

	include('../../include/logged_in.php');
	include('../../include/config.php');

	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

			$from = $_POST["from"];
			$to = $_POST["to"];
			echo "<table><tr><td><b><u>Overzicht diensten</u></b></td><td></td></tr>";
			$queryrecords = mysql_query ("SELECT bedrag FROM kassa WHERE datum>=$from AND datum<=$to");
			while ($rij = mysql_fetch_array($queryrecords)) {
					reset($queryrecords);
					$totaal = $totaal + $rij[bedrag];
			}

			$querydiensten = mysql_query ("SELECT datum, omschrijving, bedrag FROM kassa WHERE omschrijving like '%erkuren%'");
			while ($rij2 = mysql_fetch_array($querydiensten)) {
					 if ($rij2[datum]>=$from AND $rij2[datum]<=$to) {
						$bedrag = $rij2[bedrag];
						$diensten = $diensten + $bedrag;
						echo "<tr><td>$rij2[omschrijving]</td><td>";
						printf(number_format($bedrag, 2, ',', '.'));
						echo "</td></tr>";
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

<form name="form1" method="post" action="kassaverkopen.php">
KASSAVERKOPEN van deze periode:&nbsp;<input name="from" type="text"  size="8">
&nbsp;tot&nbsp;<input name="to" type="text"  size="8">
<input type="submit" name="Submit" value="Verder">


</form>

</BODY>

</HTML>