<?php 
echo "<h3>Tulemused käes. Tabeliseisu jälgi <a href=\"http://enos.itcollege.ee/~koiderma/Jalka/tulemused.php\">SIIT!</a></h3>"; 

if (isset($_POST[1000])&& !empty($_POST[1000])){
global $connection;
$host="localhost";
$user="test";
$pass="t3st3r123";
$db="test";
$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());

$sisu = "";
for ($x = 1000; $x <= 1172; $x++) {
	if (isset($_POST[$x])&& is_numeric($_POST[$x])){
	$value = mysqli_real_escape_string($connection,$_POST[$x]);
	$sisu .= " \"";
	$sisu .= $value;
	$sisu .= "\",";
	} 
	else if (isset($_POST[$x])&& !empty($_POST[$x])&& !is_numeric($_POST[$x])){
		$value = mysqli_real_escape_string($connection, $_POST[$x]);
		$sisu .= " \"";
		$sisu .= $value;
		$sisu .= "\",";
	}
	else {
		$value = 99;
		$sisu .= " \"";
		$sisu .= $value;
		$sisu .= "\",";
	}
}
$sisu = substr($sisu, 0, -1);

$query= "INSERT INTO koiderma_tulemused VALUES (NULL, \"".$_POST[1000]."\", 0 )";
$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
$query2= "INSERT INTO koiderma_jalka VALUES (NULL,".$sisu.")";
$result1 = mysqli_query($connection, $query2) or die("$query - ".mysqli_error($connection));
}

?>