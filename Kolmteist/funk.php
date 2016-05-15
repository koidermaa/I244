<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	if (empty($_SESSION["user"])){ 		// kontrollib, kas on logitud sisse?
		header("Location: ?page=login");
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		global $connection;
		$errors=array();
		if(empty($_POST["user"])) {
		$errors[]="kasutajanimi puudu!";
		}
		
		if(empty($_POST["pass"])) {
		$errors[]="parool puudu!";
		} 
		
		$u = mysqli_real_escape_string($connection, $_POST["user"]);
		$p = mysqli_real_escape_string($connection, $_POST["pass"]);
		$query = "SELECT id FROM koiderma_kylastajad WHERE username = '$u' AND passw = SHA1('$p')";
		$result = mysqli_query($connection, $query);
		$arv = mysqli_num_rows($result);
		
		if($arv < 1) {
		$errors[]="vale kasutajanimi või parool";
		}
			
		if (empty($errors)) {
		$_SESSION["user"] = "sees";
		header("Location: ?page=loomad");
		exit(0);
		}
		}
	
	// siia on vaja funktsionaalsust (13. nädalal)

	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	if (empty($_SESSION["user"])){ 		// kontrollib, kas on logitud sisse?
		header("Location: ?page=login");
	}
	global $connection;
	$puurid = array();
	// siia on vaja funktsionaalsust
	$query ="SELECT DISTINCT puur FROM koiderma_loomaaed";
	$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
	// hangime tulemusest esimese rea
	while ($rida = mysqli_fetch_assoc($result)){
		$number = $rida['puur'];
		$query2 ="SELECT nimi, vanus, liik FROM koiderma_loomaaed WHERE puur=".$number;
		$result2 = mysqli_query($connection, $query2) or die("$query - ".mysqli_error($connection));
		while ($rida2 = mysqli_fetch_assoc($result2)){
			$puurid[$number][] = $rida2;
		}
	}
	//echo "<pre>";
	//print_r($puurid);
	//echo "</pre>";
	include_once('views/puurid.html');
	
}

function lisa(){
	if (empty($_SESSION["user"])){ 		// kontrollib, kas on logitud sisse?
		header("Location: ?page=login");
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		global $connection;
		$errors=array();
	
		if(empty($_POST["nimi"])) {
		$errors[]="looma nimi puudu!";
		}
		
		if(empty($_POST["puur"])) {
		$errors[]="puurinr puudu!";
		} 
		
		if (empty($errors)) {
		$name = mysqli_real_escape_string($connection, $_POST["nimi"]);
		$cage = mysqli_real_escape_string($connection, $_POST["puur"]);
		$query = "INSERT INTO koiderma_loomaaed (id, nimi, liik, puur) VALUES (NULL, \"".$name."\", \"pildid/bear.png\",".$cage.")";
		$result = mysqli_query($connection, $query);
			
		$nr = mysqli_insert_id($connection);
		if ($nr > 0){
		header("Location: ?page=loomad");
		} else {
			header("Location: ?page=lisa");
			}
		exit(0);
		}		
	}
	
	
	// siia on vaja funktsionaalsust (13. nädalal)
	
	include_once('views/loomavorm.html');
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>