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

		$query = "SELECT id, klantnaam, klantstraat, klantplaats, klanttelefoon, klantbtw FROM `KLANTEN` ORDER BY klantnaam";
		$sql = mysql_query($query) or die ( mysql_error( ) );

		echo "<br><center><a href=\"tebewerkenklant.php\">KLANT TOEVOEGEN</a></center><br><table CLASS=\"opmaak\" cellspacing=\"1\" cellpadding=\"0\" align=\"center\" colspan = \"9\" border=\"0\" bgcolor=\"#E9E9E9\" width=\"70%\">";
		echo "\n<tr bgcolor=\"#DAE2E4\"><td><b>Naam</b></td><td><b>Straat</b></td><td><b>Plaats</b></td><td><b>Telefoon</b></td><td><b>BTW nr.</b></td><td></td></tr>";

		$i=0;
		while($record = mysql_fetch_object($sql))
		  {  $i=$i+1; $cBgColor = "#E9E9E9";
		     if (($i%2)==0)    {$cBgColor="#DADADA";
		    			     }
      		echo "\n<tr bgcolor=\"".$cBgColor."\"><td>".$record->klantnaam."</td>";
			echo "<td>".$record->klantstraat."</td><td>".$record->klantplaats."</td><td>".$record->klanttelefoon."</td><td>".$record->klantbtw."</td>";
			echo "<td><a href=\"tebewerkenklant.php?id=".$record->id."\"><img src= \"images/b_edit.png\" border=\"0\"></a></td></tr>";
		}
		echo "\n</table>";

?>
</BODY

</HTML>