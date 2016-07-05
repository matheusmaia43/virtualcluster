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

<h3>Início. Como usar?</h3>
</br>
<p>
	Existem milhares de comandos, vários interpretadores de comandos, e
	começar a utilizá-los pode ser uma tarefa difícil. </br> Esta
	ferramenta facilita o seu trabalho, introduzindo usuários ao mundo do
	GNU/Linux. De forma didática, pois o objetivo é ensinar e ajudar; não
	tornar os usuários dependentes da ferramenta. Os comandos executados
	são exibidos em formato de prompt (terminal).</br> Legenda para o
	prompt.


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
está sendo verificado quais o diretórios montados, através do comando
<b style="color: red">df -h</b>.
<img src="img/inicio.png">
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
