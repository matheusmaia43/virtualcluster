<?php
//url do destino da requsiçao, equivalente ao "action" de um formulário
$url = 'localhost/clustermpi/Controle.php';
//estes seriam os "inputs" do formulário
$campos = array(
	    'acao'=>urlencode("logar"),
        'username'=>urlencode("admin"),
	'password'=>urlencode("admin"),
	'login'=>urlencode("Login"),
	
	
);
//temos que colocar os parâmetros do post no estilo de uma query string
foreach($campos as $name => $valor) {
    $string_campos .= $name . '=' . $valor . '&';
}
$string_campos = rtrim($string_campos,'&');
$ch = curl_init();
//configurando as opções da conexão curl
curl_setopt($ch,CURLOPT_URL,$url);
//este parâmetro diz que queremos resgatar o retorno da requisição
curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch,CURLOPT_POST,count($campos));
curl_setopt($ch,CURLOPT_POSTFIELDS,$string_campos);
//manda a requisição post
$resultado = curl_exec($ch);
curl_close($ch);
echo $resultado;