<?php
require("Control.php");
require("../businessobject/LoginBO.php");

class LoginCO extends Control {
	
	/**
	 * Método construtor.
	 */
	function __construct() {
		$option = $_REQUEST["option"];
		switch( $option ) {
			case "entrar" : {
				$this->entrar();
				break;
			}
			case "sair" : {
				$this->sair();
				break;
			}
			case "cancelar" : {
				$_SESSION["msg"] = "";
				header("Location: ../../admin/login.php");
				break;
			}
		}
	}
	
	/**
	 * Método de login na página de login.
	 */
	function entrar() {
		$usuario = $_REQUEST["usuario"];
		$senha = $_REQUEST["senha"];
		
		$loginBO = new LoginBO();
		
		$autenticado = $loginBO->entrar($usuario, $senha);

		if( $autenticado ) {
			$_SESSION["usuario_sessao"] = serialize($loginBO->consultarUsuario($usuario, $senha));
			//$usu = unserialize($_SESSION["usuario_sessao"]);
			
			$_SESSION['msg'] = "";
			
			header("Location: ../../admin/telaInicial.php");
		}
		else {
			$_SESSION['msg'] = "Usuário ou Senha inválidos!";
			
			header("Location: ../../admin/login.php");
		}
	}
	
	/**
	 * Método para sair do sistema.
	 */
	function sair() {
		$isDestroyed = session_destroy();
		session_start();
		if( $isDestroyed ) {
			$_SESSION['msg'] = "Você saiu do sistema com sucesso.";
	
			header("Location: ../../admin/login.php");
		}
	}
	
}

$obj = new LoginCO();
?>