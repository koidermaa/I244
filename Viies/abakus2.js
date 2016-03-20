window.onload = function() {
	
	
	var p = document.getElementsByClassName("left");
	
	
	document.getElementById("vastused").innerHTML = "laetud";
	
	for (var i = 0; i < p.length; i++) { 
				
		p[i].onclick = function() {
		this.style.background="blue";
		this.style.cssFloat = "right";				
		}
	} 
	
	var s = document.getElementsByClassName("right");
	
	
	document.getElementById("vastused").innerHTML = "laetud";
	
	for (var i = 0; i < s.length; i++) { 
				
		s[i].onclick = function() {
		this.style.background="blue";
		this.style.cssFloat = "left";				
		}
	}
	
	
	
	

}