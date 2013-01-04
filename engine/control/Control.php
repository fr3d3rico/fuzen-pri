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
		$this->isUsuarioLogado();
		
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
	
	/**
	 * M�todo para validar se usu�rio est� logado ou n�o.
	 */
	function isUsuarioLogado() {
		$isLogado = false;
		if( isset($_SESSION["usuario_sessao"]) ) {
			$usuario = unserialize($_SESSION["usuario_sessao"]);
			if( $usuario != null ) {
				$isLogado = true;
			}
		}
		if( $isLogado == false ) {
			session_destroy();
			session_start();
			$_SESSION['msg'] = "Sua sess�o expirou!";
	
			header("Location: ../../admin/login.php");
			exit;
		}
	}
}
?>