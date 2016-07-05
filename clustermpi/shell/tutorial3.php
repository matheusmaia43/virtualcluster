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

<h3>Parâmetros. Como usar?</h3>
</br>
<p>Esta página introduz o usuário à utilização e passagem de parâmetros,
	muito necessários para a utilização do GNU/Linux. Além de marcar uma
	opção, é necessário informar o parâmetro que será mesclado com a opção,
	este pode ser qualquer coisa, como por exemplo um diretório: /home ou
	um programa: firefox. Opção + parâmetro = resultado.</p>
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
está sendo verificado quanto de espaço o diretório
<b>/home</b> está ocupando em disco. Através do comando
<b style="color: red">du -sh</b>, mesclado com o parâmetro
<b>/home</b>. Obviamente, é necessário marcar a opção "Mostrar espaço
ocupado em disco".
</p>
<img src="img/parametros.png">
</br>
</br>Segue abaixo, screenshot que mostra outro exemplo de uso. Neste
caso está sendo verificado se o parâmetro, o programa
<b>firefox</b> está instalado. Através do comando
<b style="color: red">dpkg --get-selections</b>. Obviamente, é
necessário marcar a opção "Verificar se o programa/pacote está
instalado".
</p>
</br>
<p>
	Note que neste exemplo, está sendo utilizado " | grep". Onde o
	caractere "|" é o <a
		href="http://www.vivaolinux.com.br/dica/Usando-o-pipe" target="blank">Pipe</a>,
	ou seja, diz ao bash que será executada uma <a
		href="http://pt.wikipedia.org/wiki/Thread_(ci%C3%AAncia_da_computa%C3%A7%C3%A3o)"
		target="blank">Thread</a>. E o <b style="color: red">grep</b>, é o
	segundo comando deste exemplo.</br> Trata-se da página mais complexa,
	porém mais didática de todas. <img src="img/parametros2.png">

</p>
</br>
</br>

<div class="row">
	<?php
	$display->display_footer();
	?>
</div>
</html>
