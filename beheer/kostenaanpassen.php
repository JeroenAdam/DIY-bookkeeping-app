<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>Budget Computers - Kosten</TITLE>
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

		$query = "SELECT * FROM `kosten` ORDER by id DESC";
		$sql = mysql_query($query) or die ( mysql_error( ) );

		echo "<br><center><a href=\"kosteningeven.php\">KOSTEN INGEVEN</a></center><br><table CLASS=\"opmaak\" cellspacing=\"1\" cellpadding=\"0\" align=\"center\" colspan = \"9\" border=\"0\" bgcolor=\"#E9E9E9\" width=\"70%\">";
		echo "\n<tr bgcolor=\"#DAE2E4\"><td><b>Datum</b></td><td><b>Categorie</b></td><td><b>Omschrijving</b></td><td><b>Totaal Excl. BTW</b></td><td><b>BTW-bedrag</b></td><td><b>Totaal Incl. BTW</b></td><td></td></tr>";

		$i=0;
		while($record = mysql_fetch_array($sql))
		  {  $i=$i+1; $cBgColor = "#E9E9E9";
		     if (($i%2)==0)    {$cBgColor="#DADADA";
		    			     }
      	echo "\n<tr bgcolor=\"".$cBgColor."\"><td>$record[datum]</td>";
		echo "<td>$record[categorie]</td><td>$record[omschrijving]</td><td>$record[totaalexcl]&nbsp;€</td><td>$record[btwbedrag]&nbsp;€</td><td>$record[totaalincl]&nbsp;€</td>";
	  	echo "<td><a href=\"kosteningeven.php?id=".$record[id]."\"><img src= \"../images/b_edit.png\" border=\"0\"></a></td></tr>";
		}
		echo "\n</table>";

?>
</BODY

</HTML>