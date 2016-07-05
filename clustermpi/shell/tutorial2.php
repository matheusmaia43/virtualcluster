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

<h3>Utilitários. Como usar?</h3>
</br>
<p>Os botões executam comandos prontos; deixando o mouse sobre eles, é
	exibida uma mensagem que explica melhor a funcionalidade. Esta página
	proporciona resultados de forma amigável, além de mostrar o que é
	executado em background. Os comandos executados são exibidos em formato
	de prompt (terminal).</p>
</br> Legenda para o prompt.
</h5>

<b style="color: red"> Vermelho:</b> comando executado.
</br>
<b style="color: green"> Verde:</b> resultado em tela.
</br>
</br>
<p>O comando executado e o resultado em tela, são as mesmas informações
	apresentadas ao realizar este procedimento em um terminal GNU/Linux...
</p>
<p>
	<i> "Então, se eu digitar o mesmo <b style="color: red">comando</b> no
		meu terminal, terei o mesmo <b style="color: green">resultado</b>?"
	</i> Sim! Exatamente isto.
</p>
</br>
</br>Segue abaixo, screenshot que mostra um exemplo de uso. Neste caso
está sendo verificado a quanto tempo o computador está ligado e o Load
Average, através do comando
<b style="color: red">uptime</b>, no botão "Tempo Up".
<img src="img/utilitario.png">
</br>
</br>
</br>
</p>

<div class="row">
	<?php
	$display->display_footer();
	?>
</div>
</html>
