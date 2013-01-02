<?php
require("../persistence/LoginPS.php");

class LoginBO {
	function entrar($usuario, $senha) {
		$autenticado = false;
		
		$usuario = trim($usuario);
		$senha = trim($senha);
		
		if( $usuario != null && strlen($usuario) > 0 && $senha != null && strlen($senha) > 0) {
			$loginPS = new LoginPS();
			
			$autenticado = $loginPS->autenticarUsuario($usuario, $senha);
		}
		
		return $autenticado;
	}
	
	function consultarUsuario($usuario, $senha) {
		
		$usu = null;
		
		if( $usuario != null && strlen($usuario) > 0 && $senha != null && strlen($senha) > 0) {
			$loginPS = new LoginPS();
			
			$usu = $loginPS->consultarUsuario($usuario, $senha);
		}
		
		return $usu;
	}
}
?>