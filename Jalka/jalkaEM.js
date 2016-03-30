var next = document.getElementById("next");
next.onclick = function(){
	
	var value = true;
	for (j = 101; j < 137; j++) {						//kontrollib kas tulemused on sobivas formaadis
		var x = document.getElementById(j).value;
		var y = parseInt(x);
		
		if (isNaN(y) || y < 0 || y > 9){
			value = false;
			}		
	}
	if (value){
		koguAndmed();									//võib minna arvutama
	}	
	else {
		alert ("Palun kontrolli sisestust!!");
	}
}	
function koguAndmed (){
	var a = [101,113,125];								//alagrupi esimese mängu tulemuse algus
	var tulemused=[];
	
	for (i=0; i < a.length; i++) {						// paneb alagruppide tulemused array sisse eraldi
		var k=0;
		for (j=0; j < 12; j++) {
			var l = a[i]+j;
			var x = document.getElementById(l).value;
			var y = parseInt(x);
			tulemused[k]=y;
			k++;
		}
		arvutused (tulemused, i);				
	}	
}
function arvutused (tulemused, i){
	
	var team1p, team2p, team3p, team4p, team1g, team2g, team3g, team4g, team1ga, team2ga, team3ga, team4ga;
	var punktid =[];
	
	for (j=0; j < 12; j=j+2) {							//määrab punktid mängudele
		if (tulemused[j] >  tulemused[j+1]) {
			punktid[j] =3;
			punktid[j+1] =0;
			}
		else if (tulemused[j] ==  tulemused[j+1]) {
			punktid[j] =1;
			punktid[j+1] =1;
			}
		else if (tulemused[j] <  tulemused[j+1]) {
			punktid[j] =0;
			punktid[j+1] =3;
			}				
	}
	team1p= punktid[0]+punktid[6]+punktid[9];			//punktid tiimidele
	team2p= punktid[1]+punktid[4]+punktid[10];
	team3p= punktid[2]+punktid[7]+punktid[11];
	team4p= punktid[3]+punktid[5]+punktid[8];
	var tiimipunktid =[team1p, team2p, team3p, team4p];
	
	team1g= tulemused[0]+tulemused[6]+tulemused[9];		//löödud väravad tiimidele
	team2g= tulemused[1]+tulemused[4]+tulemused[10];
	team3g= tulemused[2]+tulemused[7]+tulemused[11];
	team4g= tulemused[3]+tulemused[5]+tulemused[8];
	var tiimivaravad = [team1g, team2g, team3g, team4g];
	
	team1ga= tulemused[1]+tulemused[7]+tulemused[8];	// vastu löödud väravad tiimil
	team2ga= tulemused[0]+tulemused[5]+tulemused[11];
	team3ga= tulemused[3]+tulemused[6]+tulemused[10];
	team4ga= tulemused[2]+tulemused[4]+tulemused[9];
	var tiimivaravadag = [team1ga, team2ga, team3ga, team4ga];
	
	var ranks=ranking (tulemused, tiimipunktid, tiimivaravad, tiimivaravadag);
	
	l = 201 + i*4;
	k = 301 + i*4;
	q = 401 + i*4;
	for (j=0; j < 4; j++) {								// täidab punktide ja väravate vahe tabeli väljad
		document.getElementById(k).innerHTML= tiimipunktid[j];
		document.getElementById(l).innerHTML= tiimivaravad[j]+" : " + tiimivaravadag[j];
		document.getElementById(q).innerHTML= ranks[j];
		k++;
		l++;
		q++;		
	} 		
}
function ranking (tulemused, tiimipunktid, tiimivaravad, tiimivaravadag){
	
	var n=0;
	var pl;
	var rank=1;
	var kohad=[];				//siia arraysse tulevad kohad
	var vahe1 = tiimivaravad[0]-tiimivaravadag[0];
	var vahe2 = tiimivaravad[1]-tiimivaravadag[1];
	var vahe3 = tiimivaravad[2]-tiimivaravadag[2];
	var vahe4 = tiimivaravad[3]-tiimivaravadag[3];
	var vvahe= [vahe1, vahe2, vahe3, vahe4];
	
	for (s = 9; s >= 0; s--) { 
    
		for (j = 0; j < 4; j++) {
			if (tiimipunktid[j]==s){
				pl=j;
				n++
				}			
			}
			
		if (n==1){
			kohad [pl] = rank;
			rank++;
			}	
		if (n==2){
			var a = tiimipunktid.indexOf(s);
			var b = tiimipunktid.lastIndexOf(s);
			var c = twoequal(a,b, tulemused, tiimivaravad, tiimivaravadag);
			if (c){
				kohad[a]=rank;
				kohad[b]=rank+1;
				}
			else{
				kohad[a]=rank+1;
				kohad[b]=rank;
				}	
			
			rank=rank+2;
			}	
		if (n==3){
			
			var indexes = getAllIndexes(tiimipunktid,s);
			var a = indexes[0];
			var b = indexes[1];
			var c = indexes[2];
			var seiss = threeequal(a,b,c, vvahe, tulemused, tiimivaravad, tiimivaravadag);
			kohad[a]=seiss[0]+rank-1;
			kohad[b]=seiss[1]+rank-1;
			kohad[c]=seiss[2]+rank-1;
			rank=rank+3;
			}		
		if (n==4){
	
			var d=fourequal(vvahe, tulemused, tiimivaravad, tiimivaravadag);
			if (d[0]==1001){
				var e=fourequal(tiimivaravad);
				if (e[0]==1001){
					kohad[0]=1;
					kohad[1]=2;
					kohad[2]=3;
					kohad[3]=4;				
				}
				else {
					kohad[0]=e[0];
					kohad[1]=e[1];
					kohad[2]=e[2];
					kohad[3]=e[3];				
					}
				}
			else {	
				kohad[0]=d[0];
				kohad[1]=d[1];
				kohad[2]=d[2];
				kohad[3]=d[3];
			}
			}				
	n=0;							
	}
	return kohad;
}

