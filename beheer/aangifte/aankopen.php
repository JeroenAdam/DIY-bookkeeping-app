
<?php
if (!empty($_POST)){

	include('../../include/logged_in.php');
	include('../../include/config.php');

	    $conn = mysql_connect("$DBHost", "$DBUser", "$DBPass") or die("geen verbinding");
		$conndb = mysql_select_db("$DBName") or die("geen database beschikbaar met naam $DBName");

			$from = $_POST["from"];
			$to = $_POST["to"];
			$queryrecords = mysql_query ("SELECT * FROM aankopen WHERE datum>=$from AND datum<=$to");
			while ($rij = mysql_fetch_array($queryrecords)) {
					reset($queryrecords);
					$tellerhandelsgoederen = $tellerhandelsgoederen + $rij[handelsgoederen];
					$tellervervoerskosten = $tellervervoerskosten + $rij[vervoerskosten];
					$telleranderekosten = $telleranderekosten + $rij[anderekosten];
			}
					echo "TOTAAL HANDELSGOEDEREN: <b>";
					printf(number_format($tellerhandelsgoederen, 2, ',', '.'));
					echo "</b><br>TOTAAL VERVOERSKOSTEN: <b>";
					printf(number_format($tellervervoerskosten, 2, ',', '.'));
					echo "</b><br>TOTAAL DIVERSE KOSTEN: <b>";
					printf(number_format($telleranderekosten, 2, ',', '.'));
					echo "</b>";


}

?>

<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>KLANTEN</TITLE>

</HEAD>

<BODY bgcolor="#8C9DEC">

<form name="form1" method="post" action="aankopen.php">
AANKOPEN van deze periode:&nbsp;<input name="from" type="text"  size="8">
&nbsp;tot&nbsp;<input name="to" type="text"  size="8">
<input type="submit" name="Submit" value="Verder">


</form>


</BODY>

</HTML>