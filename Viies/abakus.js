window.onload = function() {
	
	
	var p = document.getElementsByClassName("bead");
	
	
	document.getElementById("vastused").innerHTML = "laetud";
	
	for (var i = 0; i < p.length; i++) { 
				
		p[i].onclick = function() {
	
		this.style.background="blue";
		var a = this.style.cssFloat;
		document.getElementById("vastused").innerHTML = a;
				
			/*if (this.style.cssFloat == "left") {
    		this.style.cssFloat = "right";
			}
			else if (this.style.cssFloat="right") {
    		this.style.cssFloat="left";
			}*/
				
		}
    
	} 
	

}