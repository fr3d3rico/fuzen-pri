<?php
session_start();
require("../engine/bean/Usuario.php");
?>
<!DOCTYPE HTML>
<html lang="pt">
  <?php include("head.php");?>

  <body>

    <?php include("barraTitulo.php");?>

    <div class="container-fluid">
      <div class="row-fluid">
        <?php include("menu.php");?>
        <?php
        if( isset($_SESSION["msg"]) && strlen($_SESSION["msg"]) > 0 ) { 
        ?>
	        <div class="span9">
	        	<div class="<?php echo($_SESSION["tipoMsg"]); ?>">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <h4>Atenção!</h4>
				  <?php echo($_SESSION["msg"]); ?>
				</div>
	        </div>
        <?php } ?>
        <div class="span9">
          <div class="hero-unit">
            <h3>Cadastro de Categoria</h3>
            
            <br />
            <br />
            
            <form class="form-signin" method="post" action="../engine/control/CategoriaCO.php">
				<input type="hidden" id="option" name="option" value="cadastrar" />
				
				<input type="text" id="titulo" name="titulo" placeholder="Nome da Categoria" value="" />
				
				<br />
				<br />
				
				<button class="btn btn-large btn-primary" type="submit" onclick="AlteraValor(option, 'cadastrar');">
					Cadastrar
				</button>
				<button class="btn btn-large btn-primary" type="reset" onclick="AlteraValor(option, 'cancelar');">
					Cancelar
				</button>
			</form>
					
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../resources/bootstrap/js/jquery.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-transition.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-alert.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-modal.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-tab.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-popover.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-button.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>
