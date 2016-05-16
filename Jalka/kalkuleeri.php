<?php 

function arvuta(){
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
for ($y = 146; $y < 150; $y=$y+2) {			// 1/4 arvutused
	if (isset($kontroll[$y]) && !empty($kontroll[$y])&& isset($kontroll[$y+1]) && !empty($kontroll[$y+1])){
		for ($x = 0; $x < $arv; $x++) {
			if ($kontroll[$y]==$ennustused[$x][$y] && $kontroll[$y+1]==$ennustused[$x][$y+1]){
				if ($kontroll[$y+4]>$kontroll[$y+5] && $ennustused[$x][$y+4]>$ennustused[$x][$y+5]){
				$punktid[$x]+=7;
				}
				if ($kontroll[$y+4]<$kontroll[$y+5] && $ennustused[$x][$y+4]<$ennustused[$x][$y+5]){
				$punktid[$x]+=7;
				}
				if ($kontroll[$y+4]==$ennustused[$x][$y+4] && $kontroll[$y+5]==$ennustused[$x][$y+5]){
				$punktid[$x]+=8;
				}
				if ($kontroll[$y+4]==$ennustused[$x][$y+4] && $kontroll[$y+5]!==$ennustused[$x][$y+5]){
				$punktid[$x]+=2;
				}
				if ($kontroll[$y+4]!==$ennustused[$x][$y+4] && $kontroll[$y+5]==$ennustused[$x][$y+5]){
				$punktid[$x]+=2;
				}	
			}
			if ($kontroll[$y]==$ennustused[$x][$y] && $kontroll[$y+1]!==$ennustused[$x][$y+1]){
				if ($kontroll[$y+4]==$ennustused[$x][$y+4]){
				$punktid[$x]+=2;
				}
				if ($kontroll[$y+4]>$kontroll[$y+5] && $ennustused[$x][$y+4]>$ennustused[$x][$y+5]){
				$punktid[$x]+=5;
				}
				if ($kontroll[$y+4]<$kontroll[$y+5] && $ennustused[$x][$y+4]<$ennustused[$x][$y+5]){
				$punktid[$x]+=5;
				}	
			}
			if ($kontroll[$y]!==$ennustused[$x][$y] && $kontroll[$y+1]==$ennustused[$x][$y+1]){
				if ($kontroll[$y+5]==$ennustused[$x][$y+5]){
				$punktid[$x]+=2;
				}
				if ($kontroll[$y+4]>$kontroll[$y+5] && $ennustused[$x][$y+4]>$ennustused[$x][$y+5]){
				$punktid[$x]+=5;
				}
				if ($kontroll[$y+4]<$kontroll[$y+5] && $ennustused[$x][$y+4]<$ennustused[$x][$y+5]){
				$punktid[$x]+=5;
				}	
			}			
		}
	}	
}
// Finaal arvutused
if (isset($kontroll[154]) && !empty($kontroll[154])&& isset($kontroll[155]) && !empty($kontroll[155])){
	for ($x = 0; $x < $arv; $x++) {
		if ($kontroll[154]==$ennustused[$x][154] && $kontroll[155]==$ennustused[$x][155]){
			if ($kontroll[156]>$kontroll[157] && $ennustused[$x][156]>$ennustused[$x][157]){
			$punktid[$x]+=15;
			}
			if ($kontroll[156]<$kontroll[157] && $ennustused[$x][156]<$ennustused[$x][157]){
			$punktid[$x]+=15;
			}
			if ($kontroll[156]==$ennustused[$x][156] && $kontroll[157]==$ennustused[$x][157]){
			$punktid[$x]+=15;
			}
			if ($kontroll[156]==$ennustused[$x][156] && $kontroll[157]!==$ennustused[$x][157]){
			$punktid[$x]+=5;
			}
			if ($kontroll[156]!==$ennustused[$x][156] && $kontroll[157]==$ennustused[$x][157]){
			$punktid[$x]+=5;
			}	
		}
		if ($kontroll[154]==$ennustused[$x][154] && $kontroll[155]!==$ennustused[$x][155]){
			if ($kontroll[156]==$ennustused[$x][156]){
			$punktid[$x]+=3;
			}
			if ($kontroll[156]>$kontroll[157] && $ennustused[$x][156]>$ennustused[$x][157]){
			$punktid[$x]+=10;
			}
			if ($kontroll[156]<$kontroll[157] && $ennustused[$x][156]<$ennustused[$x][157]){
			$punktid[$x]+=10;
			}	
		}
		if ($kontroll[154]!==$ennustused[$x][154] && $kontroll[155]==$ennustused[$x][155]){
			if ($kontroll[157]==$ennustused[$x][157]){
			$punktid[$x]+=3;
			}
			if ($kontroll[156]>$kontroll[157] && $ennustused[$x][156]>$ennustused[$x][157]){
			$punktid[$x]+=10;
			}
			if ($kontroll[156]<$kontroll[157] && $ennustused[$x][156]<$ennustused[$x][157]){
			$punktid[$x]+=10;
			}	
		}
		if ($kontroll[154]==$ennustused[$x][155] && $kontroll[155]==$ennustused[$x][154]){
			$punktid[$x]+=10;
			if ($kontroll[156]>$kontroll[157] && $ennustused[$x][156]<$ennustused[$x][157]){
			$punktid[$x]+=5;
			}
			if ($kontroll[156]<$kontroll[157] && $ennustused[$x][156]>$ennustused[$x][157]){
			$punktid[$x]+=5;
			}	
		}
		if ($kontroll[154]==$ennustused[$x][155] && $kontroll[155]!==$ennustused[$x][154]){
			$punktid[$x]+=5;
			if ($kontroll[156]>$kontroll[157] && $ennustused[$x][156]<$ennustused[$x][157]){
			$punktid[$x]+=5;
			}
			if ($kontroll[156]<$kontroll[157] && $ennustused[$x][156]>$ennustused[$x][157]){
			$punktid[$x]+=5;
			}	
		}	
		if ($kontroll[154]!==$ennustused[$x][155] && $kontroll[155]==$ennustused[$x][154]){
			$punktid[$x]+=5;
			if ($kontroll[156]>$kontroll[157] && $ennustused[$x][156]<$ennustused[$x][157]){
			$punktid[$x]+=5;
			}
			if ($kontroll[156]<$kontroll[157] && $ennustused[$x][156]>$ennustused[$x][157]){
			$punktid[$x]+=5;
			}	
		}			
	}
}		
if (isset($kontroll[161]) && is_numeric($kontroll[161])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][161]) && is_numeric($ennustused[$x][161])){
			if ($kontroll[161]==$ennustused[$x][161]){	
			$punktid[$x]+=3;
			}
		}					
	}
}	

