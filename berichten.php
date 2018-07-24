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

		$query = "SELECT id, tijdstip, bericht FROM `berichten` WHERE persoon='$username' ORDER BY id DESC";
		$sql = mysql_query($query) or die ( mysql_error( ) );

		echo "<br><table CLASS=\"opmaak\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" colspan = \"9\" border=\"0\" bgcolor=\"#E9E9E9\" width=\"70%\">";
		echo "\n<tr bgcolor=\"#DAE2E4\"><td width=120><b>Tijdstip</b></td><td width=800><b>Bericht</b></td><td bgcolor=\"white\"></td></tr><tr><td></td><td></td><td bgcolor=\"white\"></td></tr>";
		$i=0;
		while($record = mysql_fetch_object($sql))
		  {  $i=$i+1; $cBgColor = "#E9E9E9";
		     if (($i%2)==0)    {$cBgColor="#DADADA";
		    			     }
      		echo "\n<tr bgcolor=\"".$cBgColor."\">";
			echo "<td>".$record->tijdstip."</td><td>".$record->bericht." </td><td bgcolor=\"white\">&nbsp;&nbsp;<a href=\"teverwijderenbericht?id=".$record->id."\"><img src=\"images/b_del.jpg\" border=\"0\"></a></td></tr>";

			}
		echo "\n</table>";
		$berichtengelezen = date("d/m/Y h:i");
		mysql_query("UPDATE users SET berichtengelezen='$berichtengelezen' WHERE login='$username'")or die("Create table Error: ".mysql_error());


?>
<br>
<center><a href="berichttoevoegen.php">BERICHT OPSTELLEN</a></center>

</BODY

</HTML>