<html>
<title>FACTUUR</title>
<head>
<?php

	include('./include/logged_in.php');
	include('./include/config.php');

	$conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
	$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");
		$queryrecords = mysql_query ("SELECT MAX(id) FROM facturen");
		$laatstefactuur = mysql_result($queryrecords, 0, 0);

?>


<style>
<!--
 p.normaal
	{font-size:10.0pt;
	 margin:0cm;
	 font-family:"Times New Roman";}
 p.arial
	{font-size:8.0pt;
	 margin:0cm;
	 font-family:"Arial";}
-->
</style>
<style>
.dropshadow{
		float:left;
		clear:left;
		background: url(./images/shadowAlpha.png) no-repeat bottom right !important;
		background: url(./images/shadow.gif) no-repeat bottom right;
		margin: 5px 0 10px 10px !important;
		margin: 5px 0 10px 196px;
		font-family:Times New Roman;
		width: 260px;
		padding: 0px;
		}

				.innerbox{
				position:relative;
				bottom:6px;
				right: 6px;
				border: 1px solid #999999;
				padding:4px;
				margin: 0px 0px 0px 0px;
				}
				.innerbox{
				/* IE5 hack */
				\margin: 0px 0px -3px 0px;
				ma\rgin:  0px 0px 0px 0px;
				}
				.innerbox p{
				font-size:14px;
				margin: 3px;
				}
				.innerbox h4{
				margin-top: 3px;
				}

.dropshadow1{
		float:left;
		clear:left;
		background: url(./images/shadowAlpha.png) no-repeat bottom right !important;
		background: url(./images/shadow.gif) no-repeat bottom right;
		margin: 15px 0 10px 3px !important;
		margin: 15px 0 10px 3px;
		font-family:Arial;
		width: 646px;
		padding: 0px;
		}

				.innerbox{
				position:relative;
				bottom:6px;
				right: 6px;
				border: 1px solid #999999;
				padding:4px;
				margin: 0px 0px 0px 0px;
				}
				.innerbox{
				/* IE5 hack */
				\margin: 0px 0px -3px 0px;
				ma\rgin:  0px 0px 0px 0px;
				}
				.innerbox p{
				font-size:14px;
				margin: 3px;
				}
				.innerbox h4{
				margin-top: 3px;
				}

.dropshadow2{
		float:left;
		clear:left;
		background: url(./images/shadowAlpha.png) no-repeat bottom right !important;
		background: url(./images/shadow.gif) no-repeat bottom right;
		margin: 0 0 10px 10px !important;
		margin: 0 0 10px 226px;
		font-family:Arial;
		width: 200px;
		padding: 0px;
		}

				.innerbox{
				position:relative;
				bottom:6px;
				right: 6px;
				border: 1px solid #999999;
				padding:4px;
				margin: 0px 0px 0px 0px;
				}
				.innerbox{
				/* IE5 hack */
				\margin: 0px 0px -3px 0px;
				ma\rgin:  0px 0px 0px 0px;
				}
				.innerbox p{
				font-size:14px;
				margin: 3px;
				}
				.innerbox h4{
				margin-top: 3px;
				}
</style>

<SCRIPT language="JavaScript1.2">
function exitpop()
{
my_window= window.open ("betalingskeuze");
my_window.document.write('<center><a href="betaling.php?id=<?php echo "$laatstefactuur"; ?>&bet=cash">Cash</a>, <a href="betaling.php?id=<?php echo "$laatstefactuur"; ?>&bet=niet">Niet betaald</a>, <a href="betaling.php?id=<?php echo "$laatstefactuur"; ?>&bet=over">Overschrijving</a>, <a href="betaling.php?id=<?php echo "$laatstefactuur"; ?>&bet=cheque">Cheque</a></center>');
}
</SCRIPT>

</head>
<body onunload="javascript: exitpop()" >
<img width=125 src=./images/logo.gif>
<p class=normaal>&nbsp;Waregemsesteenweg 3</p>
<p class=normaal>&nbsp;B-9770 Kruishoutem</p>
<p class=normaal>&nbsp;Tel.: 09 / 383 00 25</p>
<p class=normaal>&nbsp;Fax: 09 / 270 30 22</p>
<p class=normaal>&nbsp;E-mail: info@budgetcomputers.be</p>
<p class=normaal>&nbsp;BTW: BE 787.128.967</p>
<p class=normaal>&nbsp;Rek. nr.: 390-0222603-43</p>

<div class="dropshadow">
<div style='border:solid windowtext 1.0pt;background-image: url(./images/pixel.jpg)' class="innerbox">

