<?php
error_reporting(1);

$arquivo = $_GET["arquivo"]; 


$testa = substr($arquivo,-3); 
$bloqueados = array('php','tml','htm'); 
// caso a extensão seja diferente das citadas acima ele 
// executa normalmente o script 

if(!in_array($testa,$bloqueados)){ 
 
 $arquivo = $_GET["arquivo"];

   if(isset($arquivo) && file_exists($arquivo)){ // faz o teste se a variavel não esta vazia e se o arquivo realmente existe
      switch(strtolower(substr(strrchr(basename($arquivo),"."),1))){ // verifica a extensão do arquivo para pegar o tipo
         case "pdf": $tipo="application/pdf"; break;
         case "exe": $tipo="application/octet-stream"; break;
         case "zip": $tipo="application/zip"; break;
         case "doc": $tipo="application/msword"; break;
         case "xls": $tipo="application/vnd.ms-excel"; break;
         case "ppt": $tipo="application/vnd.ms-powerpoint"; break;
         case "gif": $tipo="image/gif"; break;
         case "png": $tipo="image/png"; break;
         case "jpg": $tipo="image/jpg"; break;
         case "mp3": $tipo="audio/mpeg"; break;
         case "c": $tipo="text/x-c"; break;
         case "php": // deixar vazio por seurança
         case "htm": // deixar vazio por seurança
         case "html": // deixar vazio por seurança
      }
      header("Content-Type: ".$tipo); // informa o tipo do arquivo ao navegador
      header("Content-Length: ".filesize($arquivo)); // informa o tamanho do arquivo ao navegador
      header("Content-Disposition: attachment; filename=".basename($arquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
      readfile($arquivo); // lê o arquivo
      exit; // aborta pós-ações
   }

}else{echo "Erro!";exit;} 


class Controle{
	function configura_a(){
		session_start("user");
		$user = $_SESSION['user'];	
		$conn = ssh2_connect('localhost', 22);
		ssh2_auth_password($conn, 'oneadmin', 'zefirelli15');
		$stream = ssh2_exec($conn, "cd /var/lib/one && ./cria_a.sh -c $user");			
		stream_set_blocking($stream, true);
	}	
	function criaCluster($qtd_nos, $qtd_cpu, $qtd_men){
		session_start("user");
		$user = $_SESSION['user'];	
		Controle::configura_a();	
		$conn = ssh2_connect('localhost', 22);
		ssh2_auth_password($conn, 'oneadmin', 'zefirelli15');
		$stream = ssh2_exec($conn, "cd /var/lib/one/$user/install && ./geral.sh -i $qtd_nos $qtd_cpu $qtd_men $user");			
		stream_set_blocking($stream, true);

		while($line = fgets($stream)) {
			flush();				
			echo $line."<br />";

		}			 						

	}	
	function executa($file){
		session_start("user");
		$user = $_SESSION['user'];	
		$conn = ssh2_connect('localhost', 22);
		ssh2_auth_password($conn, 'oneadmin', 'zefirelli15');
		$stream = ssh2_exec($conn, "cd /var/lib/one/$user/install && ./run.sh -f $file $user");			
		stream_set_blocking($stream, true);

		while($line = fgets($stream)) {
			flush();				
			$saida=$line;
			echo $saida;			
		}

	}
	function vmsA(){
		session_start("user");
		$user = $_SESSION['user'];			
		$conn = ssh2_connect('localhost', 22);
		ssh2_auth_password($conn, 'oneadmin', 'zefirelli15');
		$stream = ssh2_exec($conn, "cd /var/lib/one/$user/install && ./verificaS.sh");			
		stream_set_blocking($stream, true);

		while($line = fgets($stream)) {
			flush();				
			$saida=$line;
			$rest = substr($saida, 0, 1);
			echo $rest;			
		}		
	}
	function vmsP(){
		session_start("user");
		$user = $_SESSION['user'];	
		$conn = ssh2_connect('localhost', 22);
		ssh2_auth_password($conn, 'oneadmin', 'zefirelli15');
		$stream = ssh2_exec($conn, "cd /var/lib/one/$user/install && ./verificaS.sh");			
		stream_set_blocking($stream, true);

		while($line = fgets($stream)) {
			flush();				
			$saida=$line;
			$rest = substr($saida, 1, 2);
			echo $rest;			
		}		
	}
	function vmsF(){
		session_start("user");
		$user = $_SESSION['user'];	
		$conn = ssh2_connect('localhost', 22);
		ssh2_auth_password($conn, 'oneadmin', 'zefirelli15');
		$stream = ssh2_exec($conn, "cd /var/lib/one/$user/install && ./verificaS.sh");			
		stream_set_blocking($stream, true);

		while($line = fgets($stream)) {
			flush();				
			$saida=$line;
			$rest = substr($saida, 3, 4);
			echo $rest;			
		}		
	}
	function login(){
		session_start("user");

		if (isset($_POST['username']) && $_POST['username'] != '') {
			$user = $_POST['username'];
			$pass = $_POST['password'];
			if ($user == "admin" && $pass == "admin" || $user == "user1" && $pass == "user1" || $user == "user2" && $pass == "user2" || $user == "user3" && $pass == "user3" || $user == "user4" && $pass == "user4" || $user == "user5" && $pass == "user5" || $user == "user6" && $pass == "user6" || $user == "user7" && $pass == "user7" || $user == "user8" && $pass == "user8" || $user == "user9" && $pass == "user9" || $user == "user10" && $pass == "user10" || $user == "user11" && $pass == "user11") {
				$s="ok";
				$_SESSION['user'] = $user;				
				return $s;

			}else{
				$f="false";
				return $f;
			}
		}		
	}
	function logout(){				
		session_start("user");
		$_SESSION['user'] = "";
		session_destroy("user");
	}
	function salva(){
		if(isset($_POST['code']) && $_POST['code'] != ''){
			$code = $_POST['code'];
			session_start("arquivo");
			$name = $_SESSION['arquivo'];

			if(!($fp = fopen("uploads/$name", "w"))){print "Não foi possivel criar arquivo, talvez ele já exista.";die();}			
			$escreve = fwrite($fp, "$code");
			fclose($abre);  			
		}
	}
	function processa_file($arquivo){

		$ponteiro = fopen ("$arquivo", "r");

		while (!feof ($ponteiro)) {
			$linha = fgets($ponteiro, 4096);
			echo $linha."<br>";		
		}

		fclose ($ponteiro);
	} 

	function upload(){
		/* Insira aqui a pasta que deseja salvar o arquivo*/
		$uploaddir = '/var/www/html/clustermpi/uploads/';

		$uploadfile = $uploaddir . $_FILES['arquivo']['name'];

		$_UP['extensoes'] = array('c');

		$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
		if (array_search($extensao, $_UP['extensoes']) === false) {
			echo "<script>alert('Arquivo enviado!');</script>";              
		}

		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)){                   
		}else{
			echo "<script>alert('Arquivo não enviado!');</script>";
		}                      
          //codigo controle     
		Controle::processa_file($uploadfile);                             	

	}   
	function download($arquivo){		


		$testa = substr($arquivo,-3); 
		$bloqueados = array('php','tml','htm'); 
// caso a extensão seja diferente das citadas acima ele 
// executa normalmente o script 

		if(!in_array($testa,$bloqueados)){ 

// aqui vai o código completo 

		}else{echo "Erro!";exit;} 
	}

	function verificaCluster(){
		session_start("user");
		$user = $_SESSION['user'];	
		$conn = ssh2_connect('localhost', 22);
		ssh2_auth_password($conn, 'oneadmin', 'zefirelli15');
		$stream = ssh2_exec($conn, "cd /var/lib/one/$user/install && ./clusterAtivo.sh $user");			
		stream_set_blocking($stream, true);

		while($line = fgets($stream)) {
			flush();				
			echo $line;
		}	

	}		
	function exluirCluster(){
		session_start("user");
		$user = $_SESSION['user'];	
		$conn = ssh2_connect('localhost', 22);
		ssh2_auth_password($conn, 'oneadmin', 'zefirelli15');
		$stream = ssh2_exec($conn, "cd /var/lib/one/$user/install && ./excluir.sh $user");			
		
			
	}
}

if(isset($_GET['acao2'])){
	$acao = $_GET['acao2'];

	if($acao == "logout"){
		Controle::logout();
		header('location:index.php');
	}
	if ($acao == "down") {
		$arquivo = $_GET['arquivo'];
		Controle::download($arquivo);	
	}
	

}
if(isset($_POST['acao'])){
	$acao = $_POST['acao'];

	if($acao == 'logar'){
		$res = Controle::login();					
		if ($res == 'ok') {
			header('location:dashboard.php');
		}else if($res == "false"){
			header('location:index.php');

		}
		
	}		
	if ($acao == "salva") {
		Controle::salva();
		header('location:editor.php');
	}
	if($acao == "excluir"){
		Controle::exluirCluster();
		header('location:dashboard.php');
	}

}
?>
