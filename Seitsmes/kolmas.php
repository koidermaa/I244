<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Gurud</title>
    <style>
div {
    display: inline-block;
    border:solid #c0c0c0 2px;
    text-align: center;
    width: 29%;
    margin:1%;
    border-radius:5px;
    padding:10px;
}

    </style>
</head>
<body>

<?php

$borsigurud= array( 
		array("nimi"=>"Warren Buffett", "vanus"=>78, "elukoht" =>"Omaha", "lemmikaktsia"=>"Coca Cola"), 
		array("nimi"=>"Ray Dalio", "vanus"=>66, "elukoht" =>"Greenwich", "lemmikaktsia"=>"Google"),
		array("nimi"=>"George Soros", "vanus"=>81, "elukoht" =>"Budapest", "lemmikaktsia"=>"OTP Bank"),
		array("nimi"=>"Bill Ackman", "vanus"=>49, "elukoht" =>"Boston", "lemmikaktsia"=>"Valeant"),
		array("nimi"=>"Steven Cohen", "vanus"=>59, "elukoht" =>"New York", "lemmikaktsia"=>"Bloomberg"),
	);
		
	foreach ($borsigurud as $value) {
	include "kolmas.html";
	}

?>


</body>
</html>