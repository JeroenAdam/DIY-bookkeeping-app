<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>Budget Computers - Offertes</TITLE>
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

		$query = "SELECT id, klantnummer, datum, totaalincl FROM `offertes` ORDER BY id DESC";
		$sql = mysql_query($query) or die ( mysql_error( ) );

		echo "<br><table CLASS=\"opmaak\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" colspan = \"9\" border=\"0\" bgcolor=\"#E9E9E9\" width=\"40%\">";
		echo "\n<tr bgcolor=\"#DAE2E4\"><td width=45><b>Offer#</b></td><td width=250><b>Klantnaam</b></td><td><b>Datum</b></td><td width=80 align=right><b>Totaal incl.</b></td><td bgcolor=\"white\"></td></tr><tr><td></td><td></td><td></td><td></td><td bgcolor=\"white\"></td></tr>";
		$i=0;
		while($record = mysql_fetch_array($sql))
		  {  $i=$i+1; $cBgColor = "#E9E9E9";
		     if (($i%2)==0)    {$cBgColor="#DADADA";
		    			     }
      		echo "\n<tr bgcolor=\"".$cBgColor."\"><td>$record[id]</td><td>";

			$result = mysql_query("SELECT klantnaam FROM KLANTEN WHERE id=$record[klantnummer]");
			$rij = mysql_fetch_array($result);

			echo "$rij[klantnaam]";

			$datum = stampToDMJ($record[datum]);
			$strDatum = $datum['dag']."/".$datum['maand']."/".$datum['jaar'];
			echo "</td><td>$strDatum</td><td align=right>";

			printf(number_format($record[totaalincl], 2, ',', '.'));
			echo "&nbsp;€</td><td bgcolor=\"white\">&nbsp;&nbsp;&nbsp;<a href=\"aftedrukkenofferte.php?id=$record[id]\"><img src= \"images/print.bmp\" border=\"0\"></a></td></tr>";
		}
		echo "\n</table>";




?>

</BODY

</HTML>