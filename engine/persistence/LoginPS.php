<?php
require("Persistence.php");
require("../bean/Usuario.php");

class LoginPS extends Persistence {
	
	function __construct() {
		parent::__construct();
	}
	
	function __destruct() {
		parent::__destruct();
	}
	
	function autenticarUsuario($usuario, $senha) {
		$autenticado = false;
		
		$sql = "select usuario from usuario where usuario = '" . $usuario . "' and senha = '". $senha . "'";
		$result = pg_query($sql) or die("Query failed: " . pg_last_error());
		
		if(pg_num_rows($result) > 0) {
			while( $line = pg_fetch_array($result, 0, PGSQL_NUM) ) {
				if( trim($line[0]) == $usuario ) {
					$autenticado = true;
				}
				break;
			}
		}
		
		return $autenticado;
	}
	
	function consultarUsuario($usuario, $senha) {
		$usu = null;
		
		$sql = "select id, usuario, senha, ativo from usuario where usuario = '" . $usuario . "' and senha = '". $senha . "'";
		$result = pg_query($sql) or die("Query failed: " . pg_last_error());

		if(pg_num_rows($result) > 0) {
			while( $line = pg_fetch_array($result, 0, PGSQL_NUM) ) {
				if( trim($line[1]) == $usuario ) {
					
					$usu = new Usuario();
					$usu->id = $line[0];
					$usu->usuario = $line[1];
					$usu->senha = $line[2];
					$usu->ativo = $line[3];
					
				}
				break;
			}
		}
		
		return $usu;
	}
}

?>