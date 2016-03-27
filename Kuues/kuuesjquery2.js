$(document).ready(function(){

		
			$("#menu li").on({
				 mouseenter: function() {
						$(this).find("li").show().animate({height: "20px"}, 1000);
				}, 
				mouseleave: function() {
						$(this).find("li").animate({height: "0px"}, 1000, function(){
							$("#menu ul>li").hide(1000);
							});
						
				}
			});
			
			
});