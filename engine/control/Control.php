<?php
/**
 * Classe de controle gen�rica.
 * @author Frederico
 */
session_start();

class Control {
	/**
	 * M�todo Construtor.
	 */
	function __construct() {
		$_SESSION["tipoMsg"] = ""; //ok, alert, erro, info
		$_SESSION["msg"] = "";
		
		if( isset($_REQUEST["clearMsg"]) && $_REQUEST["clearMsg"] == "SIM" ) {
			$_SESSION["tipoMsg"] = ""; //ok, alert, erro, info
			$_SESSION["msg"] = "";
		}
	}
	/**
	 * M�todo destrutor.
	 */
	function __destruct() {
		
	}
}
?>