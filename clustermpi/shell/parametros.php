
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
		<form action="parametros.php" method="get">
			<!--offset1 da um span a esquerda, alinhagem... -->
			<div class="span5 offset1">
				<div class="span4">
					<h5>Marque uma opção:</h5>
					<label class="radio"> <input type="radio" name="parametro"
						value="ps aux | grep "> Verificar se programa/processo esta
						rodando.
					</label> <label class="radio"> <input type="radio" name="parametro"
						value="dpkg --get-selections | grep "> Verificar se
						programa/pacote está instalado.
					</label> <label class="radio"> <input type="radio" name="parametro"
						value="du -sh "> Mostrar espaço ocupado em disco.
					</label> <label class="radio"> <input type="radio" name="parametro"
						value="find / * -name "> Localiza arquivo/diretório.
					</label> <label class="radio"> <input type="radio" name="parametro"
						value="man "> Mostrar manual do comando.
					</label>
					<h5>Informe um Parâmetro:</h5>
					<div class="input-append">
						<input class="span3" id="appendedInputButton" type="text"
							name="cmd" value="">
						<button class="btn" type="submit">Executar</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="row">
		<div class="span10 offset1">
			<?php
			if (!$funcoes->seguranca($_GET['cmd']) )
				$funcoes->erro();
			else{
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
	<div class="row">
		<?php
		$display->display_footer();
		?>
	</div>
</body>
</html>

