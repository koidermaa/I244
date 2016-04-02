<?php

$string = "kristo";
$pikkus = strlen($string);
for ($i = $pikkus-1; $i >= 0; $i--) {
	global $string2;
	$string2=$string2.$string[$i];
}            

echo $string2;

?>