<?php

class Display {
	//Implementa função erro
	function erro(){
		//include ("error.php");
	}
	//Abre o cabeçalho do site
	function display_header(){
		include ("shell/inc/header.php");
	}	
	function display_footer(){
		include ("shell/inc/footer.php");
	}
}
?>

