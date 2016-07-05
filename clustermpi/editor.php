<!DOCTYPE html>
<?php
include_once 'Controle.php';
session_start("user");
$user = $_SESSION['user'];
if ($user == "") {
  header('location:index.php');
}


?>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">  
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="icon" href="images/docker.ico" type="image/x-icon"/>   
  
  <!--<script src="j.js"></script>-->
  <script src="http://d1n0x3qji82z53.cloudfront.net/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>



  <title>Editor</title>
  <style type="text/css" media="screen">
    .ace_editor {
      position: relative !important;
      border: 1px solid lightgray;
      margin: auto;          
      height: 400px;
      width: 100%;
      font-size: 15px;
    }
    .scrollmargin {
      height: 20px;
      text-align: center;
    }
  </style>

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
        <a class="navbar-brand" href="#">Editor</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
              <i class="glyphicon glyphicon-user"></i> <?php echo $user;?> <span class="caret"></span></a>
              <ul id="g-account-menu" class="dropdown-menu" role="menu">

                <li><a href="Controle.php?acao2=logout"><i class="glyphicon glyphicon-lock"></i> Logout</a></
                  li>
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


          <hr>

          <ul class="nav nav-stacked">
            <li><a href="dashboard.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
            <li><a href="criarCluster.php"><i class="glyphicon glyphicon-blackboard"></i> Criar Cluster</a></li>
            <li><a href="editor.php"><i class="glyphicon glyphicon-file"></i> Editor de Código</a></li>
            <li><a href="EnviarCodigo.php"><i class="glyphicon glyphicon-play"></i> Executar Código</a></li>
            

          </ul>

          <hr>

        </div><!-- /span-3 -->
        <div class="col-sm-9" width="80%">

          <!-- column 2 --> 
          <h3><i class="glyphicon glyphicon-file"></i> Editor</h3>  
          <hr>
          <!--form emviar arquivo-->
          <form method="post" action="#" enctype="multipart/form-data">
            <input type="file" id="selectedFile" name="arquivo" value=""/> 
            <input type="hidden" name="acao" value="abrir">           
            <br>
            <input class="btn btn-primary" type="submit" value="Abrir arquivo">
          </form><!-- end form emviar arquivo-->
          <?php  

          function upload(){
            /* Insira aqui a pasta que deseja salvar o arquivo*/
            $uploaddir = '/var/www/html/clustermpi/uploads/';

            $uploadfile = $uploaddir . $_FILES['arquivo']['name'];
            $name = $_FILES['arquivo']['name'];
            session_start("arquivo");
            $_SESSION['arquivo'] = $name;
            $_UP['extensoes'] = array('c');

            $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
            if (array_search($extensao, $_UP['extensoes']) === false) {
              //echo "<script>alert('Arquivo enviado!');</script>";
              exit;
            }

            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)){                   
            }else{
             echo "<script>alert('Arquivo não enviado!');</script>";
           }         
           $arq = Controle::processa_file($uploadfile);
           echo $arq;
         }            

         ?>


         <form name="form" method="post" onsubmit="codigo();" action="Controle.php">                    
          <br>
          <div class="editor" name="editor" id="editor"><?php            if (isset($_POST['acao'])) {
           $acao = $_POST['acao'];
           if ($acao == 'abrir') {
             upload();               
           }
         }?></div>          
         <input type="hidden" name="acao" value="salva">
         <input type="hidden" name="code" id="code">

         <br>
         <input  class="btn btn-primary" type="submit" value="Salvar" ></input>
         <a class="btn btn-primary" href="Controle.php?arquivo=uploads/<?php $var = $_SESSION['arquivo']; echo $var;?>">Download</a>
         <a class="btn btn-primary" href="EnviarCodigo.php">Run</a>

         
       </form>       
       <br>
     </div>
     <script src="js/bootstrap.min.js"></script>
     <script src="t.js"></script>
     <script src="fonts/"></script>
   </body>
   </html>