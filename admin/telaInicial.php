<?php
session_start();
require("../engine/bean/Usuario.php");
require("../engine/util/Messages.php");
$message = new Messages();
?>
<!DOCTYPE HTML>
<html lang="pt">
  <?php include("head.php");?>

  <body>

    <?php include("barraTitulo.php");?>

    <div class="container-fluid">
      <div class="row-fluid">
        <?php include("menu.php");?>
        <div class="span9">
          <div class="hero-unit">
            
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
