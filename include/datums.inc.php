<?php

function stampToDMJ($datumStamp)
{
	if ($datumStamp != "0000000")
	{
		$unixtime = strtotime($datumStamp);
		$dag = date("d", $unixtime)."";
		$maand = date("m", $unixtime)."";
		$jaar = date("Y", $unixtime)."";
	}
	else
	{
		$dag = "00";
		$maand = "00";
		$jaar = "0000";		
	}
	$datum = array("dag" => "$dag", "maand" => "$maand", "jaar" => "$jaar");
	
	return $datum;
}

function convertMaand ($maand)
{
	if (substr($maand,0,1)=="0") $maand = substr($maand,1,1);
    $maanden = array ( 0 => "geen maand", 1 => "januari", 2 => "februari", 3 => "maart", 4 => "april", 5 => "mei", 6 => "juni", 7 => "juli", 8 => "augustus", 9 => "september", 10 => "oktober", 11 => "november", 12 => "december");
    if ($maand > 0 && $maand < 13)
	return $maanden[$maand];
    else
	return $maanden[0];
}


?>