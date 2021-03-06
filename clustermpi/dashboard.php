<html lang="en">
<?php 
include_once 'Controle.php';
session_start("user");
$user = $_SESSION['user'];
if ($user == "") {
  header('location:index.php');
}



?>

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Cluster Virtual</title>
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
            <a class="navbar-brand" href="#">Dashboard</a>
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
            <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h3>
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
            <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h3>  

            <hr>

            <div class="panel panel-primary">
              <!-- Default panel contents -->
              <div class="panel-heading">Status VMs</div>
              <!-- Table -->
              <table class="table" height=60>      
                <tbody>
                  <tr>
                    <td bgcolor="#98FB98  ">Ativas</td>
                    <td bgcolor="#FFFF99">Pendentes</td>
                    <td bgcolor="#FF6666">Falhou</td>
                  </tr>
                  <tr>                  
                    <td><?php Controle::vmsA();?></td>
                    <td><?php Controle::vmsP();?></td>
                    <td><?php Controle::vmsF();?></td>

                  </tr>
                </tbody>
              </table>              
            </div>
          </div>
          
          <hr>
          
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

          <!-- script references -->

          <script src="js/bootstrap.min.js"></script>
          <script src="fonts/"></script>

        </body>
        </html>