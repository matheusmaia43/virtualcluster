<?php
require ("display.php");
class Funcoes extends Display{
	function seguranca($cmd=null, $negadas = array('')){
		$cmd = strtolower ($cmd);
		for($i = 0; $i < count($negadas); $i++){
			$p = strpos($cmd,$negadas[$i]);
			if($p !== false)
				return false;
		}
		return true;
	}
}
?>


