<?php
/**
 * Classe de controle genérica.
 * @author Frederico
 */
session_start();

class Control {
	/**
	 * Método Construtor.
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
	 * Método destrutor.
	 */
	function __destruct() {
		
	}
}
?>