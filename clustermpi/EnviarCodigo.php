<!DOCTYPE html>
<?php
include_once 'Controle.php';
require ("shell/classes/funcoes.php");
//$funcoes = new Funcoes();
session_start("user");
$user = $_SESSION['user'];
if ($user == "") {
  header('location:index.php');
}
$display = new Display();
$display->display_header();
?>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Executar Código - UFC</title>
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="images/docker.ico" type="image/x-icon"/>   

    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
      <!-- Header -->
      <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-toggle"></span>
            </button>
            <a class="navbar-brand" href="#">Executar</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">Executar

              <li class="dropdown">
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
                  <i class="glyphicon glyphicon-user"></i> <?php echo $user;?> <span class="caret"></span></a>
                  <ul id="g-account-menu" class="dropdown-menu" role="menu">
                    
                    <li><a href="Controle.php?acao2=logout"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div><!-- /container -->
        </div>
        <!-- /Header -->

        <!-- Main -->
        <div class="container">

          <!-- upper section -->
          <div class="row">
           <div class="col-sm-3">
            <!-- left -->
            <h3><i class="glyphicon glyphicon-play"></i> Executar</h3>
            <hr>

            <ul class="nav nav-stacked">
              <li><a href="dashboard.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
              <li><a href="criarCluster.php"><i class="glyphicon glyphicon-blackboard"></i> Criar Cluster</a></li>
              <li><a href="editor.php"><i class="glyphicon glyphicon-file"></i> Editor de Código</a></li>
              <li><a href="EnviarCodigo.php"><i class="glyphicon glyphicon-play"></i> Executar Código</a></li>
              

            </ul>

            <hr>

          </div><!-- /span-3 -->
          <div class="col-sm-9" width="50%">

            <!-- column 2 --> 
            <h3><i class="glyphicon glyphicon-play"></i> Executar</h3>  

            <hr>
            <div>
              <form  method="post" action="#" enctype="multipart/form-data">                
                <label class="control-label">Enviar código para execução</label>
                <input id="input-folder-1" type="file" name="arquivo"><br>
                <input class="btn btn-primary" type="submit"  value="Executar" data-loading-text="Loading..."/>
                <a class="btn btn-primary" href="editor.php">Editor de Código</a>
              </div>
            </form>
           <hr>


           <?php  
           function upload(){
            /* Insira aqui a pasta que deseja salvar o arquivo*/
            $uploaddir = '/var/www/html/clustermpi/uploads/';

            $uploadfile = $uploaddir . $_FILES['arquivo']['name'];

            $_UP['extensoes'] = array('c');

            $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
            if (array_search($extensao, $_UP['extensoes']) === false) {
              //echo "extc";
              exit;
            }

            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)){                   
            }else{
             // echo "Arquivo não enviado";
            }         
            Controle::executa($uploadfile);
          }            
         // upload();
          if (isset($_GET[''])) {
            # code...
          }
          ?>
          <!--offset1 da um span a esquerda, alinhagem... -->

          <?php
      
        //Atribuição para concatenar o comando com parametro
        //? esta conferindo se é verdadeiro e : se for falso
        //? Se foi setado, concatena com cmd(parametro+cmd) : caso contrário mostra apenas cmd(cmd)
          //$_GET['cmd'] = (isset($_GET['parametro']))?$_GET['parametro'] . $_GET['cmd']:$_GET['cmd'] ;

        //Mostra cmd
        
          echo "<pre class=\"linux\">";
          //echo  gethostbyaddr($_SERVER['REMOTE_ADDR'])."$ ";          
          echo "mpiuser@master"."$ <br />";
          $cmd=upload();
          
          echo $cmd;          
          
          echo "</pre>";             
          ?>




        </div>



        <div class="row">        


          <!--center-right-->
          <div class="col-md-5">


          </div><!--/col-span-6-->


        </div><!--/col-span-9-->

      </div><!--/row-->
      <!-- /upper section -->

      <!-- lower section -->
      <div class="row">

        <!-- script references -->

        <script src="js/bootstrap.min.js"></script>
        <script src="fonts/"></script>

      </body>
      </html>