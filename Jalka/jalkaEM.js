window.onload = function() {
	
	var grupp = ["A", "B", "C", "D", "E", "F"];
	var team = ["Prantsusmaa", "Rumeenia", "Albaania", "Sveits", "Inglismaa", "Venemaa", "Wales", "Slovakkia", "Saksamaa", "Ukraina", "Poola", "Põhja-Iirimaa", "Hispaania", "Tsehhi", "Türgi", "Horvaatia", "Belgia", "Itaalia", "Iirimaa", "Rootsi", "Portugal", "Island", "Austria", "Ungari"];

	var l = 101;    // alagrupimängude tulemused jooksevad id-ga: 101-172
	var t= 1001;	// input name väli
	for (i = 0; i < 6; i++) {
	document.getElementById("grupp").innerHTML += "<h1>Alagrupp "+grupp[i]+"</h1>";   // Muudab alagruppide pealkirju
	var mangud = [team[i*4],team[i*4+1],team[i*4+2],team[i*4+3],team[i*4+1],team[i*4+3],team[i*4],team[i*4+2],team[i*4+3],team[i*4],team[i*4+1],team[i*4+2]];	
	var m=0;
		for (j = 0; j < 6; j++) {      			//lisab ühe rea (ühe mängu) alagruppi
		var p = l+1;	
		var tt= t+1
		document.getElementById("grupp").innerHTML += "<div class=\"mang\"><div class=\"voistkond\">"+mangud[m]+"</div><div class=\"essa\"><input type=\"number\" name=\""+t+"\" min=\"0\" max=\"9\" id=\"" +l+ "\"></div><div class=\"tessa\"><input type=\"number\" name=\""+tt+"\" min=\"0\" max=\"9\" id=\""+ p +"\"></div><div class=\"voistkond2\">"+mangud[m+1]+"</div></div>";
		l=l+2;		
		m=m+2;	
		t=t+2;;	
		}	
	}	
}


