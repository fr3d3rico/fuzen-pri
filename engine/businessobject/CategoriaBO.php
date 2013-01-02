<?php
require("../persistence/CategoriaPS.php");

class CategoriaBO {
	function cadastrar($categoria) {
		$isCadastrado = false;
		
		$categoriaPS = new CategoriaPS();
		
		$isCadastrado= $categoriaPS->cadastrar($categoria);
		
		return $isCadastrado;
	}
	
	function alterar($categoria) {
		$isAlterado = false;
		
		$categoriaPS = new CategoriaPS();
		
		$isAlterado= $categoriaPS->alterar($categoria);
		
		return $isAlterado;
	}
	
	function consultar() {
		$categoriaPS = new CategoriaPS();
		
		$listaCategoria = $categoriaPS->consultar();
		
		return $listaCategoria;
	}
	
	function consultarCategoria($id) {
		$categoriaPS = new CategoriaPS();
	
		$categoria = $categoriaPS->consultarCategoria($id);
	
		return $categoria;
	}
	
	function remover($id) {
		$categoriaPS = new CategoriaPS();
	
		$categoriaPS->remover($id);
	}
}
?>