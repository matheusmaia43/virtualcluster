
function Scroll()
{
   var shell = document.getElementById("Shell");
   if(shell)
   shell.scrollTop = 1000000;

}
window.onload = function(){ 
  Scroll();  }


$(document).ready(function(){
	setInterval(function(){
	troca()}, 5000);
	$('.morfar img') .mouseover(function(){
	troca();	
	});

});

/*Troca bonecos*/

function troca(){
	if($('.morfar img').attr('src') == "img/1.png"){
		$('.morfar img').attr('src', "img/2.png");
	}
	else{
		$('.morfar img').attr('src', "img/1.png");
	}
 }


