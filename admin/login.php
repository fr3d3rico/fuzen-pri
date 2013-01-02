<!DOCTYPE HTML>
<?php session_start();
require("../engine/util/Messages.php");
$message = new Messages();
?>
<html lang="pt">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="../resources/bootstrap/css/bootstrap.css" rel="stylesheet" />
		<style type="text/css">
	      body {
	        padding-top: 40px;
	        padding-bottom: 40px;
	        background-color: #f5f5f5;
	      }
	
	      .form-signin {
	        max-width: 300px;
	        padding: 19px 29px 29px;
	        margin: 0 auto 20px;
	        background-color: #fff;
	        border: 1px solid #e5e5e5;
	        -webkit-border-radius: 5px;
	           -moz-border-radius: 5px;
	                border-radius: 5px;
	        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	                box-shadow: 0 1px 2px rgba(0,0,0,.05);
	      }
	      .form-signin .form-signin-heading,
	      .form-signin .checkbox {
	        margin-bottom: 10px;
	      }
	      .form-signin input[type="text"],
	      .form-signin input[type="password"] {
	        font-size: 16px;
	        height: auto;
	        margin-bottom: 15px;
	        padding: 7px 9px;
	      }
	
	    </style>
	    <script type="text/javascript" src="../resources/js/Functions.js">
	    </script>
	</head>
	<body>
		<div class="container">
			<div class="row-fluid">
				<div class="span4 offset4">
					<form class="form-signin" method="post" action="../engine/control/LoginCO.php">
						<input type="hidden" id="option" name="option" value="entrar" />
						<?php
						if( isset($_SESSION['msg']) && strlen($_SESSION['msg']) > 0 ) {
							?>
							<div class="alert alert-block">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  <h4>Atenção!</h4>
							  <?php echo($_SESSION["msg"]); ?>
							</div>
							<?php 
						}
						?>
						<input type="text" id="usuario" name="usuario" placeholder="Usuário" value="" />
						<input type="password" id="senha" name="senha" placeholder="Senha" value="" />
						<button class="btn btn-large btn-primary" type="submit" onclick="AlteraValor(option, 'entrar');">
							Entrar
						</button>
						<button class="btn btn-large btn-primary" type="submit" onclick="AlteraValor(option, 'cancelar');">
							Cancelar
						</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>