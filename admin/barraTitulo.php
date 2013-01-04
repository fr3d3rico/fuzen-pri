	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Área Administrativa</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
            	Ol&#225; 
              <?php
              if( isset($_SESSION["usuario_sessao"]) ) {
              	$usuario = unserialize($_SESSION["usuario_sessao"]);
              	echo($usuario->usuario);
              } 
              ?>
              -
              <a href="../engine/control/LoginCO.php?option=sair">Sair</a>
            </p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>