function twoequal (a,b, tulemused, tiimivaravad, tiimivaravadag){
	var c = [0,2,1,0,0,1];
	var d = [1,3,3,2,3,2];
	
	var muut = tulemused[8];
	var muut2 = tulemused[9];
	tulemused[8]=muut2;
	tulemused[9]=muut;
	
	for (j=0; j < 6; j++) {	
		var k = j*2;
		if (a==c[j] && b ==d[j]){
		if (tulemused[k]> tulemused[k+1]){
			return true;			
			}
		if (tulemused[k]< tulemused[k+1]){
			return false;	
			}	
		if (tulemused[k]== tulemused[k+1]){
			var vahe = tiimivaravad[a]-tiimivaravadag[a];
			var vahe2 = tiimivaravad[b]-tiimivaravadag[b];
			
			if (vahe> vahe2){
				return true;
			}
			else if (vahe< vahe2){
				return false;
			}
			else if (vahe == vahe2){
				if (tiimivaravad[a]> tiimivaravad[b]){
				return true;
				}
				else if (tiimivaravad[a]< tiimivaravad[b]){
				return false;
				} 	
				else if (tiimivaravad[a]== tiimivaravad[b]){
					return true;
					}			
			}						
		}
		}
	}
}	
function fourequal(vvahe, tulemused, tiimivaravad, tiimivaravadag){
	
	var m=0;
	var plN;
	var rankN=1;
	var kohadN=[];
	var max = Math.max.apply(Math, vvahe);
	var min = Math.min.apply(Math, vvahe);
	
	for (t = max; t >= min; t--) { 
    
		for (j = 0; j < 4; j++) {
			if (vvahe[j]==t){
				plN=j;
				m++
				}			
			}
		if (m==1){
			kohadN [plN] = rankN;
			rankN++;
			}	
		if (m==2){
			var a = vvahe.indexOf(t);
			var b = vvahe.lastIndexOf(t);
			var c = twoequal(a,b, tulemused, tiimivaravad, tiimivaravadag);
			if (c){
				kohadN[a]=rankN;
				kohadN[b]=rankN+1;
				}
			else{
				kohadN[a]=rankN+1;
				kohadN[b]=rankN;
				}	
			
			rankN=rankN+2;
			}		
		if (m==3){
			var indexes = getAllIndexes(vvahe,t);
			var a = indexes[0];
			var b = indexes[1];
			var c = indexes[2];
			var seisk=threeequal(a,b,c, vvahe, tulemused, tiimivaravad, tiimivaravadag);
			kohadN[a]=seisk[0]+rankN-1;
			kohadN[b]=seisk[1]+rankN-1;
			kohadN[c]=seisk[2]+rankN-1;
			
			}	
				
		if (m==4){
			kohadN[0]=1001;
			}	
	m=0;		
			
	}
	
	return kohadN;
}	
function getAllIndexes(arr, val) {
    	var indexes = [], i;
   		for(i = 0; i < arr.length; i++){
        	if (arr[i] == val)
            indexes.push(i);
        }
    		return indexes;
}
function threeequal(a,b,c, vvahe, tulemused, tiimivaravad, tiimivaravadag){
	var uustulemus=[]; 
	var ppunktid=[];
	var team1pp, team2pp, team3pp;
	var seis=[];
	
	if (a==0 && b==1 && c==2){
		uustulemus=[tulemused[0], tulemused[1], tulemused[6], tulemused[7], tulemused[10], tulemused[11]];
		}
	else if (a==0 && b==1 && c==3){
		uustulemus=[tulemused[0], tulemused[1], tulemused[9], tulemused[8], tulemused[4], tulemused[5]];
		}
	else if (a==1 && b==2 && c==3){
		uustulemus=[tulemused[10], tulemused[11], tulemused[4], tulemused[5], tulemused[2], tulemused[2]];
		}

	for (j=0; j < 6; j=j+2) {							//määrab punktid mängudele
		if (uustulemus[j] >  uustulemus[j+1]) {
			ppunktid[j] =3;
			ppunktid[j+1] =0;
			}
		else if (uustulemus[j] ==  uustulemus[j+1]) {
			ppunktid[j] =1;
			ppunktid[j+1] =1;
			}
		else if (uustulemus[j] <  uustulemus[j+1]) {
			ppunktid[j] =0;
			ppunktid[j+1] =3;
			}				
	}
	team1pp=ppunktid[0]+ppunktid[2];
	team2pp=ppunktid[1]+ppunktid[4];
	team3pp=ppunktid[3]+ppunktid[5];
	tiimipunktidd=[team1pp, team2pp, team3pp];
	var team1gg=uustulemus[0]+uustulemus[2];
	var team2gg=uustulemus[1]+uustulemus[4];
	var team3gg=uustulemus[3]+uustulemus[5];
	var team1gaa=uustulemus[1]+uustulemus[3];
	var team2gaa=uustulemus[0]+uustulemus[5];
	var team3gaa=uustulemus[2]+uustulemus[4];
	var vahe11=team1gg-team1gaa;
	var vahe22=team2gg-team2gaa;
	var vahe33=team3gg-team3gaa;
	var vaheUus=[vahe11, vahe22, vahe33];
	var varavUus=[team1gg, team2gg, team3gg];
	var uusVVahe=[tiimivaravad[a]-tiimivaravadag[a],tiimivaravad[b]-tiimivaravadag[b],tiimivaravad[c]-tiimivaravadag[c]];
	var uusVaravKoik=[tiimivaravad[a],tiimivaravad[b],tiimivaravad[c]];
	
	var kohadd = ranking3 (tiimipunktidd, tulemused, tiimivaravad, tiimivaravadag,a,b,c);
		if (kohadd[0]==1001){
				var kohad3=ranking3(vaheUus, tulemused, tiimivaravad, tiimivaravadag,a,b,c);
				if (kohad3[0]==1001){
					var kohad4=ranking3(varavUus, tulemused, tiimivaravad, tiimivaravadag,a,b,c);
					if (kohad4[0]==1001){
						var kohad5=ranking3(uusVVahe, tulemused, tiimivaravad, tiimivaravadag,a,b,c);
							if (kohad5[0]==1001){
								var kohad6=ranking3(uusVaravKoik, tulemused, tiimivaravad, tiimivaravadag,a,b,c);	
									if (kohad6[0]==1001){
										seis[0]=1;
										seis[1]=2;
										seis[2]=3;
									}
									else {
										seis[0]=kohad6[0];
										seis[1]=kohad6[1];
										seis[2]=kohad6[2];
									}
							}
							else {
								seis[0]=kohad5[0];
								seis[1]=kohad5[1];
								seis[2]=kohad5[2];
							}							
					}
					else {
						seis[0]=kohad4[0];
						seis[1]=kohad4[1];
						seis[2]=kohad4[2];
					}							
				}
				else {
					seis[0]=kohad3[0];
					seis[1]=kohad3[1];
					seis[2]=kohad3[2];
				}
		}
		else {	
			seis[0]=kohadd[0];
			seis[1]=kohadd[1];
			seis[2]=kohadd[2];
		}
	return seis;
}
function ranking3 (array, tulemused, tiimivaravad, tiimivaravadag, a,b,c){
	var p=0;
	var plK;
	var rankK=1;
	var kohadK=[];
	var max = Math.max.apply(Math, array);
	var min = Math.min.apply(Math, array);
	
	for (v = max; v >= min; v--) { 
    	
		for (j = 0; j < 3; j++) {
			if (array[j]==v){
				plK=j;
				p++
				}			
			}
		if (p==1){
			kohadK [plK] = rankK;
			rankK++;
			}	
		if (p==2){
			var d = array.indexOf(v);
			var e = array.lastIndexOf(v);
			if (d==0 && e==1){
				var f=a;
				var g=b;
				}
			else if (d==0 && e==2){
				var f=a;
				var g=c;
				}
			else if (d==1 && e==2){
				var f=b;
				var g=c;
				}
			
			var h = twoequal(f,g, tulemused, tiimivaravad, tiimivaravadag);
			if (h){
				kohadK[d]=rankK;
				kohadK[e]=rankK+1;
				}
			else{
				kohadK[d]=rankK+1;
				kohadK[e]=rankK;
				}	
			
			rankK=rankK+2;
			}		
			
		if (p==3){
			kohadK[0]=1001;
			}	
	p=0;				
	}
	return kohadK;
}