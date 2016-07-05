<!DOCTYPE html>
<?php
error_reporting (E_ALL);
require ("classes/funcoes.php");
$funcoes = new Funcoes();
$display = new Display();
?>
<html>
<?php
$display->display_header();
?>
<body>
	<?php
	$display->display_menu();
	?>
	<div class="row">
		<!--offset1 da um span a esquerda, alinhagem... -->
		<div class="span10 offset1">
			<h5>Digite um comando abaixo:</h5>
			<form action="index.php" method="get">
				<div class="input-append">
					<input class="span4" id="appendedInputButton" type="text"
						name="cmd" value="">
					<button class="btn" type="submit">Executar</button>
				</div>
			</form>
			<?php
			if (!$funcoes->seguranca($_GET['cmd']) )
				$funcoes->erro();
			else{

				//Atribuição para concatenar o comando com parametro
				//? esta conferindo se é verdadeiro e : se for falso
				//? Se foi setado, concatena com cmd(parametro+cmd) : caso contrário mostra apenas cmd(cmd)
				$_GET['cmd'] = (isset($_GET['parametro']))?$_GET['parametro'] . $_GET['cmd']:$_GET['cmd'] ;
					
				//Mostra cmd
				if ($_GET['cmd'] != ""){
					echo "<pre class=\"linux\">";
					echo  gethostbyaddr($_SERVER['REMOTE_ADDR'])."$ ";
					echo "<span class='text-error'>" . 	$_GET['cmd'] . "</span><br>";
					$cmd = shell_exec($_GET['cmd']);
					echo $cmd;
					echo "</pre>";
				}
			}
			?>

		</div>
	</div>
</body>

<div class="row">
	<?php
	$display->display_footer();
	?>
</div>
</html>