var next = document.getElementById("next");
next.onclick = function(){
	var value = true;
	var nimeS = true;
	for (j = 101; j < 173; j++) {						//kontrollib kas tulemused on sobivas formaadis
		var x = document.getElementById(j).value;
		var y = parseInt(x);
		
		if (isNaN(y) || y < 0 || y > 9){
			value = false;
			}		
	}
	var nimiS = document.getElementById("100").value;
	if (!nimiS){
		nimeS = false;
		}
	
	if (value && nimeS){
		document.getElementById("edasi").style.display = "block";
		koguAndmed();									//võib minna arvutama
	}	
	else if (!nimeS){
		alert ("Sisesta nimi");
		}
	else {
		alert ("Palun kontrolli sisestust!!");
	}
}	
function koguAndmed (){
	var a = [101,113,125,137,149,161];								//alagrupi esimese m?ngu tulemuse algus
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
	
	team1ga= tulemused[1]+tulemused[7]+tulemused[8];	// vastu l??dud v?ravad tiimil
	team2ga= tulemused[0]+tulemused[5]+tulemused[11];
	team3ga= tulemused[3]+tulemused[6]+tulemused[10];
	team4ga= tulemused[2]+tulemused[4]+tulemused[9];
	var tiimivaravadag = [team1ga, team2ga, team3ga, team4ga];
	
	var ranks=ranking (tulemused, tiimipunktid, tiimivaravad, tiimivaravadag);
	
	l = 201 + i*4;
	k = 301 + i*4;
	q = 401 + i*4;
	ps = 801 + i*4;

	for (j=0; j < 4; j++) {								// t?idab punktide ja v?ravate vahe tabeli v?ljad
		document.getElementById(k).innerHTML= tiimipunktid[j];
		document.getElementById(l).innerHTML= tiimivaravad[j]+" : " + tiimivaravadag[j];
		document.getElementById(q).innerHTML= ranks[j];
		document.getElementById(ps).value = ranks[j];
		k++;
		l++;
		q++;
		ps++;		
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
				var e=fourequal(tiimivaravad, tulemused, tiimivaravad, tiimivaravadag);
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
	else if (a==0 && b==2 && c==3){
		uustulemus=[tulemused[6], tulemused[7], tulemused[9], tulemused[8], tulemused[2], tulemused[3]];
		}
	else if (a==1 && b==2 && c==3){
		uustulemus=[tulemused[10], tulemused[11], tulemused[4], tulemused[5], tulemused[2], tulemused[3]];
		}

	for (j=0; j < 6; j=j+2) {							//m??rab punktid m?ngudele
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

var edasi = document.getElementById("edasi");
edasi.onclick = function(){
	document.getElementById("grupp").style.display = "none";
	document.getElementById("next").style.display = "none";
	document.getElementById("kuusteist").style.display = "block";
	kuusteistData();
	}

$(document).ready(function(){

			$("#togg").click(function(){
				$("#grupp").toggle();
				$("#next").toggle();
			});	
			
});
function kuusteistData(){
	
	var alaPunktid=[];
	var alaKohad=[];
	var riigid=[];
	var varStrike=[];
	var varAgainst=[];
	var varVahe=[];
	var ii=0;
	
	for (var jj = 101; jj < 125; jj++) {	
		var pp = jj+200;					
		var aa = document.getElementById(pp).innerHTML;
		var bb = parseInt(aa);
		alaPunktid[ii]=bb;
		
		var pm = jj+400;					
		var ab = document.getElementById(pm).innerHTML;
		riigid[ii]=ab;
		
		var pn = jj+300;					
		var ac = document.getElementById(pn).innerHTML;
		var bc = parseInt(ac);
		alaKohad[ii]=bc;
		
		var po = jj+100;					
		var ad = document.getElementById(po).innerHTML;
		
		var pikkus = ad.length;

		if (pikkus==5){		
		var ae = ad.charAt(0);
		var af = parseInt(ae);
		var ag = ad.charAt(4);
		var ah = parseInt(ag);
		varStrike[ii]=af;
		varAgainst[ii]=ah;
		varVahe[ii]=af-ah;
		} else if (pikkus==7){		
		var ae = ad.slice(0,2);
		var af = parseInt(ae);
		var ag = ad.slice(5,7);
		var ah = parseInt(ag);
		varStrike[ii]=af;
		varAgainst[ii]=ah;
		varVahe[ii]=af-ah;
		}
		else if (pikkus==6){
			var ab = ad.charAt(1);
			var al = parseInt(ab);
			if (isNaN(al)){
				var ae = ad.charAt(0);
				var af = parseInt(ae);
				var ag = ad.slice(4,6);
				var ah = parseInt(ag);
				varStrike[ii]=af;
				varAgainst[ii]=ah;
				varVahe[ii]=af-ah;
			} else {	
			var ae = ad.slice(0,2);
			var af = parseInt(ae);
			var ag = ad.charAt(5);
			var ah = parseInt(ag);
			varStrike[ii]=af;
			varAgainst[ii]=ah;
			varVahe[ii]=af-ah;
			}
		}
		
		ii++	
	}
		
	kuusteistArvutus(alaPunktid, riigid, alaKohad, varStrike, varAgainst, varVahe);
}
function kuusteistArvutus(alaPunktid, riigid, alaKohad, varStrike, varAgainst, varVahe){
	
	var esimesePos=[613,605,609,603,611,607];
	var esimesePos2=[837,829,833,827,835,831];
	var teinePos=[601,615,602,612,608,616];
	var teinePos2=[825,839,826,836,832,840];
	var je=0;
	var jt=0;
	var js=0;
	var kolmasRiigid=[];
	var kolmasPunktid=[];
	var kolmasVaravad=[];
	var kolmasVarSisse=[];
	var kolmasVahe=[];
	
	for (var jk = 0; jk < 24; jk++) {	
		if (alaKohad[jk]==1){
			document.getElementById(esimesePos[je]).innerHTML=riigid[jk];
			document.getElementById(esimesePos2[je]).value=riigid[jk];
			je++;
			}
		if (alaKohad[jk]==2){
			document.getElementById(teinePos[jt]).innerHTML=riigid[jk];
			document.getElementById(teinePos2[jt]).value=riigid[jk];
			jt++;
			}
		if (alaKohad[jk]==3){
			kolmasRiigid[js]=riigid[jk];
			kolmasPunktid[js]=alaPunktid[jk];
			kolmasVaravad[js]=varStrike[jk];
			kolmasVarSisse[js]=varAgainst[jk];
			kolmasVahe[js]=varVahe[jk];
			js++;
			}		
	}
	paigutaKolmandad(kolmasRiigid, kolmasPunktid, kolmasVaravad, kolmasVarSisse,kolmasVahe);	
}
function paigutaKolmandad(kolmasRiigid, kolmasPunktid, kolmasVaravad, kolmasVarSisse, kolmasVahe){
		var kolmasPos=[614,606,610,604];
		var kolmasPos2=[838,830,834,828];
		
		var vv, plKol;
		var po =0;
		var kpositsioonid=[];
		var rankKol = 1;
		var maxp = Math.max.apply(Math, kolmasPunktid);
		var minp = Math.min.apply(Math, kolmasPunktid);
	
		for (vv = maxp; vv >= minp; vv--) { 
    	
		for (j = 0; j < 8; j++) {
			if (kolmasPunktid[j]==vv){
				plKol=j;
				po++
				}			
			}
		if (po==1){
			kpositsioonid [plKol] = rankKol;
			rankKol++;
			}	
		if (po==2){
			var dc = kolmasPunktid.indexOf(vv);
			var ec = kolmasPunktid.lastIndexOf(vv);
			if (kolmasVahe[dc] > kolmasVahe[ec]){
				kpositsioonid [dc] = rankKol;
				kpositsioonid [ec] = rankKol+1;
				}
			else if (kolmasVahe[dc] < kolmasVahe[ec]){
				kpositsioonid [dc] = rankKol+1;
				kpositsioonid [ec] = rankKol;
				}
			else if (kolmasVahe[dc] == kolmasVahe[ec]){
					if (kolmasVaravad[dc]  > kolmasVaravad[ec]){
					kpositsioonid [dc] = rankKol;
					kpositsioonid [ec] = rankKol+1;
					}
					else if (kolmasVaravad[dc] < kolmasVaravad[ec]){
					kpositsioonid [dc] = rankKol+1;
					kpositsioonid [ec] = rankKol;
					}
					else if (kolmasVaravad[dc] == kolmasVaravad[ec]){
					kpositsioonid [dc] = rankKol;
					kpositsioonid [ec] = rankKol+1;	
					}		
			}
			rankKol=rankKol+2;
			}	
			
		if (po==3){
			var indexes=getAllIndexes(kolmasPunktid, vv);
			var a = indexes[0];
			var b = indexes[1];
			var c = indexes[2];
			var kolmVar2=[kolmasVaravad[a],kolmasVaravad[b],kolmasVaravad[c]];
			var kolmVahe2=[kolmasVahe[a],kolmasVahe[b],kolmasVahe[c]];
			var vahekokkuvote = kolmedvordselt(kolmVar2, kolmVahe2, rankKol);
			kpositsioonid[a]=vahekokkuvote[0];
			kpositsioonid[b]=vahekokkuvote[1];
			kpositsioonid[c]=vahekokkuvote[2];
			rankKol=rankKol+3;
			}	
		if (po==4){
			var indexes=getAllIndexes(kolmasPunktid, vv);
			var a = indexes[0];
			var b = indexes[1];
			var c = indexes[2];
			var d = indexes[3];
			var kolmVar3=[kolmasVaravad[a],kolmasVaravad[b],kolmasVaravad[c],kolmasVaravad[d]];
			var kolmVahe3=[kolmasVahe[a],kolmasVahe[b],kolmasVahe[c],kolmasVahe[d]];
			var vahekokkuvote2 = neljadvordselt(kolmVar3, kolmVahe3, rankKol);
			kpositsioonid[a]=vahekokkuvote2[0];
			kpositsioonid[b]=vahekokkuvote2[1];
			kpositsioonid[c]=vahekokkuvote2[2];
			kpositsioonid[d]=vahekokkuvote2[3];
			rankKol=rankKol+4;
			}
		if (po==5){
			var indexes=getAllIndexes(kolmasPunktid, vv);
			var a = indexes[0];
			var b = indexes[1];
			var c = indexes[2];
			var d = indexes[3];
			var e = indexes[4];
			var kolmVar4=[kolmasVaravad[a],kolmasVaravad[b],kolmasVaravad[c],kolmasVaravad[d],kolmasVaravad[e]];
			var kolmVahe4=[kolmasVahe[a],kolmasVahe[b],kolmasVahe[c],kolmasVahe[d],kolmasVahe[e]];
			var vahekokkuvote3 = viiedvordselt(kolmVar4, kolmVahe4, rankKol);
			kpositsioonid[a]=vahekokkuvote3[0];
			kpositsioonid[b]=vahekokkuvote3[1];
			kpositsioonid[c]=vahekokkuvote3[2];
			kpositsioonid[d]=vahekokkuvote3[3];
			kpositsioonid[e]=vahekokkuvote3[4];		
			rankKol=rankKol+5;
			}
		if (po==6){
			kpositsioonid [0] = rankKol;
			kpositsioonid [1] = rankKol+1;
			kpositsioonid [2] = rankKol+2;
			kpositsioonid [3] = rankKol+3;
			kpositsioonid [4] = rankKol+4;
			kpositsioonid [5] = rankKol+5;
			}				
		
		po=0;
		}
		
		var newPos = kolmandadPaika(kpositsioonid);
		for (z = 0; z < 4; z++) {
			
			var koht = newPos[z]-1;
			document.getElementById(kolmasPos[z]).innerHTML=kolmasRiigid[koht];	
			document.getElementById(kolmasPos2[z]).value=kolmasRiigid[koht];	
		}
	}	
	
function kolmedvordselt(kolmVar2, kolmVahe2, rankPol){
		var vr, plKolm;
		var pd =0;
		var vordsedK=[];
		var maxs = Math.max.apply(Math, kolmVahe2);
		var mins = Math.min.apply(Math, kolmVahe2);
		
		for (vr = maxs; vr >= mins; vr--) { 
    	
		for (j = 0; j < 3; j++) {
			if (kolmVahe2[j]==vr){
				plKolm=j;
				pd++
				}			
			}
		if (pd==1){
			vordsedK [plKolm] = rankPol;
			rankPol++;
		}	
		if (pd==2){
			var gc = kolmVahe2.indexOf(vr);
			var hc = kolmVahe2.lastIndexOf(vr);
			if (kolmVahe2[gc]  > kolmVahe2[hc]){
			vordsedK [gc] = rankPol;
			vordsedK [hc] = rankPol+1;
			}
			else if (kolmVahe2[gc] < kolmVahe2[hc]){
			vordsedK [gc] = rankPol+1;
			vordsedK [hc] = rankPol;
			}
			else if (kolmVahe2[gc] == kolmVahe2[hc]){
				if (kolmVar2[gc]  > kolmVar2[hc]){
					vordsedK [gc] = rankPol;
					vordsedK [hc] = rankPol+1;
					}
					else if (kolmVar2[gc] < kolmVar2[hc]){
					vordsedK [gc] = rankPol+1;
					vordsedK [hc] = rankPol;
					}
					else if (kolmVar2[gc] == kolmVar2[gc]){
					vordsedK [gc] = rankPol;
					vordsedK [hc] = rankPol+1;					
					}
			}	
			rankPol=rankPol+2;	
		}
		if (pd==3){
			var vg, plKolmas;
			var pu =0;
			var maxl = Math.max.apply(Math, kolmVar2);
			var minl = Math.min.apply(Math, kolmVar2);
	
			for (vg = maxl; vg >= minl; vg--) { 
    	
			for (i = 0; i < 3; i++) {
			if (kolmVar2[i]==vg){
				plKolmas=i;
				pu++
				}			
			}
			if (pu==1){
			vordsedK [plKolmas] = rankPol;
			rankPol++;
			}	
			if (pu==2){
			var lc = kolmVar2.indexOf(vg);
			var mc = kolmVar2.lastIndexOf(vg);
					vordsedK [lc] = rankPol;
					vordsedK [mc] = rankPol+1;					
			rankPol=rankPol+2;	
			}	
			if (pu==3){
				vordsedK [0] = rankPol;
				vordsedK [1] = rankPol+1;
				vordsedK [2] = rankPol+2;			
			}
			pu=0;		
			}	
		}
		pd=0;
		}
		return vordsedK;
}
function neljadvordselt(kolmVar3, kolmVahe3, rankPol){
		var vr, plKolm;
		var pd =0;
		var vordsedK=[];
		var maxs = Math.max.apply(Math, kolmVahe3);
		var mins = Math.min.apply(Math, kolmVahe3);
		
		
		for (vr = maxs; vr >= mins; vr--) { 
    	
		for (j = 0; j < 4; j++) {
			if (kolmVahe3[j]==vr){
				plKolm=j;
				pd++
				}			
			}
		if (pd==1){
			vordsedK [plKolm] = rankPol;
			rankPol++;
		}	
		if (pd==2){
			var gc = kolmVahe3.indexOf(vr);
			var hc = kolmVahe3.lastIndexOf(vr);
			if (kolmVahe3[gc]  > kolmVahe3[hc]){
			vordsedK [gc] = rankPol;
			vordsedK [hc] = rankPol+1;
			}
			else if (kolmVahe3[gc] < kolmVahe3[hc]){
			vordsedK [gc] = rankPol+1;
			vordsedK [hc] = rankPol;
			}
			else if (kolmVahe3[gc] == kolmVahe3[hc]){
				if (kolmVar3[gc]  > kolmVar3[hc]){
					vordsedK [gc] = rankPol;
					vordsedK [hc] = rankPol+1;
					}
					else if (kolmVar3[gc] < kolmVar3[hc]){
					vordsedK [gc] = rankPol+1;
					vordsedK [hc] = rankPol;
					}
					else if (kolmVar3[gc] == kolmVar3[gc]){
					vordsedK [gc] = rankPol;
					vordsedK [hc] = rankPol+1;					
					}
			}	
			rankPol=rankPol+2;	
		}
		if (pd==3){
			var indexesX=getAllIndexes(kolmVahe3, vr);
			var ax = indexesX[0];
			var bx = indexesX[1];
			var cx = indexesX[2];	
			var kolmVar4 = [kolmVar3[ax],kolmVar3[bx],kolmVar3[cx]];	
			var kolmVahe4 = [kolmVahe3[ax],kolmVahe3[bx],kolmVahe3[cx]];		
			var loppseis = kolmedvordselt(kolmVar4, kolmVahe4, rankPol);
			vordsedK [ax] = loppseis[0];
			vordsedK [bx] = loppseis[1];
			vordsedK [cx] = loppseis[2];
			rankPol=rankPol+3;
		}
		if (pd==4){
			var vg, plKolmas;
			var pu =0;
			var maxl = Math.max.apply(Math, kolmVar3);
			var minl = Math.min.apply(Math, kolmVar3);
	
			for (vg = maxl; vg >= minl; vg--) { 
    	
			for (i = 0; i < 4; i++) {
			if (kolmVar3[i]==vg){
				plKolmas=i;
				pu++
				}			
			}
			if (pu==1){
			vordsedK [plKolmas] = rankPol;
			rankPol++;
			}	
			if (pu==2){
			var lc = kolmVar3.indexOf(vg);
			var mc = kolmVar3.lastIndexOf(vg);
					vordsedK [lc] = rankPol;
					vordsedK [mc] = rankPol+1;					
			rankPol=rankPol+2;	
			}	
			if (pu==3){
				var indexesU=getAllIndexes(kolmVar3, vg);
				var aa = indexesU[0];
				var bb = indexesU[1];
				var cc = indexesU[2];
				vordsedK [aa] = rankPol;
				vordsedK [bb] = rankPol+1;
				vordsedK [cc] = rankPol+2;					
				rankPol=rankPol+3;	
			}
			if (pu==4){
				vordsedK [0] = rankPol;
				vordsedK [1] = rankPol+1;
				vordsedK [2] = rankPol+2;	
				vordsedK [3] = rankPol+3;		
			}
			pu=0;		
			}	
		}
		pd=0;
		}
		return vordsedK;
		
}

function viiedvordselt(kolmVar4, kolmVahe4, rankPol) {
		var vr, plKolm;
		var pd =0;
		var vordsedK=[];
		var maxs = Math.max.apply(Math, kolmVahe4);
		var mins = Math.min.apply(Math, kolmVahe4);
		
		for (vr = maxs; vr >= mins; vr--) { 
    	
		for (j = 0; j < 5; j++) {
			if (kolmVahe4[j]==vr){
				plKolm=j;
				pd++
				}			
			}
		if (pd==1){
			vordsedK [plKolm] = rankPol;
			rankPol++;
		}	
		if (pd==2){
			var gc = kolmVahe4.indexOf(vr);
			var hc = kolmVahe4.lastIndexOf(vr);
			if (kolmVahe4[gc]  > kolmVahe4[hc]){
			vordsedK [gc] = rankPol;
			vordsedK [hc] = rankPol+1;
			}
			else if (kolmVahe4[gc] < kolmVahe4[hc]){
			vordsedK [gc] = rankPol+1;
			vordsedK [hc] = rankPol;
			}
			else if (kolmVahe4[gc] == kolmVahe4[hc]){
				if (kolmVar4[gc]  > kolmVar4[hc]){
					vordsedK [gc] = rankPol;
					vordsedK [hc] = rankPol+1;
					}
					else if (kolmVar4[gc] < kolmVar4[hc]){
					vordsedK [gc] = rankPol+1;
					vordsedK [hc] = rankPol;
					}
					else if (kolmVar4[gc] == kolmVar4[gc]){
					vordsedK [gc] = rankPol;
					vordsedK [hc] = rankPol+1;					
					}
			}	
			rankPol=rankPol+2;	
		}
		if (pd==3){
			var indexesX=getAllIndexes(kolmVahe4, vr);
			var ax = indexesX[0];
			var bx = indexesX[1];
			var cx = indexesX[2];	
			var kolmVar5 = [kolmVar4[ax],kolmVar4[bx],kolmVar4[cx]];	
			var kolmVahe5 = [kolmVahe4[ax],kolmVahe4[bx],kolmVahe4[cx]];		
			var loppseis = kolmedvordselt(kolmVar5, kolmVahe5, rankPol);
			vordsedK [ax] = loppseis[0];
			vordsedK [bx] = loppseis[1];
			vordsedK [cx] = loppseis[2];
			rankPol=rankPol+3;
		}
		if (pd==4){
			var indexesZ=getAllIndexes(kolmVahe4, vr);
			var az = indexesZ[0];
			var bz = indexesZ[1];
			var cz = indexesZ[2];
			var dz = indexesZ[3];	
			var kolmVar5 = [kolmVar4[az],kolmVar4[bz],kolmVar4[cz],kolmVar4[dz]];	
			var kolmVahe5 = [kolmVahe4[az],kolmVahe4[bz],kolmVahe4[cz],kolmVahe4[dz]];
			var vahekokkuvote5 = neljadvordselt(kolmVar5, kolmVahe5, rankPol);
			vordsedK [az]= vahekokkuvote5[0];
			vordsedK [bz]= vahekokkuvote5[1];
			vordsedK [cz]= vahekokkuvote5[2];
			vordsedK [dz]= vahekokkuvote5[3];
			rankPol=rankPol+3;
		}
		if (pd==5){
			var vg, plKolmas;
			var pu =0;
			var maxl = Math.max.apply(Math, kolmVar4);
			var minl = Math.min.apply(Math, kolmVar4);
	
			for (vg = maxl; vg >= minl; vg--) { 
    	
			for (i = 0; i < 5; i++) {
			if (kolmVar4[i]==vg){
				plKolmas=i;
				pu++
				}			
			}
			if (pu==1){
			vordsedK [plKolmas] = rankPol;
			rankPol++;
			}	
			if (pu==2){
			var lc = kolmVar4.indexOf(vg);
			var mc = kolmVar4.lastIndexOf(vg);
					vordsedK [lc] = rankPol;
					vordsedK [mc] = rankPol+1;					
			rankPol=rankPol+2;	
			}	
			if (pu==3){
				var indexesU=getAllIndexes(kolmVar4, vg);
				var aa = indexesU[0];
				var bb = indexesU[1];
				var cc = indexesU[2];
				vordsedK [aa] = rankPol;
				vordsedK [bb] = rankPol+1;
				vordsedK [cc] = rankPol+2;					
				rankPol=rankPol+3;	
			}
			if (pu==4){
				var indexesU=getAllIndexes(kolmVar4, vg);
				var aa = indexesU[0];
				var bb = indexesU[1];
				var cc = indexesU[2];
				var dd = indexesU[3];
				vordsedK [aa] = rankPol;
				vordsedK [bb] = rankPol+1;
				vordsedK [cc] = rankPol+2;	
				vordsedK [dd] = rankPol+3;				
				rankPol=rankPol+3;	
			}
			if (pu==5){
				vordsedK [0] = rankPol;
				vordsedK [1] = rankPol+1;
				vordsedK [2] = rankPol+2;	
				vordsedK [3] = rankPol+3;
				vordsedK [4] = rankPol+4;		
			}
			pu=0;		
			}	
		}
		pd=0;
		}
		return vordsedK;
}
function kolmandadPaika(kpositsioonid){
	var jarjestus=[];
	for (i = 0; i < 6; i++) {
		if (kpositsioonid[i]==1 || kpositsioonid[i]==2 || kpositsioonid[i]==3 || kpositsioonid[i]==4 ){
			kpositsioonid[i]=2;
			}
		else {
			kpositsioonid[i]=3;
			}
	}
	if (kpositsioonid[0]==2 && kpositsioonid[1]==2 && kpositsioonid[2]==2 && kpositsioonid[3]==2 ){
		jarjestus=[3,4,1,2];
		}
	if (kpositsioonid[0]==2 && kpositsioonid[1]==2 && kpositsioonid[2]==2 && kpositsioonid[4]==2 ){
		jarjestus=[3,1,2,5];
		}
	if (kpositsioonid[0]==2 && kpositsioonid[1]==2 && kpositsioonid[2]==2 && kpositsioonid[5]==2 ){
		jarjestus=[3,1,2,6];
		}
	if (kpositsioonid[0]==2 && kpositsioonid[1]==2 && kpositsioonid[3]==2 && kpositsioonid[4]==2 ){
		jarjestus=[4,1,2,5];
		}
	if (kpositsioonid[0]==2 && kpositsioonid[1]==2 && kpositsioonid[3]==2 && kpositsioonid[5]==2 ){
		jarjestus=[4,1,2,6];
		}
	if (kpositsioonid[0]==2 && kpositsioonid[1]==2 && kpositsioonid[4]==2 && kpositsioonid[5]==2 ){
		jarjestus=[5,1,2,6];
		}
	if (kpositsioonid[0]==2 && kpositsioonid[2]==2 && kpositsioonid[3]==2 && kpositsioonid[4]==2 ){
		jarjestus=[3,4,1,5];
		}
	if (kpositsioonid[0]==2 && kpositsioonid[2]==2 && kpositsioonid[3]==2 && kpositsioonid[5]==2 ){
		jarjestus=[3,4,1,6];
		}
	if (kpositsioonid[0]==2 && kpositsioonid[2]==2 && kpositsioonid[4]==2 && kpositsioonid[5]==2 ){
		jarjestus=[3,1,6,5];
		}
	if (kpositsioonid[0]==2 && kpositsioonid[3]==2 && kpositsioonid[4]==2 && kpositsioonid[5]==2 ){
		jarjestus=[4,1,6,5];
		}
	if (kpositsioonid[1]==2 && kpositsioonid[2]==2 && kpositsioonid[3]==2 && kpositsioonid[4]==2 ){
		jarjestus=[3,4,2,5];
		}
	if (kpositsioonid[1]==2 && kpositsioonid[2]==2 && kpositsioonid[3]==2 && kpositsioonid[5]==2 ){
		jarjestus=[3,4,2,6];
		}
	if (kpositsioonid[1]==2 && kpositsioonid[2]==2 && kpositsioonid[4]==2 && kpositsioonid[5]==2 ){
		jarjestus=[5,3,2,6];
		}
	if (kpositsioonid[1]==2 && kpositsioonid[3]==2 && kpositsioonid[4]==2 && kpositsioonid[5]==2 ){
		jarjestus=[5,4,2,6];
		}
	if (kpositsioonid[2]==2 && kpositsioonid[3]==2 && kpositsioonid[4]==2 && kpositsioonid[5]==2 ){
		jarjestus=[3,4,6,5];
		}
	return jarjestus;
}
function veerandFinaal(el){
	var elIdy=el.id;
	var elId = parseInt(elIdy);
	var even = isEven(elId);
	if (even){
		var aa = document.getElementById(elId).value;	
		var bb = document.getElementById(elId-1).value;
		var c = document.getElementById(elId-100).innerHTML;
		var d = document.getElementById(elId-101).innerHTML;
		}
	else {
		
		var aa = document.getElementById(elId).value;	
		var bb = document.getElementById(elId+1).value;
		var c = document.getElementById(elId-100).innerHTML;
		var d = document.getElementById(elId-99).innerHTML;
		}
		
		var a = parseInt(aa);
		var b = parseInt(bb);
		
		
		var kinnitus = true;
		if (isNaN(a) || a < 0 || a > 9){
			kinnitus = false;
			}
		if (isNaN(b) || b < 0 || b > 9){
			kinnitus = false;
			}
		
			
		if (a==b){
			alert ("viik ei sobi siia");		
			}
		 else if (kinnitus){
			taidaEdasi(a,b,c,d,elId);
			}			
	}
function isEven(value) {
	if (value%2 == 0)
		return true;
	else
		return false;
}
function taidaEdasi(a,b,c,d, elId){
	
	var taide = elId-84-Math.ceil((elId-701)/2);

	if (a > b){
		document.getElementById(taide).innerHTML=c;
		}
	else if (a < b){
		document.getElementById(taide).innerHTML=d;
		}
}
function voitja(el){
	var elIdy=el.id;
	var elId = parseInt(elIdy);
	var even = isEven(elId);
	if (even){
		var aa = document.getElementById(elId).value;	
		var bb = document.getElementById(elId-1).value;
		var c = document.getElementById(elId-100).innerHTML;
		var d = document.getElementById(elId-101).innerHTML;
		}
	else {
		
		var aa = document.getElementById(elId).value;	
		var bb = document.getElementById(elId+1).value;
		var c = document.getElementById(elId-100).innerHTML;
		var d = document.getElementById(elId-99).innerHTML;
		}
		
		var a = parseInt(aa);
		var b = parseInt(bb);
		
		var kinnitus = true;
		if (isNaN(a) || a < 0 || a > 9){
			kinnitus = false;
			}
		if (isNaN(b) || b < 0 || b > 9){
			kinnitus = false;
			}
			
		if (a==b){
			alert ("viik ei sobi siia");		
			}
		 else if (kinnitus){
			 
			selgitaVoitja(a,b,c,d,elId);
			}			
	}
function selgitaVoitja(a,b,c,d, elId){
	
	var teamid = ["Prantsusmaa", "Rumeenia", "Albaania", "Sveits", "Inglismaa", "Venemaa", "Wales", "Slovakkia", "Saksamaa", "Ukraina", "Poola", "Põhja-Iirimaa", "Hispaania", "Tsehhi", "Türgi", "Horvaatia", "Belgia", "Itaalia", "Iirimaa", "Rootsi", "Portugal", "Island", "Austria", "Ungari"];
	var g = teamid.indexOf(c);
	var h = teamid.indexOf(d);
	if (g == -1 || h == -1){
			alert ("vaata finaali paari!");
			}

	if (a > b){
		document.getElementById("winner").innerHTML="Turniirivõitja on: "+c;
		document.getElementById("1157").value = c;
		}
	else if (a < b){
		document.getElementById("winner").innerHTML="Turniirivõitja on: "+d;
		document.getElementById("1157").value = d;
		}
	taidakastid();	
}
function taidakastid (){
	var ts = 841;
	var ls = 617;
	for (i = 0; i < 8; i++) {
		document.getElementById(ts).value=document.getElementById(ls).innerHTML;
		ts++;
		ls++;	
	}
	var tst = 849;
	var lsl = 625;
	for (i = 0; i < 4; i++) {
		document.getElementById(tst).value=document.getElementById(lsl).innerHTML;
		tst++;
		lsl++;	
	}
	document.getElementById("853").value=document.getElementById("629").innerHTML;
	document.getElementById("854").value=document.getElementById("630").innerHTML;
	document.getElementById("winner").style.display = "block";
	document.getElementById("lisakyssad").style.display = "block";
	document.getElementById("button1").style.display = "block";
}