<?php
require("Persistence.php");

class CategoriaPS extends Persistence {
	
	function __construct() {
		parent::__construct();
	}
	
	function __destruct() {
		parent::__destruct();
	}
	
	function cadastrar($categoria) {
		$isCadastrado = true;
		
		$labels = "";
		$values = "";
		//Valores
		if( strlen($categoria->titulo) > 0 ) {
			$labels = $labels . "titulo,";
			$values = $values . "'" . $categoria->titulo . "',";
		}
		if( strlen($categoria->usuario_id) > 0 ) {
			$labels = $labels . "usuario_id,";
			$values = $values . $categoria->usuario_id . ",";
		}
		
		//Magica rsrsrsrs
		$labels = $labels . "[[";
		$values = $values . "[[";
		
		$labels = str_replace(",[[", " ", $labels);
		$values = str_replace(",[[", " ", $values);
		
		$sql = "insert into categoria (" . $labels . ") values (". $values .")";
		
		$result = pg_query($sql) or die("Query failed: " . pg_last_error());
		
		return $isCadastrado;
	}
	
	function alterar($categoria) {
		$isAlterado = true;
	
		$sql = "update categoria set titulo = '". $categoria->titulo ."', ativo = ". $categoria->ativo .", usuario_id = ". $categoria->usuario_id ." where id = ". $categoria->id;
		
	
		$result = pg_query($sql) or die("Query failed: " . pg_last_error());
	
		return $isAlterado;
	}
	
	function consultarCategoria($id) {
		$categoria = null;
		
		$sql = "select id, titulo, usuario_id, ativo from categoria where id = " . $id;
		$result = pg_query($sql) or die("Query failed: " . pg_last_error());
		
		if(pg_num_rows($result) > 0) {
				
			for($i = 0; $i < pg_num_rows($result); $i++) {
				$line = pg_fetch_array($result, $i, PGSQL_NUM);
				$categoria = new Categoria();
				$categoria->id = $line[0];
				$categoria->titulo = $line[1];
				$categoria->usuario_id = $line[2];
				$categoria->ativo = $line[3];
				break;
			}
		}
		
		return $categoria;
	}
	
	function consultar() {
		$listaCategoria = null;
		
		$sql = "select id, titulo, usuario_id, ativo from categoria order by titulo";
		$result = pg_query($sql) or die("Query failed: " . pg_last_error());
		
		if(pg_num_rows($result) > 0) {
			
			$listaCategoria = array();
			
			for($i = 0; $i < pg_num_rows($result); $i++) {
				$line = pg_fetch_array($result, $i, PGSQL_NUM);
				$categoria = new Categoria();
				$categoria->id = $line[0];
				$categoria->titulo = $line[1];
				$categoria->usuario_id = $line[2];
				$categoria->ativo = $line[3];
				
				array_push($listaCategoria, serialize($categoria));
			}
		}
		
		return $listaCategoria;
	}
	
	function remover($id) {
		if( $id != null && strlen($id) > 0 ) {
			$sql = "delete from categoria where id = " . $id;
			pg_query($sql) or die("Query failed: " . pg_last_error());
		}
	}
}
?>