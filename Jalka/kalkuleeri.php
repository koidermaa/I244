<?php 

global $connection;
$host="localhost";
$user="test";
$pass="t3st3r123";
$db="test";

$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
//mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
$query= "SELECT * FROM koiderma_jalka";
$query2= "SELECT * FROM koiderma_hinda";
$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
$result2 = mysqli_query($connection, $query2) or die("$query - ".mysqli_error($connection));

$i=0;
while ($rida = mysqli_fetch_array($result)){
	$ennustused[$i]=$rida;
	$i++;
}
$kontroll = mysqli_fetch_array($result2);

$arv = mysqli_num_rows($result);
for ($z = 0; $z < $arv; $z++){
	$punktid[$z]=0;
	}
	
for ($y = 2; $y < 74; $y=$y+2) {			// Alagruppide punktide arvutus
	if (isset($kontroll[$y]) && is_numeric($kontroll[$y]) && isset($kontroll[$y+1]) && is_numeric($kontroll[$y+1])){
		for ($x = 0; $x < $arv; $x++) {
			if ($kontroll[$y]>$kontroll[$y+1] && $ennustused[$x][$y]>$ennustused[$x][$y+1]){
				$punktid[$x]+=3;
			}
			if ($kontroll[$y]==$kontroll[$y+1] && $ennustused[$x][$y]==$ennustused[$x][$y+1]){
				$punktid[$x]+=3;
			}
			if ($kontroll[$y]<$kontroll[$y+1] && $ennustused[$x][$y]<$ennustused[$x][$y+1]){
				$punktid[$x]+=3;
			}
			if ($kontroll[$y]==$ennustused[$x][$y] && $kontroll[$y+1]==$ennustused[$x][$y+1]){
				$punktid[$x]+=4;
			}
			if ($kontroll[$y]==$ennustused[$x][$y] && $kontroll[$y+1]!==$ennustused[$x][$y+1]){
				$punktid[$x]+=1;
			}
			if ($kontroll[$y]!==$ennustused[$x][$y] && $kontroll[$y+1]==$ennustused[$x][$y+1]){
				$punktid[$x]+=1;
			}
		}	
	}
}

for ($y = 74; $y < 98; $y++) {			// Alagruppide kohtade arvutus
	if (isset($kontroll[$y]) && is_numeric($kontroll[$y])){
		for ($x = 0; $x < $arv; $x++) {
			if (isset($ennustused[$x][$y]) && is_numeric($ennustused[$x][$y])){
				if ($kontroll[$y]==$ennustused[$x][$y]){
				$punktid[$x]+=3;
				}
			}
		}	
	}
}

for ($y = 98; $y < 114; $y=$y+2) {			// 1/16 arvutused
	if (isset($kontroll[$y]) && !empty($kontroll[$y])&& isset($kontroll[$y+1]) && !empty($kontroll[$y+1])){
		for ($x = 0; $x < $arv; $x++) {
			if ($kontroll[$y]==$ennustused[$x][$y] && $kontroll[$y+1]==$ennustused[$x][$y+1]){
				if ($kontroll[$y+16]>$kontroll[$y+17] && $ennustused[$x][$y+16]>$ennustused[$x][$y+17]){
				$punktid[$x]+=5;
				}
				if ($kontroll[$y+16]<$kontroll[$y+17] && $ennustused[$x][$y+16]<$ennustused[$x][$y+17]){
				$punktid[$x]+=5;
				}
				if ($kontroll[$y+16]==$ennustused[$x][$y+16] && $kontroll[$y+17]==$ennustused[$x][$y+17]){
				$punktid[$x]+=6;
				}
				if ($kontroll[$y+16]==$ennustused[$x][$y+16] && $kontroll[$y+17]!==$ennustused[$x][$y+17]){
				$punktid[$x]+=1;
				}
				if ($kontroll[$y+16]!==$ennustused[$x][$y+16] && $kontroll[$y+17]==$ennustused[$x][$y+17]){
				$punktid[$x]+=1;
				}	
			}
			if ($kontroll[$y]==$ennustused[$x][$y] && $kontroll[$y+1]!==$ennustused[$x][$y+1]){
				if ($kontroll[$y+16]==$ennustused[$x][$y+16]){
				$punktid[$x]+=1;
				}
				if ($kontroll[$y+16]>$kontroll[$y+17] && $ennustused[$x][$y+16]>$ennustused[$x][$y+17]){
				$punktid[$x]+=3;
				}
				if ($kontroll[$y+16]<$kontroll[$y+17] && $ennustused[$x][$y+16]<$ennustused[$x][$y+17]){
				$punktid[$x]+=3;
				}	
			}
			if ($kontroll[$y]!==$ennustused[$x][$y] && $kontroll[$y+1]==$ennustused[$x][$y+1]){
				if ($kontroll[$y+17]==$ennustused[$x][$y+17]){
				$punktid[$x]+=1;
				}
				if ($kontroll[$y+16]>$kontroll[$y+17] && $ennustused[$x][$y+16]>$ennustused[$x][$y+17]){
				$punktid[$x]+=3;
				}
				if ($kontroll[$y+16]<$kontroll[$y+17] && $ennustused[$x][$y+16]<$ennustused[$x][$y+17]){
				$punktid[$x]+=3;
				}	
			}		
		}
	}	
}

