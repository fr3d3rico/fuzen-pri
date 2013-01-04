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
		$this->isUsuarioLogado();
		
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
	
	/**
	 * Método para validar se usuário está logado ou não.
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
			$_SESSION['msg'] = "Sua sessão expirou!";
	
			header("Location: ../../admin/login.php");
			exit;
		}
	}
}
?>