<?php
		$queryklanten = mysql_query ("SELECT klantnummer FROM facturen WHERE id=$laatstefactuur");
		$laatsteklantid = mysql_result($queryklanten, 0, 0);
		$result = mysql_query("SELECT klantnaam, klantstraat, klantplaats, klanttelefoon, klantbtw FROM KLANTEN WHERE id=$laatsteklantid");
		while ($rij = mysql_fetch_array($result)) {
echo "\n<span style=\"font-size:4.0pt;margin-left:5pt\">&nbsp;</span><br>";
echo "\n<span style=\"font-size:12.0pt;margin-left:5pt\">$rij[klantnaam]</span><br>";
echo "\n<span style=\"font-size:12.0pt;margin-left:5pt\">$rij[klantstraat]</span><br>";
echo "\n<span style=\"font-size:12.0pt;margin-left:5pt\">$rij[klantplaats]</span><br>";
	if (!empty($rij['klanttelefoon'])) {
	echo "\n<span style=\"font-size:12.0pt;margin-left:5pt\">Tel.: $rij[klanttelefoon]</span><br>";
	}
	if (!empty($rij['klantbtw'])) {
	echo "\n<span style=\"font-size:12.0pt;margin-left:5pt\">BTW: BE $rij[klantbtw]</span><br>";
	}
echo "\n<span style=\"font-size:4.0pt;margin-left:5pt\">&nbsp;</span><br>";
}
?>
</div></div>


<div class="dropshadow1">
<div style='border:solid windowtext 1.0pt' class="innerbox">
<span style="font-size:4.0pt;margin-left:5pt">&nbsp;</span><br>
<span style="font-size:12.0pt;font-family:Arial;margin-left:5pt"><b>FACTUUR</b></span>
<span style="font-size:11.0pt;font-family:Arial;margin-left:46pt">Klantnr.: <?php  $leadingzerosid = sprintf("%04s",$laatsteklantid);   echo "$leadingzerosid"; ?></span>
<span style="font-size:11.0pt;font-family:Arial;margin-left:46pt">Factuurnr.: <?php $leadingzerosfactid = sprintf("%05s",$laatstefactuur);   echo "$leadingzerosfactid"; ?></span>
<span style="font-size:12.0pt;font-family:Arial;margin-left:46pt"><b>
<?php

include ('include/datums.inc.php');

		$result = mysql_query("SELECT datum FROM facturen WHERE id=$laatstefactuur");
		while ($rij = mysql_fetch_array($result)) {
		$datum = stampToDMJ($rij['datum']);
		$strDatum = $datum['dag']."/".$datum['maand']."/".$datum['jaar'];
		echo "Datum: $strDatum";
		}
?>
</b></span>
<br>
<span style="font-size:4.0pt;margin-left:5pt">&nbsp;</span><br>
</div></div>



<div class="dropshadow1" style='margin-top:0'>
<div style='border:solid windowtext 1.0pt' class="innerbox">
<span style="font-size:4.0pt;margin-left:5pt">&nbsp;</span><br>
<table>

<tr><td width=680><font size=2>&nbsp;<u>Omschrijving</font></u></td><td width=20 align=center><u><font size=2>Aantal</font></u></td><td width=80 align=right><u><font size=2>Stukprijs</font></u></td><td width=80 align=right><u><font size=2>Bedrag</font></u></td></tr>
<tr><td height=8></td></tr>
<?php
		$temp = $laatstefactuur-1;
		$result = mysql_query("SELECT omschrijving, aantal, stukprijs, bedrag FROM omschrijving WHERE factuurnummer=$temp");
		while ($rij = mysql_fetch_array($result)) {
		   if ($rij['omschrijving'] == "-") { echo "<tr><td height=5></td>";
		   }	else {echo "\n<tr><td><font size=2>&nbsp;$rij[omschrijving]</font></td>";
			     }
		  if ($rij['aantal'] == 0) {
			echo "<td height=5></td></tr>";
			}
			else {echo "<td align=center><font size=2>$rij[aantal]</font></td><td align=right><font size=2>";
				printf(number_format($rij['stukprijs'], 2, ',', '.'));
				echo "</font></td><td align=right><font size=2>";
				printf(number_format($rij['bedrag'], 2, ',', '.'));
				echo "</font></td></tr>";
		  }
	      }
?>

</table>

<span style="font-size:4.0pt;margin-left:5pt">&nbsp;</span><br>
</div></div>



<div align=right class="dropshadow2">
<div style='border:solid windowtext 1.0pt' align=right class="innerbox">
<span style="font-size:4.0pt;margin-left:5pt">&nbsp;</span><br>
<table>
<col align=right><col align=right><col>
<tr><td>
<?php
		$result = mysql_query("SELECT totaalexcl, btwbedrag, totaalincl FROM facturen WHERE id=$laatstefactuur");
		$rij = mysql_fetch_array($result);
		echo "<font size=2>Totaal excl. BTW: </font></td><td><font size=2>";
		printf(number_format($rij['totaalexcl'], 2, ',', '.'));
		echo "</font></td><td><font size=2>€</font></td></tr><tr><td><font size=2>BTW 21%: </font></td><td><font size=2>";
		printf(number_format($rij['btwbedrag'], 2, ',', '.'));
		echo "</font></td><td><font size=2>€</font></td></tr></table>
		<hr size=\"1\">
		<table>
		<col><col align=right>
		<tr><td><font size=2><b>Totaal incl. BTW: </b></font></td><td><font size=2><b>";
		printf(number_format($rij['totaalincl'], 2, ',', '.'));
		echo "</b></font></td><td><font size=2>€</font></td></tr>";
?>
</table>
<span style="font-size:4.0pt;margin-left:5pt">&nbsp;</span><br>
</div></div>


</body>
</html>