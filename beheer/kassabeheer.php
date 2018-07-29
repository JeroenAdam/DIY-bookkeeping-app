<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>Budget Computers - Facturen</TITLE>
<?php

	include('../include/logged_in.php');
	include('../include/config.php');
?>

<link rel="stylesheet" type="text/css" href="style/boekhouding.css" />

</HEAD>

<BODY>
<br><center><a href="../factuurmaken.php">TERUG</a></center><br><br>
<?php
if (!empty($_POST)){

		$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
		$conndb = mysql_select_db("boekhouding") or die("geen database beschikbaar met naam boekhouding");

		$saldo = $_POST[saldo];
		$update = "UPDATE kassa SET saldo='$saldo'";	
		$sql = mysql_query($update) or die ( mysql_error( ) );
		$query = "SELECT * FROM `kassa` ORDER BY id DESC";
		$sql2 = mysql_query($query) or die ( mysql_error( ) );

		echo "<table CLASS=\"opmaak\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" colspan = \"9\" border=\"0\" bgcolor=\"#E9E9E9\" width=\"70%\">";
		echo "\n<tr bgcolor=\"#DAE2E4\"><td width=90><b>Datum</b></td><td width=800><b>Omschrijving</b></td><td><b>Bedrag</b></td><td bgcolor=\"white\"></td></tr><tr><td></td><td></td><td></td><td bgcolor=\"white\"></td></tr>";
		$i=0;
		while($record = mysql_fetch_array($sql2))
		  {  $i=$i+1; $cBgColor = "#E9E9E9";
		     if (($i%2)==0)    {$cBgColor="#DADADA";
			    			     }
      		echo "\n<tr bgcolor=\"".$cBgColor."\">";			
			echo "<td>$record[datum]</td><td>$record[omschrijving]</td><td align=\"right\">";
			printf(number_format($record[bedrag], 2, ',', '.'));
			echo "</td><td bgcolor=\"white\">&nbsp;&nbsp;<a href=\"teverwijderenkassa?id=$record[id]\"><img src=\"../images/b_del.jpg\" border=\"0\"></a></td></tr>";

			}
		echo "\n</table>";	

}

else {

	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("boekhouding") or die("geen database beschikbaar met naam boekhouding");

	$queryrecords = mysql_query("SELECT MAX(id) FROM kassa");
	$laatsterecord = mysql_result($queryrecords, 0, 0);
	$query = mysql_query ("SELECT * FROM kassa WHERE id=$laatsterecord");
	$result = mysql_fetch_array($query) or die ("FOUT: " . mysql_error());
	echo "<FORM name=\"kassabeheer\" method=\"post\" action=\"kassabeheer.php\"><br><br><br><center>Saldo:<input type=\"text\" name=\"saldo\" value=\"$result[saldo]\" size=\"8\"><br><br><input type=\"Submit\" value=\"Bijwerken\"></center></form>";
     }

	?>
</BODY>

</HTML>