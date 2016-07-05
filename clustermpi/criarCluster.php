  <!DOCTYPE html>
  <?php  
  
include_once 'Controle.php';
///*
session_start("user");
$user = $_SESSION['user'];
if ($user == "") {
  header('location:index.php');
}
//*/
  ?>
  <html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Criar Cluster</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/docker.ico" type="image/x-icon"/>   
    <!-- script references -->
    
    <script src="js/bootstrap.min.js"></script>            
    <script src="slide-ra.js"></script>            
    <script src="fonts/"></script>

    <!-- Include jQuery -->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->

    <!-- Include Simple Slider JavaScript and CSS -->
    <script src="js/simple-slider.js"></script>
    <link href="css/simple-slider.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <link href="css/styles.css" rel="stylesheet">
      <script type="text/javascript">
       function updateCPU(val) {
        document.getElementById('cpu').value=val; 
      }
      function updateNOS(val) {
        document.getElementById('nos').value=val; 
      }
      function updateMEN(val) {
        document.getElementById('men').value=val; 
      }
      

    </script>
  </head>
  <body>
    <!-- Header -->
    <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-toggle"></span>
          </button>
          <a class="navbar-brand" href="#">Criar Cluster</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

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
          <h3><i class="glyphicon glyphicon-blackboard  "></i> Criar Cluster</h3>
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
          <h3><i class="glyphicon glyphicon-blackboard"></i> Criar Cluster</h3>  

          <hr>
          <form class="form-actions" method="post" action="#">
           <input type="hidden" name="acao" value="criar"></input>
           <fieldset>
            <legend>Criar</legend>
            <label>Nome </label>
            <input type="text" name="nome"> 
            <hr>
            <label>Quantidade de nós </label>
            <input type="text" data-slider-range="2,6" data-slider-step="1" data-slider="true" id="qtd_nos"  onchange="updateNOS(this.value);">
            <input type="text"  size="10" id="nos" name="qtd_nos" value="">                        
            <hr>
            <label>Quantidade de CPU </label>
            <input type="text" data-slider-range="1,4" data-slider-step="1" data-slider="true" id="qtd_cpu" onchange="updateCPU(this.value);">
            <input type="text"  size="10" id="cpu" name="qtd_cpu" value="">
            <hr>
            <label>Memória RAM </label>
            <input type="text" data-slider-range="0,1024" data-slider-step="128" data-slider="true" id="qtd_ram" onchange="updateMEN(this.value);">
            <input type="text" size="10" s id="men" name="qtd_ram" value=""><br><br>

            <button type="submit" class="btn btn-primary" name="enviar" value="enviar">Enviar solicitação</button>
            <!-- data-toggle="modal" data-target="#myModal"-->
            

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                 <br>
                 <h4 class="glyphicon glyphicon-wrench" align="center"> Aguarde enquanto o cluster é configurado!</h4>
                 <br>
                 <br>
               </div>
             </div>
           </div>
         </fieldset>
       </form>
       <?php  
       function cria(){
        if(isset($_POST['nome']) && $_POST['nome'] != ''){
          $nome = $_POST['nome'];
          $qtd_nos = $_POST['qtd_nos'];
          $qtd_cpu = $_POST['qtd_cpu'];
          $qtd_men = $_POST['qtd_ram'];

          Controle::criaCluster($qtd_nos, $qtd_cpu, $qtd_men);
        }

      }
      //$saida=cria();
      ?>
      <br>
      <hr>
      <div class="panel panel-primary">
        <div class="panel-heading">Logs da Criação do Cluster</div>
        <div class="panel-body"><?php cria(); ?></div>
      </div>      
      <div class="row">        
        <!--center-right-->
        <div class="col-md-5">
          <hr>

        </div><!--/col-span-6-->


      </div><!--/col-span-9-->

    </div><!--/row-->
    <!-- /upper section -->

    <!-- lower section -->
    <div class="row">    

    </body>
    </html>