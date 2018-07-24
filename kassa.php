<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>Budget Computers - Facturen</TITLE>
<?php
	include('./include/logged_in.php');
	include('./include/config.php');

?>

<STYLE TYPE="text/css">
<!--
.opmaak
{
font-family:Arial;
font-size:9pt;
}
-->
</STYLE>

<link rel="stylesheet" type="text/css" href="style/boekhouding.css" />

</HEAD>

<BODY>
<?php

	include('./include/menu.php');
	include('./include/datums.inc.php');

			$queryrecords = mysql_query("SELECT MAX(id) FROM kassa");
			$laatsterecord = mysql_result($queryrecords, 0, 0);
			$querysaldo = mysql_query ("SELECT saldo FROM kassa WHERE id=$laatsterecord");
			$resultsaldo = mysql_fetch_array($querysaldo);
			   $saldo = $resultsaldo[saldo];
			   echo "<br><center><font face=arial size=2 color=red><strong>KASSA SALDO: $saldo</strong></font><br><br><a href=\"kassatoevoegen.php\">KASSAVERKOOP TOEVOEGEN</a></center><br>";


		$query = "SELECT datum, omschrijving, bedrag FROM `kassa` ORDER BY id DESC";
		$sql = mysql_query($query) or die ( mysql_error( ) );

		echo "<table CLASS=\"opmaak\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" colspan = \"9\" border=\"0\" bgcolor=\"#E9E9E9\" width=\"70%\">";
		echo "\n<tr bgcolor=\"#DAE2E4\"><td width=90><b>Datum</b></td><td width=800><b>Omschrijving</b></td><td><b>Bedrag</b></td><td bgcolor=\"white\"></td></tr><tr><td></td><td></td><td></td><td bgcolor=\"white\"></td></tr>";
		$i=0;
		while($record = mysql_fetch_array($sql))
		  {  $i=$i+1; $cBgColor = "#E9E9E9";
		     if (($i%2)==0)    {$cBgColor="#DADADA";
			    			     }
      		echo "\n<tr bgcolor=\"".$cBgColor."\">";

			$datum = stampToDMJ($record[datum]);
			$strDatum = $datum['dag']."/".$datum['maand']."/".$datum['jaar'];
			echo "<td>$strDatum</td><td>$record[omschrijving]</td><td align=\"right\">";
			printf(number_format($record[bedrag], 2, ',', '.'));
			echo "</td></tr>";

			}
		echo "\n</table>";

?>
<br>
</BODY

</HTML>