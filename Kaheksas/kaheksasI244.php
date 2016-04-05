<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Kaheksas ylesanne</title>		
		<style>
		#tulemused{
			width: 200px;
			height: 100px;
			text-align: center;
			padding:10px;
			}
		</style>
		</head>
		<body>
		<?php $taustva="#FFFFFF"; 		
			if (isset($_POST["taust"]) && $_POST["taust"]!="") {
   			 $taustva=htmlspecialchars($_POST["taust"]); 
			}
			
			$sisu="siia tuleb tekst"; 		
			if (isset($_POST["sisu"]) && $_POST["sisu"]!="") {
   			 $sisu=htmlspecialchars($_POST["sisu"]);
   			 }
   			 
   			 $kiri="#000000"; 		
			if (isset($_POST["kiri"]) && $_POST["kiri"]!="") {
   			 $kiri=htmlspecialchars($_POST["kiri"]);
   			 }
   			 
   			$type="solid"; 		
			if (isset($_POST["type"]) && $_POST["type"]!="") {
   			$type=htmlspecialchars($_POST["type"]);
   			}
   			
   			$laius="2"; 		
			if (isset($_POST["laius"]) && $_POST["laius"]!="") {
   			$laius=htmlspecialchars($_POST["laius"]);
   			} 
   			 
   			$piirjoonvarv="#FFFFFF"; 		
			if (isset($_POST["piirjoonvarv"]) && $_POST["piirjoonvarv"]!="") {
   			$piirjoonvarv=htmlspecialchars($_POST["piirjoonvarv"]);
   			}
   			
   			$nurk="50"; 		
			if (isset($_POST["nurk"]) && $_POST["nurk"]!="") {
   			$nurk=htmlspecialchars($_POST["nurk"]);
   			}
   			 
		?>
		
		<div id="tulemused" style="background: <?php echo $taustva ?>; color: <?php echo $kiri ?>; border: <?php echo $laius ?>px <?php echo $type ?> <?php echo $piirjoonvarv ?>; border-radius: <?php echo $nurk ?>px "><?php echo $sisu ?></div>
		
		<hr>
		<form action="kaheksasI244.php" method="post">
		
		<textarea rows="3" cols="50" placeholder="Sisesta tekst" name="sisu"></textarea><br/>
		<input type="color" name="taust" value="0000CC"> Taustavärvus<br/>
		<input type="color" name="kiri" value="00CCFF"> Kirja värvus<br/><br/>
		
  		Border:<br>
  		<select name="type">
  		<option value="solid">solid</option>
  		<option value="double">double</option>
 		<option value="dotted">dotted</option>
		</select><br>
		
		<input type="number" name="laius" min="1" max="20">Piirjoone laius (0-20px)<br/>
		<input type="color" name="piirjoonvarv" value="0000CC"> Piirjoone värvus<br/>
		<input type="number" name="nurk" min="1" max="100">Nurga raadius (0-100px)<br/><br/>
 		 
 		 <input type="submit" value="Saada">
		</form>
		
				
		<p>
 		<a href="http://validator.w3.org/check?uri=referer">
 		<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
 		</a>
		</p>

	</body>
</html>