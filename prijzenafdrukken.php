<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>Budget Computers - Prijslijst</TITLE>
<?php
	include('./include/logged_in.php');
	include('./include/config.php');

?>

<link rel="stylesheet" type="text/css" href="style/boekhouding.css" />

</HEAD>

<BODY>
<?php

	include('./include/menu.php');

?>
<br><center><font size=3 face=Arial>Welke prijzen wil je afdrukken/bekijken?</font><br><span style="font-size:4.0pt;margin-left:5pt">&nbsp;</span>
<br><a href="http://www.acer.be/acereuro/page39.do?UserCtxParam=0&GroupCtxParam=0&dctx1=2&ctx1=BE&crc=410550071">Prijslijst ACER laptops   -   Prijzen zijn Excl. BTW</a><br>
<a href="http://www.acer.be/acereuro/page91.do?UserCtxParam=0&GroupCtxParam=0&dctx1=2&ctx1=BE&crc=410550071">Folder ACER laptops  -    om af te drukken</center>
<br>
<TABLE cellspacing="0" bgcolor="#E9E9E9" align="center" width="23%">
<FORM name="afdrukken" method="post" action="onderdelen.php">
<?php

    $result = mysql_list_tables("budgetcomputers");
    while ($onderdeel = mysql_fetch_row($result))
	{ 
	if ($onderdeel[0] != "datum")
	   {
		echo ("\n<tr><td><input type=\"checkbox\" name=\"$onderdeel[0]\">");

		if ($onderdeel[0] == "_nieuw") $onderdeel[0] = "nieuw";
		if ($onderdeel[0] == "cdrom") $onderdeel[0] = "cd/dvd/writer";
		if ($onderdeel[0] == "hdd") $onderdeel[0] = "hard disk";
		if ($onderdeel[0] == "iocard") $onderdeel[0] = "i/o card";
		if ($onderdeel[0] == "diskdrive") $onderdeel[0] = "disk drive";
		if ($onderdeel[0] == "digitalcameras") $onderdeel[0] = "digital cameras";
		if ($onderdeel[0] == "mp3player") $onderdeel[0] = "mp3 players";
		$onderdeel_up[0] = strtoupper($onderdeel[0]);

		echo ("<font face=arial size=2>$onderdeel_up[0]</font></td></tr>");

	   }
	}
?>

<tr><td>&nbsp;</td></tr>
<tr><td><input type="submit" value="Verder">
<input type="reset" name="reset" value="Leegmaken"></td></tr>

</FORM>
</TABLE>
</BODY>

</HTML>