if (isset($kontroll[163]) && is_numeric($kontroll[163])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][163]) && is_numeric($ennustused[$x][163])){
			if ($kontroll[163]==$ennustused[$x][163]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[167]) && is_numeric($kontroll[167])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][167]) && is_numeric($ennustused[$x][167])){
			if ($kontroll[167]==$ennustused[$x][167]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[170]) && is_numeric($kontroll[170])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][170]) && is_numeric($ennustused[$x][170])){
			if ($kontroll[170]==$ennustused[$x][170]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[159]) && !empty($kontroll[159])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][159]) && !empty($ennustused[$x][159])){
			if ($kontroll[159]==$ennustused[$x][159]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[160]) && !empty($kontroll[160])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][160]) && !empty($ennustused[$x][160])){
			if ($kontroll[160]==$ennustused[$x][160]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[162]) && !empty($kontroll[162])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][162]) && !empty($ennustused[$x][162])){
			if ($kontroll[162]==$ennustused[$x][162]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[164]) && !empty($kontroll[164])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][164]) && !empty($ennustused[$x][164])){
			if ($kontroll[164]==$ennustused[$x][164]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[165]) && !empty($kontroll[165])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][165]) && !empty($ennustused[$x][165])){
			if ($kontroll[165]==$ennustused[$x][165]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[166]) && !empty($kontroll[166])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][166]) && !empty($ennustused[$x][166])){
			if ($kontroll[166]==$ennustused[$x][166]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[168]) && !empty($kontroll[168])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][168]) && !empty($ennustused[$x][168])){
			if ($kontroll[168]==$ennustused[$x][168]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[169]) && !empty($kontroll[169])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][169]) && !empty($ennustused[$x][169])){
			if ($kontroll[169]==$ennustused[$x][169]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[171]) && !empty($kontroll[171])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][171]) && !empty($ennustused[$x][171])){
			if ($kontroll[171]==$ennustused[$x][171]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[172]) && !empty($kontroll[172])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][172]) && !empty($ennustused[$x][172])){
			if ($kontroll[172]==$ennustused[$x][172]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
if (isset($kontroll[173]) && !empty($kontroll[173])){
	for ($x = 0; $x < $arv; $x++) {
		if (isset($ennustused[$x][173]) && !empty($ennustused[$x][173])){
			if ($kontroll[173]==$ennustused[$x][173]){	
			$punktid[$x]+=3;
			}	
		}			
	}
}
/*
echo "<pre>";
print_r($punktid);
echo "</pre>";
*/

for ($x = 0; $x < $arv; $x++) {
	$z=$x+1;
$query3= "UPDATE koiderma_tulemused SET punktid=".$punktid[$x]." WHERE id=".$z;
$result = mysqli_query($connection, $query3) or die("$query - ".mysqli_error($connection));
}

}
?>