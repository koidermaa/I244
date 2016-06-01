<?php 

global $connection;
$host="localhost";
$user="test";
$pass="t3st3r123";
$db="test";

$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
$query= "SELECT * FROM koiderma_hinda";
$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
$rida = mysqli_fetch_array($result);	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Jalgpalli EM</title>
		
		<link rel="stylesheet" type="text/css" href="hindastiil.css" />
	</head>
	<body>
	<form action="Hinda.php" method="post">
		<div id="grupp">
			<h1 id="eh1">Alagrupp A</h1>
			<div class="mang">
				<div class="voistkond">Prantsusmaa</div>
				<div class="essa">
					<input type="number" name="1001" min="0" max="9" value="<?php if (isset($rida[2])&& is_numeric($rida[2])) echo $rida[2];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1002" min="0" max="9" value="<?php if (isset($rida[3])&& is_numeric($rida[3])) echo $rida[3];?>">
				</div>
				<div class="voistkond2">Rumeenia</div>
			</div>
			<div class="mang">
				<div class="voistkond">Albaania</div>
				<div class="essa">
					<input type="number" name="1003" min="0" max="9" value="<?php if (isset($rida[4])&& is_numeric($rida[4])) echo $rida[4];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1004" min="0" max="9" value="<?php if (isset($rida[5])&& is_numeric($rida[5])) echo $rida[5];?>">
				</div>
				<div class="voistkond2">Sveits</div>
			</div>
			<div class="mang">
				<div class="voistkond">Rumeenia</div>
				<div class="essa">
					<input type="number" name="1005" min="0" max="9" value="<?php if (isset($rida[6])&& is_numeric($rida[6])) echo $rida[6];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1006" min="0" max="9" value="<?php if (isset($rida[7])&& is_numeric($rida[7])) echo $rida[7];?>">
				</div>
				<div class="voistkond2">Sveits</div>
			</div>
			<div class="mang">
				<div class="voistkond">Prantsusmaa</div>
				<div class="essa">
					<input type="number" name="1007" min="0" max="9" value="<?php if (isset($rida[8])&& is_numeric($rida[8])) echo $rida[8];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1008" min="0" max="9" value="<?php if (isset($rida[9])&& is_numeric($rida[9])) echo $rida[9];?>">
				</div>
				<div class="voistkond2">Albaania</div>
			</div>
			<div class="mang">
				<div class="voistkond">Sveits</div>
				<div class="essa">
					<input type="number" name="1009" min="0" max="9" value="<?php if (isset($rida[10])&& is_numeric($rida[10])) echo $rida[10];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1010" min="0" max="9" value="<?php if (isset($rida[11])&& is_numeric($rida[11])) echo $rida[11];?>">
				</div>
				<div class="voistkond2">Prantsusmaa</div>
			</div>
			<div class="mang">
				<div class="voistkond">Rumeenia</div>
				<div class="essa">
					<input type="number" name="1011" min="0" max="9" value="<?php if (isset($rida[12])&& is_numeric($rida[12])) echo $rida[12];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1012" min="0" max="9" value="<?php if (isset($rida[13])&& is_numeric($rida[13])) echo $rida[13];?>">
				</div>
				<div class="voistkond2">Albaania</div>
			</div>
			
			<h1>Alagrupp B</h1>
			<div class="mang">
				<div class="voistkond">Inglismaa</div>
				<div class="essa">
					<input type="number" name="1013" min="0" max="9" value="<?php if (isset($rida[14])&& is_numeric($rida[14])) echo $rida[14];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1014" min="0" max="9" value="<?php if (isset($rida[15])&& is_numeric($rida[15])) echo $rida[15];?>">
				</div>
				<div class="voistkond2">Venemaa</div>
			</div>
			<div class="mang">
				<div class="voistkond">Wales</div>
				<div class="essa">
					<input type="number" name="1015" min="0" max="9" value="<?php if (isset($rida[16])&& is_numeric($rida[16])) echo $rida[16];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1016" min="0" max="9" value="<?php if (isset($rida[17])&& is_numeric($rida[17])) echo $rida[17];?>">
				</div>
				<div class="voistkond2">Slovakkia</div>
			</div>
			<div class="mang">
				<div class="voistkond">Venemaa</div>
				<div class="essa">
					<input type="number" name="1017" min="0" max="9" value="<?php if (isset($rida[18])&& is_numeric($rida[18])) echo $rida[18];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1018" min="0" max="9" value="<?php if (isset($rida[19])&& is_numeric($rida[19])) echo $rida[19];?>">
				</div>
				<div class="voistkond2">Slovakkia</div>
			</div>
			<div class="mang">
				<div class="voistkond">Inglismaa</div>
				<div class="essa">
					<input type="number" name="1019" min="0" max="9" value="<?php if (isset($rida[20])&& is_numeric($rida[20])) echo $rida[20];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1020" min="0" max="9" value="<?php if (isset($rida[21])&& is_numeric($rida[21])) echo $rida[21];?>">
				</div>
				<div class="voistkond2">Wales</div>
			</div>
			<div class="mang">
				<div class="voistkond">Slovakkia</div>
				<div class="essa">
					<input type="number" name="1021" min="0" max="9" value="<?php if (isset($rida[22])&& is_numeric($rida[22])) echo $rida[22];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1022" min="0" max="9" value="<?php if (isset($rida[23])&& is_numeric($rida[23])) echo $rida[23];?>">
				</div>
				<div class="voistkond2">Inglismaa</div>
			</div>
			<div class="mang">
				<div class="voistkond">Venemaa</div>
				<div class="essa">
					<input type="number" name="1023" min="0" max="9" value="<?php if (isset($rida[24])&& is_numeric($rida[24])) echo $rida[24];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1024" min="0" max="9" value="<?php if (isset($rida[25])&& is_numeric($rida[25])) echo $rida[25];?>">
				</div>
				<div class="voistkond2">Wales</div>
			</div>
			
			<h1>Alagrupp C</h1>
			<div class="mang">
				<div class="voistkond">Saksamaa</div>
				<div class="essa">
					<input type="number" name="1025" min="0" max="9" value="<?php if (isset($rida[26])&& is_numeric($rida[26])) echo $rida[26];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1026" min="0" max="9" value="<?php if (isset($rida[27])&& is_numeric($rida[27])) echo $rida[27];?>">
				</div>
				<div class="voistkond2">Ukraina</div>
			</div>
			<div class="mang">
				<div class="voistkond">Poola</div>
				<div class="essa">
					<input type="number" name="1027" min="0" max="9" value="<?php if (isset($rida[28])&& is_numeric($rida[28])) echo $rida[28];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1028" min="0" max="9" value="<?php if (isset($rida[29])&& is_numeric($rida[29])) echo $rida[29];?>">
				</div>
				<div class="voistkond2">Põhja-Iirimaa</div>
			</div>
			<div class="mang">
				<div class="voistkond">Ukraina</div>
				<div class="essa">
					<input type="number" name="1029" min="0" max="9" value="<?php if (isset($rida[30])&& is_numeric($rida[30])) echo $rida[30];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1030" min="0" max="9" value="<?php if (isset($rida[31])&& is_numeric($rida[31])) echo $rida[31];?>">
				</div>
				<div class="voistkond2">Põhja-Iirimaa</div>
			</div>
			<div class="mang">
				<div class="voistkond">Saksamaa</div>
				<div class="essa">
					<input type="number" name="1031" min="0" max="9" value="<?php if (isset($rida[32])&& is_numeric($rida[32])) echo $rida[32];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1032" min="0" max="9" value="<?php if (isset($rida[33])&& is_numeric($rida[33])) echo $rida[33];?>">
				</div>
				<div class="voistkond2">Poola</div>
			</div>
			<div class="mang">
				<div class="voistkond">Põhja-Iirimaa</div>
				<div class="essa">
					<input type="number" name="1033" min="0" max="9" value="<?php if (isset($rida[34])&& is_numeric($rida[34])) echo $rida[34];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1034" min="0" max="9" value="<?php if (isset($rida[35])&& is_numeric($rida[35])) echo $rida[35];?>">
				</div>
				<div class="voistkond2">Saksamaa</div>
			</div>
			<div class="mang">
				<div class="voistkond">Ukraina</div>
				<div class="essa">
					<input type="number" name="1035" min="0" max="9" value="<?php if (isset($rida[36])&& is_numeric($rida[36])) echo $rida[36];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1036" min="0" max="9" value="<?php if (isset($rida[37])&& is_numeric($rida[37])) echo $rida[37];?>">
				</div>
				<div class="voistkond2">Poola</div>
			</div>
			
			<h1>Alagrupp D</h1>
			<div class="mang">
				<div class="voistkond">Hispaania</div>
				<div class="essa">
					<input type="number" name="1037" min="0" max="9" value="<?php if (isset($rida[38])&& is_numeric($rida[38])) echo $rida[38];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1038" min="0" max="9" value="<?php if (isset($rida[39])&& is_numeric($rida[39])) echo $rida[39];?>">
				</div>
				<div class="voistkond2">Tsehhi</div>
			</div>
			<div class="mang">
				<div class="voistkond">Türgi</div>
				<div class="essa">
					<input type="number" name="1039" min="0" max="9" value="<?php if (isset($rida[40])&& is_numeric($rida[40])) echo $rida[40];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1040" min="0" max="9" value="<?php if (isset($rida[41])&& is_numeric($rida[41])) echo $rida[41];?>">
				</div>
				<div class="voistkond2">Horvaatia</div>
			</div>
			<div class="mang">
				<div class="voistkond">Tsehhi</div>
				<div class="essa">
					<input type="number" name="1041" min="0" max="9" value="<?php if (isset($rida[42])&& is_numeric($rida[42])) echo $rida[42];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1042" min="0" max="9" value="<?php if (isset($rida[43])&& is_numeric($rida[43])) echo $rida[43];?>">
				</div>
				<div class="voistkond2">Horvaatia</div>
			</div>
			<div class="mang">
				<div class="voistkond">Hispaania</div>
				<div class="essa">
					<input type="number" name="1043" min="0" max="9" value="<?php if (isset($rida[44])&& is_numeric($rida[44])) echo $rida[44];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1044" min="0" max="9" value="<?php if (isset($rida[45])&& is_numeric($rida[45])) echo $rida[45];?>">
				</div>
				<div class="voistkond2">Türgi</div>
			</div>
			<div class="mang">
				<div class="voistkond">Horvaatia</div>
				<div class="essa">
					<input type="number" name="1045" min="0" max="9" value="<?php if (isset($rida[46])&& is_numeric($rida[46])) echo $rida[46];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1046" min="0" max="9" value="<?php if (isset($rida[47])&& is_numeric($rida[47])) echo $rida[47];?>">
				</div>
				<div class="voistkond2">Hispaania</div>
			</div>
			<div class="mang">
				<div class="voistkond">Tsehhi</div>
				<div class="essa">
					<input type="number" name="1047" min="0" max="9" value="<?php if (isset($rida[48])&& is_numeric($rida[48])) echo $rida[48];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1048" min="0" max="9" value="<?php if (isset($rida[49])&& is_numeric($rida[49])) echo $rida[49];?>">
				</div>
				<div class="voistkond2">Türgi</div>
			</div>
			
			<h1>Alagrupp E</h1>
			<div class="mang">
				<div class="voistkond">Belgia</div>
				<div class="essa">
					<input type="number" name="1049" min="0" max="9" value="<?php if (isset($rida[50])&& is_numeric($rida[50])) echo $rida[50];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1050" min="0" max="9" value="<?php if (isset($rida[51])&& is_numeric($rida[51])) echo $rida[51];?>">
				</div>
				<div class="voistkond2">Itaalia</div>
			</div>
			<div class="mang">
				<div class="voistkond">Iirimaa</div>
				<div class="essa">
					<input type="number" name="1051" min="0" max="9" value="<?php if (isset($rida[52])&& is_numeric($rida[52])) echo $rida[52];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1052" min="0" max="9" value="<?php if (isset($rida[53])&& is_numeric($rida[53])) echo $rida[53];?>">
				</div>
				<div class="voistkond2">Rootsi</div>
			</div>
			<div class="mang">
				<div class="voistkond">Itaalia</div>
				<div class="essa">
					<input type="number" name="1053" min="0" max="9" value="<?php if (isset($rida[54])&& is_numeric($rida[54])) echo $rida[54];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1054" min="0" max="9" value="<?php if (isset($rida[55])&& is_numeric($rida[55])) echo $rida[55];?>">
				</div>
				<div class="voistkond2">Rootsi</div>
			</div>
			<div class="mang">
				<div class="voistkond">Belgia</div>
				<div class="essa">
					<input type="number" name="1055" min="0" max="9" value="<?php if (isset($rida[56])&& is_numeric($rida[56])) echo $rida[56];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1056" min="0" max="9" value="<?php if (isset($rida[57])&& is_numeric($rida[57])) echo $rida[57];?>">
				</div>
				<div class="voistkond2">Iirimaa</div>
			</div>
			<div class="mang">
				<div class="voistkond">Rootsi</div>
				<div class="essa">
					<input type="number" name="1057" min="0" max="9" value="<?php if (isset($rida[58])&& is_numeric($rida[58])) echo $rida[58];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1058" min="0" max="9" value="<?php if (isset($rida[59])&& is_numeric($rida[59])) echo $rida[59];?>">
				</div>
				<div class="voistkond2">Belgia</div>
			</div>
			<div class="mang">
				<div class="voistkond">Itaalia</div>
				<div class="essa">
					<input type="number" name="1059" min="0" max="9" value="<?php if (isset($rida[60])&& is_numeric($rida[60])) echo $rida[60];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1060" min="0" max="9" value="<?php if (isset($rida[61])&& is_numeric($rida[61])) echo $rida[61];?>">
				</div>
				<div class="voistkond2">Iirimaa</div>
			</div>
			
			<h1>Alagrupp F</h1>
			<div class="mang">
				<div class="voistkond">Portugal</div>
				<div class="essa">
					<input type="number" name="1061" min="0" max="9" value="<?php if (isset($rida[62])&& is_numeric($rida[62])) echo $rida[62];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1062" min="0" max="9" value="<?php if (isset($rida[63])&& is_numeric($rida[63])) echo $rida[63];?>">
				</div>
				<div class="voistkond2">Island</div>
			</div>
			<div class="mang">
				<div class="voistkond">Austria</div>
				<div class="essa">
					<input type="number" name="1063" min="0" max="9" value="<?php if (isset($rida[64])&& is_numeric($rida[64])) echo $rida[64];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1064" min="0" max="9" value="<?php if (isset($rida[65])&& is_numeric($rida[65])) echo $rida[65];?>">
				</div>
				<div class="voistkond2">Ungari</div>
			</div>
			<div class="mang">
				<div class="voistkond">Island</div>
				<div class="essa">
					<input type="number" name="1065" min="0" max="9" value="<?php if (isset($rida[66])&& is_numeric($rida[66])) echo $rida[66];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1066" min="0" max="9" value="<?php if (isset($rida[67])&& is_numeric($rida[67])) echo $rida[67];?>">
				</div>
				<div class="voistkond2">Ungari</div>
			</div>
			<div class="mang">
				<div class="voistkond">Portugal</div>
				<div class="essa">
					<input type="number" name="1067" min="0" max="9" value="<?php if (isset($rida[68])&& is_numeric($rida[68])) echo $rida[68];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1068" min="0" max="9" value="<?php if (isset($rida[69])&& is_numeric($rida[69])) echo $rida[69];?>">
				</div>
				<div class="voistkond2">Austria</div>
			</div>
			<div class="mang">
				<div class="voistkond">Ungari</div>
				<div class="essa">
					<input type="number" name="1069" min="0" max="9" value="<?php if (isset($rida[70])&& is_numeric($rida[70])) echo $rida[70];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1070" min="0" max="9" value="<?php if (isset($rida[71])&& is_numeric($rida[71])) echo $rida[71];?>">
				</div>
				<div class="voistkond2">Portugal</div>
			</div>
			<div class="mang">
				<div class="voistkond">Island</div>
				<div class="essa">
					<input type="number" name="1071" min="0" max="9" value="<?php if (isset($rida[72])&& is_numeric($rida[72])) echo $rida[72];?>">
				</div>
				<div class="tessa">
					<input type="number" name="1072" min="0" max="9" value="<?php if (isset($rida[73])&& is_numeric($rida[73])) echo $rida[73];?>">
				</div>
				<div class="voistkond2">Austria</div>
			</div>
			<div style="clear:both"></div>
		</div>
	
		<div id="kuusteist">
			<h1>1/16 finaalid</h1>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1097" maxlength="15" style="width:75px" placeholder="A2" value="<?php if (isset($rida[98]) && !empty($rida[98])) echo htmlspecialchars($rida[98]);?>"></div>
					<div class="essa">
						<input type="number" name="1113" min="0" max="9" value="<?php if (isset($rida[114])&& is_numeric($rida[114])) echo $rida[114];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1114" min="0" max="9" value="<?php if (isset($rida[115])&& is_numeric($rida[115])) echo $rida[115];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1098" maxlength="15" style="width:75px" placeholder="C2" value="<?php if (isset($rida[99]) && !empty($rida[99])) echo htmlspecialchars($rida[99]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1099" maxlength="15" style="width:75px" placeholder="D1" value="<?php if (isset($rida[100]) && !empty($rida[100])) echo htmlspecialchars($rida[100]);?>"></div>
					<div class="essa">
						<input type="number" name="1115" min="0" max="9" value="<?php if (isset($rida[116])&& is_numeric($rida[116])) echo $rida[116];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1116" min="0" max="9" value="<?php if (isset($rida[117])&& is_numeric($rida[117])) echo $rida[117];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1100" maxlength="15" style="width:75px" placeholder="3BEF" value="<?php if (isset($rida[101]) && !empty($rida[101])) echo htmlspecialchars($rida[101]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1101" maxlength="15" style="width:75px" placeholder="B1" value="<?php if (isset($rida[102]) && !empty($rida[102])) echo htmlspecialchars($rida[102]);?>"></div>
					<div class="essa">
						<input type="number" name="1117" min="0" max="9" value="<?php if (isset($rida[118])&& is_numeric($rida[118])) echo $rida[118];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1118" min="0" max="9" value="<?php if (isset($rida[119])&& is_numeric($rida[119])) echo $rida[119];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1102" maxlength="15" style="width:75px" placeholder="3ACD" value="<?php if (isset($rida[103]) && !empty($rida[103])) echo htmlspecialchars($rida[103]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1103" maxlength="15" style="width:75px" placeholder="F1" value="<?php if (isset($rida[104]) && !empty($rida[104])) echo htmlspecialchars($rida[104]);?>"></div>
					<div class="essa">
						<input type="number" name="1119" min="0" max="9" value="<?php if (isset($rida[120])&& is_numeric($rida[120])) echo $rida[120];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1120" min="0" max="9" value="<?php if (isset($rida[121])&& is_numeric($rida[121])) echo $rida[121];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1104" maxlength="15" style="width:75px" placeholder="E2" value="<?php if (isset($rida[105]) && !empty($rida[105])) echo htmlspecialchars($rida[105]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1105" maxlength="15" style="width:75px" placeholder="C1" value="<?php if (isset($rida[106]) && !empty($rida[106])) echo htmlspecialchars($rida[106]);?>"></div>
					<div class="essa">
						<input type="number" name="1121" min="0" max="9" value="<?php if (isset($rida[122])&& is_numeric($rida[122])) echo $rida[122];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1122" min="0" max="9" value="<?php if (isset($rida[123])&& is_numeric($rida[123])) echo $rida[123];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1106" maxlength="15" style="width:75px" placeholder="3ABF" value="<?php if (isset($rida[107]) && !empty($rida[107])) echo htmlspecialchars($rida[107]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1107" maxlength="15" style="width:75px" placeholder="E1" value="<?php if (isset($rida[108]) && !empty($rida[108])) echo htmlspecialchars($rida[108]);?>"></div>
					<div class="essa">
						<input type="number" name="1123" min="0" max="9" value="<?php if (isset($rida[124])&& is_numeric($rida[124])) echo $rida[124];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1124" min="0" max="9" value="<?php if (isset($rida[125])&& is_numeric($rida[125])) echo $rida[125];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1108" maxlength="15" style="width:75px" placeholder="D2" value="<?php if (isset($rida[109]) && !empty($rida[109])) echo htmlspecialchars($rida[109]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1109" maxlength="15" style="width:75px" placeholder="A1" value="<?php if (isset($rida[110]) && !empty($rida[110])) echo htmlspecialchars($rida[110]);?>"></div>
					<div class="essa">
						<input type="number" name="1125" min="0" max="9" value="<?php if (isset($rida[126])&& is_numeric($rida[126])) echo $rida[126];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1126" min="0" max="9" value="<?php if (isset($rida[127])&& is_numeric($rida[127])) echo $rida[127];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1110" maxlength="15" style="width:75px" placeholder="3CDE" value="<?php if (isset($rida[111]) && !empty($rida[111])) echo htmlspecialchars($rida[111]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1111" maxlength="15" style="width:75px" placeholder="B2" value="<?php if (isset($rida[112]) && !empty($rida[112])) echo htmlspecialchars($rida[112]);?>"></div>
					<div class="essa">
						<input type="number" name="1127" min="0" max="9" value="<?php if (isset($rida[128])&& is_numeric($rida[128])) echo $rida[128];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1128" min="0" max="9" value="<?php if (isset($rida[129])&& is_numeric($rida[129])) echo $rida[129];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1112" maxlength="15" style="width:75px" placeholder="F2" value="<?php if (isset($rida[113]) && !empty($rida[113])) echo htmlspecialchars($rida[113]);?>"></div>
			</div>
		</div>	
										
		<div id="kaheksa">
			<h1>1/8 finaalid</h1>		
			<div class="mang">
				<div class="voistkond"><input type="text" name="1129" maxlength="15" style="width:75px" value="<?php if (isset($rida[130]) && !empty($rida[130])) echo htmlspecialchars($rida[130]);?>"></div>
					<div class="essa">
						<input type="number" name="1137" min="0" max="9" value="<?php if (isset($rida[138])&& is_numeric($rida[138])) echo $rida[138];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1138" min="0" max="9" value="<?php if (isset($rida[139])&& is_numeric($rida[139])) echo $rida[139];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1130" maxlength="15" style="width:75px" value="<?php if (isset($rida[131]) && !empty($rida[131])) echo htmlspecialchars($rida[131]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1131" maxlength="15" style="width:75px" value="<?php if (isset($rida[132]) && !empty($rida[132])) echo htmlspecialchars($rida[132]);?>"></div>
					<div class="essa">
						<input type="number" name="1139" min="0" max="9" value="<?php if (isset($rida[140])&& is_numeric($rida[140])) echo $rida[140];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1140" min="0" max="9" value="<?php if (isset($rida[141])&& is_numeric($rida[141])) echo $rida[141];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1132" maxlength="15" style="width:75px" value="<?php if (isset($rida[133]) && !empty($rida[133])) echo htmlspecialchars($rida[133]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1133" maxlength="15" style="width:75px" value="<?php if (isset($rida[134]) && !empty($rida[134])) echo htmlspecialchars($rida[134]);?>"></div>
					<div class="essa">
						<input type="number" name="1141" min="0" max="9" value="<?php if (isset($rida[142])&& is_numeric($rida[142])) echo $rida[142];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1142" min="0" max="9" value="<?php if (isset($rida[143])&& is_numeric($rida[143])) echo $rida[143];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1134" maxlength="15" style="width:75px" value="<?php if (isset($rida[135]) && !empty($rida[135])) echo htmlspecialchars($rida[135]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1135" maxlength="15" style="width:75px" value="<?php if (isset($rida[136]) && !empty($rida[136])) echo htmlspecialchars($rida[136]);?>"></div>
					<div class="essa">
						<input type="number" name="1143" min="0" max="9" value="<?php if (isset($rida[144])&& is_numeric($rida[144])) echo $rida[144];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1144" min="0" max="9" value="<?php if (isset($rida[145])&& is_numeric($rida[145])) echo $rida[145];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1136" maxlength="15" style="width:75px" value="<?php if (isset($rida[137]) && !empty($rida[137])) echo htmlspecialchars($rida[137]);?>"></div>
			</div>					
		</div>
		
		<div id="neli">
		<h1>Poolfinaalid</h1>		
			<div class="mang">
				<div class="voistkond"><input type="text" name="1145" maxlength="15" style="width:75px" value="<?php if (isset($rida[146]) && !empty($rida[146])) echo htmlspecialchars($rida[146]);?>"></div>
					<div class="essa">
						<input type="number" name="1149" min="0" max="9" value="<?php if (isset($rida[150])&& is_numeric($rida[150])) echo $rida[150];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1150" min="0" max="9" value="<?php if (isset($rida[151])&& is_numeric($rida[151])) echo $rida[151];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1146" maxlength="15" style="width:75px" value="<?php if (isset($rida[147]) && !empty($rida[147])) echo htmlspecialchars($rida[147]);?>"></div>
			</div>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1147" maxlength="15" style="width:75px" value="<?php if (isset($rida[148]) && !empty($rida[148])) echo htmlspecialchars($rida[148]);?>"></div>
					<div class="essa">
						<input type="number" name="1151" min="0" max="9" value="<?php if (isset($rida[152])&& is_numeric($rida[152])) echo $rida[152];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1152" min="0" max="9" value="<?php if (isset($rida[153])&& is_numeric($rida[153])) echo $rida[153];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1148" maxlength="15" style="width:75px" value="<?php if (isset($rida[149]) && !empty($rida[149])) echo htmlspecialchars($rida[149]);?>"></div>
			</div>			
		</div>
		
		<div id="finaal">
			<h1>Finaal</h1>
			<div class="mang">
				<div class="voistkond"><input type="text" name="1153" maxlength="15" style="width:75px" value="<?php if (isset($rida[154]) && !empty($rida[154])) echo htmlspecialchars($rida[154]);?>"></div>
					<div class="essa">
						<input type="number" name="1155" min="0" max="9" value="<?php if (isset($rida[156])&& is_numeric($rida[156])) echo $rida[156];?>">
					</div>
					<div class="tessa">
						<input type="number" name="1156" min="0" max="9" value="<?php if (isset($rida[157])&& is_numeric($rida[157])) echo $rida[157];?>">
					</div>
				<div class="voistkond2"><input type="text" name="1154" maxlength="15" style="width:75px" value="<?php if (isset($rida[155]) && !empty($rida[155])) echo htmlspecialchars($rida[155]);?>"></div>
			</div>	
		</div>	
		</br>
		<div class="mang">	
			<div class="voistkond">Võitja:<input type="text" name="1157" maxlength="15" style="width:75px" value="<?php if (isset($rida[158]) && !empty($rida[158])) echo htmlspecialchars($rida[158]);?>"></div>
		</div>
		
	</div>	
	<div style="clear:both"></div>
	</div>
	
	
	
	<div class="tabel">	
	<div>	
		<table>
  			<tr>
    			<th>Riik</th>
    			<th>Koht</th>
  			</tr>
  			<tr>
    			<td style="width:130px">Prantsusmaa</td>
    			<td><input type="number" name="1073" min="0" max="4" value="<?php if (isset($rida[74])&& is_numeric($rida[74])) echo $rida[74];?>"></td>
  			</tr>
  			<tr>
    			<td>Rumeenia</td>
    			<td><input type="number" name="1074" min="0" max="4" value="<?php if (isset($rida[75])&& is_numeric($rida[75])) echo $rida[75];?>"></td>
  			</tr>
  			<tr>
    			<td>Albaania</td>
    			<td><input type="number" name="1075" min="0" max="4" value="<?php if (isset($rida[76])&& is_numeric($rida[76])) echo $rida[76];?>"></td>
  			</tr>
  			<tr>
    			<td>Sveits</td>
    			<td><input type="number" name="1076" min="0" max="4" value="<?php if (isset($rida[77])&& is_numeric($rida[77])) echo $rida[77];?>"></td>
  			</tr>
		</table>
	</div>
	
	<div>	
		<table>
  			<tr>
   				 <th>Riik</th>
    			<th>Koht</th>
  			</tr>
  			<tr>
    			<td style="width:130px">Inglismaa</td>
    			<td><input type="number" name="1077" min="0" max="4" value="<?php if (isset($rida[78])&& is_numeric($rida[78])) echo $rida[78];?>"></td>
  			</tr>
  			<tr>
		    	<td>Venemaa</td>
		   		<td><input type="number" name="1078" min="0" max="4" value="<?php if (isset($rida[79])&& is_numeric($rida[79])) echo $rida[79];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Wales</td>
		    	<td><input type="number" name="1079" min="0" max="4" value="<?php if (isset($rida[80])&& is_numeric($rida[80])) echo $rida[80];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Slovakkia</td>
		    	<td><input type="number" name="1080" min="0" max="4" value="<?php if (isset($rida[81])&& is_numeric($rida[81])) echo $rida[81];?>"></td>
		  	</tr>
	</table>
	</div>
	
	<div>	
		<table>
		  	<tr>
		    	<th>Riik</th>
		    	<th>Koht</th>
		  	</tr>
		  	<tr>
		    	<td style="width:130px">Saksamaa</td>
		    	<td><input type="number" name="1081" min="0" max="4" value="<?php if (isset($rida[82])&& is_numeric($rida[82])) echo $rida[82];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Ukraina</td>
		    	<td><input type="number" name="1082" min="0" max="4" value="<?php if (isset($rida[83])&& is_numeric($rida[83])) echo $rida[83];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Poola</td>
		    	<td><input type="number" name="1083" min="0" max="4" value="<?php if (isset($rida[84])&& is_numeric($rida[84])) echo $rida[84];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Põhja-Iirimaa</td>
		    	<td><input type="number" name="1084" min="0" max="4" value="<?php if (isset($rida[85])&& is_numeric($rida[85])) echo $rida[85];?>"></td>
		  	</tr>
		</table>
	</div>
	
	<div>	
		<table>
		  	<tr>
		    	<th>Riik</th>
		    	<th>Koht</th>
		  	</tr>
		  	<tr>
		    	<td style="width:130px">Hispaania</td>
		    	<td><input type="number" name="1085" min="0" max="4" value="<?php if (isset($rida[86])&& is_numeric($rida[86])) echo $rida[86];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Tsehhi</td>
		    	<td><input type="number" name="1086" min="0" max="4" value="<?php if (isset($rida[87])&& is_numeric($rida[87])) echo $rida[87];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Türgi</td>
		    	<td><input type="number" name="1087" min="0" max="4" value="<?php if (isset($rida[88])&& is_numeric($rida[88])) echo $rida[88];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Horvaatia</td>
		    	<td><input type="number" name="1088" min="0" max="4" value="<?php if (isset($rida[89])&& is_numeric($rida[89])) echo $rida[89];?>"></td>
		  	</tr>
		</table>
	</div>
	
	<div>	
		<table>
		  	<tr>
		    	<th>Riik</th>
		    	<th>Koht</th>
		  	</tr>
		  	<tr>
		    	<td style="width:130px">Belgia</td>
		    	<td><input type="number" name="1089" min="0" max="4" value="<?php if (isset($rida[90])&& is_numeric($rida[90])) echo $rida[90];?>"></td>
		  	</tr>
		  	<tr>
		   		<td>Itaalia</td>
		    	<td><input type="number" name="1090" min="0" max="4" value="<?php if (isset($rida[91])&& is_numeric($rida[91])) echo $rida[91];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Iirimaa</td>
		    	<td><input type="number" name="1091" min="0" max="4" value="<?php if (isset($rida[92])&& is_numeric($rida[92])) echo $rida[92];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Rootsi</td>
		    	<td><input type="number" name="1092" min="0" max="4" value="<?php if (isset($rida[93])&& is_numeric($rida[93])) echo $rida[93];?>"></td>
		  	</tr>
		</table>
	</div>
	
	<div>	
		<table>
		  	<tr>
		    	<th>Riik</th>
		    	<th>Koht</th>
		  	</tr>
		  	<tr>
		    	<td style="width:130px">Portugal</td>
		    	<td><input type="number" name="1093" min="0" max="4" value="<?php if (isset($rida[94])&& is_numeric($rida[94])) echo $rida[94];?>"></td>
		  	</tr>
		  	<tr>
		   		<td>Island</td>
		    	<td><input type="number" name="1094" min="0" max="4" value="<?php if (isset($rida[95])&& is_numeric($rida[95])) echo $rida[95];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Austria</td>
		    	<td><input type="number" name="1095" min="0" max="4" value="<?php if (isset($rida[96])&& is_numeric($rida[96])) echo $rida[96];?>"></td>
		  	</tr>
		  	<tr>
		    	<td>Ungari</td>
		    	<td><input type="number" name="1096" min="0" max="4" value="<?php if (isset($rida[97])&& is_numeric($rida[97])) echo $rida[97];?>"></td>
		  	</tr>
		</table>
	</div>
	
	</div>	
	<div id="lisakyssad">
		<div class="kyssa"> Kumb eelmise korra finalistist jõuab kaugemale - Itaalia või Hispaania?<br>
			<input type="radio" name="1158" value="Itaalia" <?php if (isset($rida[159])&& $rida[159]=="Itaalia") echo "checked";?> > Itaalia<br>
  			<input type="radio" name="1158" value="Hispaania" <?php if (isset($rida[159])&& $rida[159]=="Hispaania") echo "checked";?> > Hispaania<br>
  			<input type="radio" name="1158" value="Sama" <?php if (isset($rida[159])&& $rida[159]=="Sama") echo "checked";?> > Sama<br>
		</div>
		<div class="kyssa"> Kumb lööb alagrupifaasis rohkem väravaid - Prantsusmaa või Saksamaa?<br>
			<input type="radio" name="1159" value="Prantsusmaa" <?php if (isset($rida[160])&& $rida[160]=="Prantsusmaa") echo "checked";?>> Prantsusmaa<br>
  			<input type="radio" name="1159" value="Saksamaa" <?php if (isset($rida[160])&& $rida[160]=="Saksamaa") echo "checked";?>> Saksamaa<br>
  			<input type="radio" name="1159" value="Sama" <?php if (isset($rida[160])&& $rida[160]=="Sama") echo "checked";?>> Sama<br>
		</div>
		<div class="kyssa">Mitu koondist ei löö EM-l ühtegi väravat?<br>
  			<input type="number" name="1160" min="0" max="12" value="<?php if (isset($rida[161])&& is_numeric($rida[161])) echo $rida[161];?>">
		</div>
		<div class="kyssa"> Kas Ronaldo lööb üle 4 värava?<br>
			<input type="radio" name="1161" value="Jah" <?php if (isset($rida[162])&& $rida[162]=="Jah") echo "checked";?>> Jah<br>
  			<input type="radio" name="1161" value="Ei" <?php if (isset($rida[162])&& $rida[162]=="Ei") echo "checked";?>> Ei<br>
		</div>
		<div class="kyssa">Mitu mängu läheb penaltiseeriani?<br>
  			<input type="number" name="1162" min="0" max="16" value="<?php if (isset($rida[163])&& is_numeric($rida[163])) echo $rida[163];?>">
		</div>
		<div class="kyssa"> Kas EM-l lüüakse rohkem väravaid kui eelmine EM?<br>
			<input type="radio" name="1163" value="Jah" <?php if (isset($rida[164])&& $rida[164]=="Jah") echo "checked";?>> Jah<br>
  			<input type="radio" name="1163" value="Ei" <?php if (isset($rida[164])&& $rida[164]=="Ei") echo "checked";?>> Ei<br>
		</div>
		<div class="kyssa"> Kas mõni Saksamaa kaitsemängija lööb turniiril värava?<br>
			<input type="radio" name="1164" value="Jah" <?php if (isset($rida[165])&& $rida[165]=="Jah") echo "checked";?>> Jah<br>
  			<input type="radio" name="1164" value="Ei" <?php if (isset($rida[165])&& $rida[165]=="Ei") echo "checked";?>> Ei<br>
		</div>
		<div class="kyssa"> Kas mõni alagrupis kolmandaks jääänud võistkond jõuab poolfinaali?<br>
			<input type="radio" name="1165" value="Jah" <?php if (isset($rida[166])&& $rida[166]=="Jah") echo "checked";?>> Jah<br>
  			<input type="radio" name="1165" value="Ei" <?php if (isset($rida[166])&& $rida[166]=="Ei") echo "checked";?>> Ei<br>
		</div>
		<div class="kyssa">Mitu erinevat mängijat lööb Inglismaa koondise eest värava?<br>
  			<input type="number" name="1166" min="0" max="12" value="<?php if (isset($rida[167])&& is_numeric($rida[167])) echo $rida[167];?>">
		</div>
		<div class="kyssa"> Kas EM-i võidab mõni võistkond, kes pole varem seda suutnud?<br>
			<input type="radio" name="1167" value="Jah" <?php if (isset($rida[168])&& $rida[168]=="Jah") echo "checked";?>> Jah<br>
  			<input type="radio" name="1167" value="Ei" <?php if (isset($rida[168])&& $rida[168]=="Ei") echo "checked";?>> Ei<br>
		</div>
		<div class="kyssa"> Kas Hispaania koondis on igas mängus pallivaldamiselt vastasest üle?<br>
			<input type="radio" name="1168" value="Jah" <?php if (isset($rida[169])&& $rida[169]=="Jah") echo "checked";?>> Jah<br>
  			<input type="radio" name="1168" value="Ei" <?php if (isset($rida[169])&& $rida[169]=="Ei") echo "checked";?>> Ei<br>
		</div>
		<div class="kyssa">Kui vana on vanim väravalööja turniiril?<br>
  			<input type="number" name="1169" min="0" max="50" value="<?php if (isset($rida[170])&& is_numeric($rida[170])) echo $rida[170];?>">
		</div>
		<div class="kyssa"> Kumb lööb rohkem väravaid - Zlatan või Lewandowski?<br>
			<input type="radio" name="1170" value="Zlatan" <?php if (isset($rida[171])&& $rida[171]=="Zlatan") echo "checked";?>> Zlatan<br>
  			<input type="radio" name="1170" value="Levandovksi" <?php if (isset($rida[171])&& $rida[171]=="Levandovski") echo "checked";?>> Levandovski<br>
  			<input type="radio" name="1170" value="Sama" <?php if (isset($rida[171])&& $rida[171]=="Sama") echo "checked";?>> Sama<br>
		</div>
		<div class="kyssa"> Mis koondis lööb turniiri esimese värava?<br>
			<input type="radio" name="1171" value="Prantsusmaa" <?php if (isset($rida[172])&& $rida[172]=="Prantsusmaa") echo "checked";?>> Prantsusmaa<br>
  			<input type="radio" name="1171" value="Rumeenia" <?php if (isset($rida[172])&& $rida[172]=="Rumeenia") echo "checked";?>> Rumeenia<br>
  			<input type="radio" name="1171" value="Muu" <?php if (isset($rida[172])&& $rida[172]=="Muu") echo "checked";?>> Muu<br>
		</div>
		<div class="kyssa"> Kas Daniel tuleb top 5 hulka ennustusmängus?<br>
			<input type="radio" name="1172" value="Jah" <?php if (isset($rida[173])&& $rida[173]=="Jah") echo "checked";?>> Jah<br>
  			<input type="radio" name="1172" value="Ei" <?php if (isset($rida[173])&& $rida[173]=="Ei") echo "checked";?>> Ei<br>
		</div>
	</div>
	<div id="button1"> <input type="submit" value="Saada" id="btn"></div>
	</form>		

	</body>
</html>

<?php 

if (!empty($_POST)){
	
global $connection;
$host="localhost";
$user="test";
$pass="t3st3r123";
$db="test";

$sisu = "";
for ($x = 1001; $x <= 1172; $x++) {
	if (isset($_POST[$x])&& is_numeric($_POST[$x])){
	$value = mysqli_real_escape_string($connection, $_POST[$x]);
	$sisu .= " f".$x;	
    $sisu .= "=";
    $sisu .= " \"";
	$sisu .= $value;
	$sisu .= "\",";
	}
	if (isset($_POST[$x])&& !empty($_POST[$x])&& !is_numeric($_POST[$x])){
	$value = mysqli_real_escape_string($connection, $_POST[$x]);
	$sisu .= " f".$x;	
    $sisu .= "=";
    $sisu .= " \"";
	$sisu .= $value;
	$sisu .= "\",";
	}
}

$sisu = substr($sisu, 0, -1);

$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
$query= "UPDATE koiderma_hinda SET ".$sisu;
$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));

require_once("kalkuleeri.php");
arvuta();
}
?>