<?php
class Messages {
	function __construct() {
		if( isset($_REQUEST["clearMsg"]) && $_REQUEST["clearMsg"] == "SIM" ) {
			$_SESSION["tipoMsg"] = ""; //ok, alert, erro, info
			$_SESSION["msg"] = "";
		}
	}
}
?>