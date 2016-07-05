<!DOCTYPE html>
<?php
error_reporting (E_ALL);
require ("classes/funcoes.php");
$display = new Display();
?>
<html>
<?php
$display->display_header();
?>
<?php
$display->display_menu();
?>
<!--Inicia o corpo do Site-->
<address>
	<b>Desenvolvido por:</b></br> <strong>Jonathan Wolff Andrade</strong><br>
	<icon class="icon-thumbs-up"></icon>
	<a href="mailto:#">wolffwebmaster@gmail.com</a>
	<icon class="icon-thumbs-up"></icon>
	<a href="http://facebook.com/wolffandrade" target="blank">Facebook</a>
	<icon class="icon-thumbs-up"></icon>
	<a href="http://www.vivaolinux.com.br/~jwolff" target="blank">Viva o
		Linux</a>
	<icon class="icon-thumbs-up"></icon>
	<a href="http://wolffwebmaster.com.br/" target="blank">Trampo</a>
</address>
<h4>Diagnostic web</h4>
<p>Diagnóstico de sistemas operacionais Linux via web browser.</p>
<h4>Helper</h4>
<p>Ajuda o usuário a se comunicar com o shell, utilizando métodos
	alternativos.</p>
<h4>Shell</h4>
<p>
	Através de comandos bash diretamente em seu <a
		href="http://www.vivaolinux.com.br/artigo/Uma-introducao-ao-shell-(parte-1)/"
		target="blank">Shell</a> (ponte de comunicação para seu <a
		href="http://www.vivaolinux.com.br/artigo/Linux-kernel-e-distribuicoes"
		target="blank">Kernel</a>).
</p>
</br>
<p>Utiliza uma filosofia de desenvolvimento HUG, com objetivo KISS.
	Segue algumas características importantes:</p>
<p>
	<icon class="icon-check"></icon>
	Sem necessidade de criação de um novo usuário.
</p>
<p>
	<icon class="icon-check"></icon>
	Sem necessidade de acessos do super usuário(#root).
</p>
<p>
	<icon class="icon-check"></icon>
	Sem necessidade de edição das permissões no arquivo sudoers.
</p>
<p>
	<icon class="icon-check"></icon>
	Sem necessidade de banco de dados.
</p>
<p>
	<icon class="icon-check"></icon>
	Roda em <a href="http://pt.wikipedia.org/wiki/Localhost" target="blank">localhost</a>
	e redes locais.
</p>
<p>
	<icon class="icon-check"></icon>
	Bloqueado para: remoção, cópia, movimentação e criação de arquivos.
</p>
</br>
</br>
<div class="row-fluid">
	<ul class="thumbnails">
		<li class="span4">
			<div class="thumbnail">
				<img src="img/inicio.png" alt="">
				<div class="caption">
					<h3>Início. Como usar?</h3>
					<p>
						Existem milhares de comandos, vários interpretadores de comandos,
						e começar a utilizá-los pode ser uma tarefa difícil. </br> Esta
						ferramenta facilita o seu trabalho, introduzindo usuários ao mundo
						do GNU/Linux. De forma didática, pois o objetivo é ensinar e
						ajudar; não tornar os usuários dependentes da ferramenta. Os
						comandos executados são exibidos em formato de prompt.</br> </br>
						<a href="tutorial1.php" class="btn btn-inverse">Leia mais</a> <a
							href="index.php" class="btn">Voltar</a>
					</p>
				</div>
			</div>
		</li>
		<li class="span4">
			<div class="thumbnail">
				<img src="img/utilitario.png" alt="">
				<div class="caption">
					<h3>Utilitários. Como usar?</h3>
					<p>
						Os botões executam comandos prontos; deixando o mouse sobre eles,
						é exibida uma mensagem que explica melhor a funcionalidade.</br>
						Esta página proporciona resultados de forma amigável, além de
						mostrar o que é executado em background. Os comandos executados
						são exibidos em formato de prompt.
					</p>
					</br>
					<p>
						<a href="tutorial2.php" class="btn btn-inverse">Leia mais</a> <a
							href="index.php" class="btn">Voltar</a>
					</p>

				</div>
			</div>
		</li>
		<li class="span4">
			<div class="thumbnail">
				<img src="img/parametros.png" alt="">
				<div class="caption">
					<h3>Parâmetros. Como usar?</h3>

					<p>Esta página introduz o usuário à utilização e passagem de
						parâmetros, muito necessários para a utilização do GNU/Linux. Além
						de marcar uma opção, é necessário informar o parâmetro que será
						mesclado com a opção</p>
					<p>
						<a href="tutorial3.php" class="btn btn-inverse">Leia mais</a> <a
							href="index.php" class="btn">Voltar</a>
					</p>
				</div>
			</div>
		</li>
	</ul>
</div>
<img src="img/responsive.png" align="middle">
</br></br></br>

</body>
<div class="row">
	<?php
	$display->display_footer();
	?>
</div>
</html>