for ($y = 130; $y < 138; $y=$y+2) {			// 1/8 arvutused
	if (isset($kontroll[$y]) && !empty($kontroll[$y])&& isset($kontroll[$y+1]) && !empty($kontroll[$y+1])){
		for ($x = 0; $x < $arv; $x++) {
			if ($kontroll[$y]==$ennustused[$x][$y] && $kontroll[$y+1]==$ennustused[$x][$y+1]){
				if ($kontroll[$y+8]>$kontroll[$y+9] && $ennustused[$x][$y+8]>$ennustused[$x][$y+9]){
				$punktid[$x]+=6;
				}
				if ($kontroll[$y+8]<$kontroll[$y+9] && $ennustused[$x][$y+8]<$ennustused[$x][$y+9]){
				$punktid[$x]+=6;
				}
				if ($kontroll[$y+8]==$ennustused[$x][$y+8] && $kontroll[$y+9]==$ennustused[$x][$y+9]){
				$punktid[$x]+=7;
				}
				if ($kontroll[$y+8]==$ennustused[$x][$y+8] && $kontroll[$y+9]!==$ennustused[$x][$y+9]){
				$punktid[$x]+=1;
				}
				if ($kontroll[$y+8]!==$ennustused[$x][$y+8] && $kontroll[$y+9]==$ennustused[$x][$y+9]){
				$punktid[$x]+=1;
				}	
			}
			if ($kontroll[$y]==$ennustused[$x][$y] && $kontroll[$y+1]!==$ennustused[$x][$y+1]){
				if ($kontroll[$y+8]==$ennustused[$x][$y+8]){
				$punktid[$x]+=1;
				}
				if ($kontroll[$y+8]>$kontroll[$y+9] && $ennustused[$x][$y+8]>$ennustused[$x][$y+9]){
				$punktid[$x]+=4;
				}
				if ($kontroll[$y+8]<$kontroll[$y+9] && $ennustused[$x][$y+8]<$ennustused[$x][$y+9]){
				$punktid[$x]+=4;
				}	
			}
			if ($kontroll[$y]!==$ennustused[$x][$y] && $kontroll[$y+1]==$ennustused[$x][$y+1]){
				if ($kontroll[$y+9]==$ennustused[$x][$y+9]){
				$punktid[$x]+=1;
				}
				if ($kontroll[$y+8]>$kontroll[$y+9] && $ennustused[$x][$y+8]>$ennustused[$x][$y+9]){
				$punktid[$x]+=4;
				}
				if ($kontroll[$y+8]<$kontroll[$y+9] && $ennustused[$x][$y+8]<$ennustused[$x][$y+9]){
				$punktid[$x]+=4;
				}	
			}			
		}
	}	
}




//echo utf8_decode($rida[99]);
//echo $arv;
echo "<pre>";
print_r($punktid);
echo "</pre>";
?>