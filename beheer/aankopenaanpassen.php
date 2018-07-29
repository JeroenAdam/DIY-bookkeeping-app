<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>Budget Computers - Aankopen</TITLE>
<?php
	include('../include/config.php');
	include('../include/logged_in.php');

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

		$query = "SELECT * FROM `aankopen` ORDER by id DESC";
		$sql = mysql_query($query) or die ( mysql_error( ) );

		echo "<br><center><a href=\"aankopeningeven.php\">AANKOOP INGEVEN</a></center><br><table CLASS=\"opmaak\" cellspacing=\"1\" cellpadding=\"0\" align=\"center\" colspan = \"9\" border=\"0\" bgcolor=\"#E9E9E9\" width=\"70%\">";
		echo "\n<tr bgcolor=\"#DAE2E4\"><td><b>Datum</b></td><td><b>Handelsgoederen</b></td><td><b>Vervoerskosten</b></td><td><b>Totaal excl. BTW</b></td><td><b>Totaal Incl. BTW</b></td><td></td></tr>";

		$i=0;
		while($record = mysql_fetch_array($sql))
		  {  $i=$i+1; $cBgColor = "#E9E9E9";
		     if (($i%2)==0)    {$cBgColor="#DADADA";
		    			     }
      		echo "\n<tr bgcolor=\"".$cBgColor."\"><td>$record[datum]</td>";
			echo "<td>";
			printf(number_format($record[handelsgoederen], 2, ',', '.'));
			echo "&nbsp;€</td><td>";
			printf(number_format($record[vervoerskosten], 2, ',', '.'));
			echo "&nbsp;€</td><td>";
			printf(number_format($record[totaalexcl], 2, ',', '.'));
			echo "&nbsp;€</td><td>";
			printf(number_format($record[totaalincl], 2, ',', '.'));
			echo "&nbsp;€</td>";
			echo "<td><a href=\"aankopenbewerken.php?id=".$record[id]."\"><img src= \"../images/b_edit.png\" border=\"0\"\"></a></td></tr>";
		}
		echo "\n</table>";

?>
</BODY

</HTML>