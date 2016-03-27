$(document).ready(function(){

			$(".click span").click(function(){
				$("li ul").hide();
				$(this).next().show();
			});
			
			$(".hover span").on({
				 mouseenter: function() {
						$("li ul").hide();
						$(this).next().show();
				}, 
				mouseleave: function() {
						$(this).next().hide();
				}
			});
			
			
});