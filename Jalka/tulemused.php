﻿<?php 
global $connection;
$host="localhost";
$user="test";
$pass="t3st3r123";
$db="test";

$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ?hendust mootoriga- ".mysqli_error());
//mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
$query= "SELECT * FROM koiderma_tulemused ORDER BY punktid DESC";
$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));

$i=0;
while ($rida = mysqli_fetch_array($result)){
	$punktid[$i]=$rida;
	$i++;
}

global $parv;
$arv = mysqli_num_rows($result);
$parv = $arv*24 + 100;
/*echo $arv;
echo "<pre>";
print_r ($punktid);
echo "</pre>";*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Tulemused</title>
		<link rel="stylesheet" type="text/css" href="jalkastiil.css" />		

	</head>
	<body>
	
	<table>
  	<tr>
  	<th>Koht</th>
    <th>Mängija</th>   		
    <th>Punkte</th>
  	</tr>
  	<?php 
	$i=1;
	foreach ($punktid as $values):
        echo "
        <tr>
        <td>".$i."</td>
    	<td style=\"width:130px\"><a href=\"?page=".$values[0]."\">".$values[1]."</a></td>		
    	<td>".$values[2]."</td>
        </tr>";
        $i++;
	endforeach; 
	?>
	</table>
	<a href="punktisysteem.html">Punktisüsteem</a>
	<?php
	if (isset($_GET["page"]) && $_GET["page"]!="") {
   	 $page=htmlspecialchars($_GET["page"]); 
   	 include_once "naited.html";
	}
	?>	
	
	</body>
</html>
