<HTML>

<HEAD>
<META content="no-cache">
    <TITLE>Budget Computers - Beheer</TITLE>
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
	<BR>
	<center><a href="./beheer/facturenaanpassen.php">FACTUREN</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;
	        <a href="./beheer/aankopenaanpassen.php">AANKOPEN</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;
	        <a href="./beheer/kostenaanpassen.php">KOSTEN</a></center><br>

	<center><a href="./beheer/kassabeheer.php">KASSABEHEER</a></center><br>

	<center><a href="./beheer/aangifte/verkopen.php">AANGIFTE - VERKOPEN</a>&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;
	        <a href="./beheer/aangifte/kassaverkopen.php">AANGIFTE - KASSAVERKOPEN</a>&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;
            <a href="./beheer/aangifte/aankopen.php">AANGIFTE - AANKOPEN</a>&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;
	        <a href="./beheer/aangifte/kosten.php">AANGIFTE - KOSTEN</a></center><br>
	<center><a href="./beheer/aangifte/listing.php">AANGIFTE - LISTING</a></center><br>
    <center><a href="http://www.budgetcomputers.be/plugins/PhpMyAdmin/index.php">PHPMYADMIN</a></center><br>
    <center><a href="./beheer/register.php">NIEUWE GEBRUIKER REGISTREREN</a></center><br>


</BODY

</HTML>