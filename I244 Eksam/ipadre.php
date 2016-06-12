<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>IP aadressite lugemine</title>
		<style>
		#vastused {
			margin: 30px
		}
		</style>		

	</head>
	<body>
	<div id="vastused">
	<?php
	$adre = $_SERVER['REMOTE_ADDR'];

	$file = "counter.txt";
	$myfile = fopen($file, "a") or die("Unable to open file!");
	fwrite($myfile, $adre." ");

	$current = file_get_contents ($file);
	fclose($myfile);
	$koikadred = explode(" ", $current);

	$arv = count($koikadred)-1;
	unset ($koikadred[$arv]);
	$unikaalsed = array_count_values($koikadred);
	$unique = count($unikaalsed);

	echo "Külastuste arv on olnud kokku: ".$arv."</br>";
	echo "Unikaalseid külastajate arv on olnud kokku: ".$unique."</br>";
	echo "ip aadressid on:</br>";
	for ($x = 0; $x < $arv; $x++) {	
	echo $koikadred[$x]."</br>";
	}			
	?>		
	</div>
	</body>
</html>