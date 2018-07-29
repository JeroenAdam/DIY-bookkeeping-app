<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>Budget Computers - Facturen</TITLE>
<?php
	include('../include/logged_in.php');
	include('../include/config.php');
	include('../include/datums.inc.php');

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

<link rel="stylesheet" type="text/css" href="../style/boekhouding.css" />

</HEAD>

<BODY>
<?php
	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("boekhouding") or die("geen database beschikbaar met naam boekhouding");

		$query = "SELECT * FROM `facturen` ORDER BY id DESC";
		$sql = mysql_query($query) or die ( mysql_error( ) );

		echo "<table CLASS=\"opmaak\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" colspan = \"9\" border=\"0\" bgcolor=\"#E9E9E9\" width=\"40%\">";
		echo "\n<tr bgcolor=\"#DAE2E4\"><td width=45><b>Fact#</b></td><td width=250><b>Klantnaam</b></td><td><b>Datum</b></td><td width=80 align=right><b>Totaal incl.</b></td><td></td><td bgcolor=\"white\"></td></tr><tr><td></td><td></td><td></td><td></td><td></td><td bgcolor=\"white\"></td></tr>";
		$i=0;
		while($record = mysql_fetch_object($sql))
		  {  $i=$i+1; $cBgColor = "#E9E9E9";
		     if (($i%2)==0)    {$cBgColor="#DADADA";
		    			     }
      		echo "\n<tr bgcolor=\"".$cBgColor."\"><td>".$record->id."</td><td>";

			$result = mysql_query("SELECT * FROM KLANTEN WHERE id=".$record->klantnummer."");
			$rij = mysql_fetch_array($result);
			$result2 = mysql_query("SELECT * FROM facturen WHERE id=".$record->id."");
			$rij2 = mysql_fetch_array($result2);

			echo "$rij[klantnaam]";

			$datum = stampToDMJ($rij2[datum]);
			$strDatum = $datum['dag']."/".$datum['maand']."/".$datum['jaar'];
			echo "</td><td>$strDatum</td><td align=right>";

			printf(number_format($rij2[totaalincl], 2, ',', '.'));
			echo "&nbsp;€</td><td>&nbsp;&nbsp;&nbsp;<a href=\"../tebewerkenfactuur.php?id=".$record->id."\"><img src= \"../images/b_edit.png\" border=\"0\"></a></td><td bgcolor=\"white\">&nbsp;&nbsp;&nbsp;<a href=\"../aftedrukkenfactuur.php?id=".$record->id."\"><img src= \"../images/print.bmp\" border=\"0\"></a></td></tr>";
		}
		echo "\n</table>";




?>

</BODY

</HTML>