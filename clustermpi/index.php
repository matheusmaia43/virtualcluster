<html>

<head>
	<title>Login</title>
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">	
	<meta charset="utf-8" />
	<!--<script type="text/javascript" src="funcoes.js"></script>-->
	<link rel="icon" href="images/docker.ico" type="image/x-icon"/>   	
</head>
<body>
	<br>

</ul>

<div class="container-fluid">    
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	    <div align="center">

	        <img src="images/logo.jpg" width="40" height="50"><br>
	        

	    </div>
		<br>
		<br>
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Cluster | Login</div>

			</div>     

			<div style="padding-top:30px" class="panel-body" >

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                
				<form id="loginform" method="post" class="form-horizontal" action="Controle.php">
					<input type="hidden" name="acao" value="logar">
					
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input  id="login-username" type="text" class="form-control" name="username" value="" placeholder="Usuário">                                        
					</div>

					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="login-password" type="password"  class="form-control" name="password" placeholder="Senha">
					</div>


		


					<div style="margin-top:10px" class="form-group">
						<!-- Button -->

						<div class="col-sm-12 controls">
						    <input class="btn btn-primary" type="submit" name="login" value="Login">
							<!--<a id="btn-login" href="#"  class="btn btn-success">Login  </a>
							<a id="btn-fblogin" href="#" class="btn btn-primary">Login com Facebook</a>-->

						</div>
					</div>

				</form>     



			</div>                     
		</div>  
	</div>
</body>
</html>