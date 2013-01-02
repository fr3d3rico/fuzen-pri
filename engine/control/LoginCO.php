<?php
require("Control.php");
require("../businessobject/LoginBO.php");

class LoginCO extends Control {
	
	/**
	 * M�todo construtor.
	 */
	function __construct() {
		$option = $_REQUEST["option"];
		switch( $option ) {
			case "entrar" : {
				$this->entrar();
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
	 * M�todo de login na p�gina de login.
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
			$_SESSION['msg'] = "Usu�rio ou Senha inv�lidos!";
			
			header("Location: ../../admin/login.php");
		}
	}
	
}

$obj = new LoginCO();
?>