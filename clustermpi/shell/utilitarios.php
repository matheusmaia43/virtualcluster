
<!DOCTYPE html>
<?php
error_reporting (E_ALL);
require ("classes/funcoes.php");
$funcoes = new Funcoes();
$display = new Display();
// Se já foi setado, cmd, e se a segurança é valida. Então executa condição
if (!$funcoes->seguranca($_GET['cmd']) )
	$funcoes->erro();
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
			<h5>Escolha:</h5>
			<div class="row-fluid">
				<div class="span2">
					<form action="utilitarios.php" method="get" name="cmd">
						<!--Botões de Comandos-->
						<input type="hidden" value="df -h" name="cmd">
						<button type="submit" class="btn btn-inverse link span12"
							title="Verificar % e ponto de Montagem dos Diretórios">Dir.
							Montados</button>
					</form>
				</div>
				<div class="span2">
					<form action="utilitarios.php" method="get">
						<input type="hidden" value="cat /proc/cpuinfo" name="cmd">
						<button type="submit" class="btn btn-inverse link span12"
							title="Verificar informações do Processador">Processador</button>
					</form>
				</div>
				<div class="span2">
					<form action="utilitarios.php" method="get">
						<input type="hidden" value="cat /etc/[A-Za-z]*[_-][rv]e[lr]*"
							name="cmd">
						<button type="submit" class="btn btn-inverse link span12"
							title="Verificar versão do S.O com detalhes">Versão S.O</button>
						<br>
					</form>
				</div>
				<div class="span2">
					<form action="utilitarios.php" method="get">
						<input type="hidden" value="free" name="cmd">
						<button type="submit" class="btn btn-inverse link span12"
							title="Verificar a % de uso da Memória RAM e Swap">RAM e Swap</button>
						<br>
					</form>
				</div>
				<div class="span2">
					<form action="utilitarios.php" method="get">
						<input type="hidden" value="lspci -vv" name="cmd">
						<button type="submit" class="btn btn-inverse link span12"
							title="Listar dispositivos PCI (Hardware)">Listar PCI(HDW)</button>
						<br>
					</form>
				</div>
				<div class="span2">
					<form action="utilitarios.php" method="get">
						<input type="hidden" value="uptime" name="cmd">
						<button type="submit" class="btn btn-inverse link span12"
							title="Mostra a quanto tempo computador esta iniciado e Load Average*">Tempo
							Up</button>
						<br>
					</form>
				</div>
				<!--Segunda-->
				<div class="row-fluid">
					<div class="span2">
						<form action="utilitarios.php" method="get">
							<!--Botões de Comandos-->
							<input type="hidden" value="who -u" name="cmd">
							<button type="submit" class="btn btn-inverse link span12"
								title="Verificar quais usuários estão logados no Linux.">
								Usuários On</button>
						</form>
					</div>
					<div class="span2">
						<form action="utilitarios.php" method="get">
							<input type="hidden" value="last" name="cmd">
							<button type="submit" class="btn btn-inverse link span12"
								title="Verificar Histórico dos Últimos Usuários que efetuaram Login">
								Usuários Off</button>
						</form>
					</div>
					<div class="span2">
						<form action="utilitarios.php" method="get">
							<input type="hidden" value="uname -a" name="cmd">
							<button type="submit" class="btn btn-inverse link span12"
								title="Mostra breve informações do Sistema Operacional e Kernel">
								S.O e Kernel</button>
							<br>
						</form>
					</div>
					<div class="span2">
						<form action="utilitarios.php" method="get">
							<input type="hidden" value="lsmod" name="cmd">
							<button type="submit" class="btn btn-inverse link span12"
								title="Verificar módulos carregados na Memória">Módulos On</button>
							<br>
						</form>
					</div>
					<div class="span2">
						<form action="utilitarios.php" method="get">
							<input type="hidden" value="cat /proc/cmdline" name="cmd">
							<button type="submit" class="btn btn-inverse link span12"
								title="Mostra informações dos parâmetros utilizados para inicializar o sistema(Boot)">Boot
								Info</button>
							<br>
						</form>
					</div>
					<div class="span2">
						<form action="utilitarios.php" method="get">
							<input type="hidden" value="pstree -hlp" name="cmd">
							<button type="submit" class="btn btn-inverse link span12"
								title="Mostra a Árvore/Hierarquia de Processos que estão rodando">Árvore
								Prs.</button>
							<br>
						</form>
					</div>
					<!--Terceira-->
					<div class="row-fluid">
						<div class="span2">
							<form action="utilitarios.php" method="get">
								<!--Botões de Comandos-->
								<input type="hidden" value="uname -m" name="cmd">
								<button type="submit" class="btn btn-inverse link span12"
									title="Verificar se o sistema é 32 Bits(i386, i486,i586 e i686) ou 64 Bits(x86_64).">
									Arquitetura S.O</button>
							</form>
						</div>
						<div class="span2">
							<form action="utilitarios.php" method="get">
								<input type="hidden" value="cat /proc/meminfo" name="cmd">
								<button type="submit" class="btn btn-inverse link span12"
									title="Verificar informações sobre a memória RAM.">Memória RAM</button>
							</form>
						</div>
						<div class="span2">
							<form action="utilitarios.php" method="get">
								<input type="hidden" value="cat /proc/iomem" name="cmd">
								<button type="submit" class="btn btn-inverse link span12"
									title="Verificar informações sobre a memória de I/O">Memória de
									I/O</button>
								<br>
							</form>
						</div>
						<div class="span2">
							<form action="utilitarios.php" method="get">
								<input type="hidden" value="cat /proc/stat" name="cmd">
								<button type="submit" class="btn btn-inverse link span12"
									title="Verificar estado atual do processador.">Status Proc.</button>
								<br>
							</form>
						</div>
						<div class="span2">
							<form action="utilitarios.php" method="get">
								<input type="hidden" value="cat /proc/filesystems" name="cmd">
								<button type="submit" class="btn btn-inverse link span12"
									title="Verificar sistemas de arquivos suportados pelo sistema.">Sis.
									de Arquivos</button>
								<br>
							</form>
						</div>
						<div class="span2">
							<form action="utilitarios.php" method="get">
								<input type="hidden" value="cat /proc/vmstat" name="cmd">
								<button type="submit" class="btn btn-inverse link span12"
									title="Mostra informações sobre o uso de Memória Virtual.">Mem.
									Virtual</button>
								<br>
							</form>
						</div>

					</div>

					<?php
		//Mostra cmd	
		if ($_GET['cmd'] != ""){
			echo "<pre class=\"linux\">";	
			echo  gethostbyaddr($_SERVER['REMOTE_ADDR'])."$ ";
			echo "<span id='cmd' class='text-error'>" . 	$_GET['cmd'] . "</span><br>";
			$cmd = shell_exec($_GET['cmd']);
			echo $cmd;
			echo "</pre>";	
			}	
		?>
				</div>
			</div>
		</div>

</body>
<?php
$display->display_footer();
?>
</html>

