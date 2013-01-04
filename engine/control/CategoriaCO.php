<?php
require("Control.php");
require("../businessobject/CategoriaBO.php");
require("../bean/Categoria.php");
require("../bean/Usuario.php");
require("../util/Messages.php");

class CategoriaCO extends Control {
	
	var $categoria;
	
	/**
	 * Método construtor.
	 */
	function __construct() {
		parent::__construct();
		
		$message = new Messages();
		
		$option = $_REQUEST["option"];
		switch( $option ) {
			case "cadastrar" : {
				$this->cadastrar();
				break;
			}
			case "alterar" : {
				$this->alterar();
				break;
			}
			case "paginaAlterar" : {
				$this->paginaAlterar();
				break;
			}
			case "remover" : {
				$this->remover();
				break;
			}
			case "cancelar" : {
				$_SESSION["msg"] = "";
				$_SESSION["tipoMsg"] = "";
				
				header("Location: ../../admin/cadastrarCategoria.php");
				break;
			}
			case "paginaCadastrar" : {
				$this->paginaCadastrar();
				break;
			}
			case "paginaConsultar" : {
				$this->consultar();
				break;
			}
			default : {
				$this->consultar();
				break;
			}
		}
	}
	
	function paginaCadastrar() {
		header("Location: ../../admin/cadastrarCategoria.php");
	}
	
	function paginaAlterar() {
		$id = $_REQUEST["oid"];
		
		if( $id != null && $id != 0 ) {
			$categoriaBO = new CategoriaBO();
			
			$categoria = $categoriaBO->consultarCategoria($id);
			
			if( $categoria != null ) {
				$_SESSION["categoria"] = serialize($categoria);
				header("Location: ../../admin/alterarCategoria.php");
			}
			else {
				$_SESSION["msg"] = "Não foi possível Selecionar a Categoria!";
				$_SESSION["tipoMsg"] = "alert alert-error";
				
				$this->consultar();
			}
		}
	}
	
	function consultar() {
		$categoriaBO = new CategoriaBO();
		
		$listaCategoria = $categoriaBO->consultar();
		
		if( $listaCategoria != null && is_array($listaCategoria) ) {
			$_SESSION["listaCategoria"] = $listaCategoria;
		}
		if( count($listaCategoria) == 0 ) {
			$_SESSION["listaCategoria"] = null;
		}
		
		header("Location: ../../admin/consultarCategoria.php");
	}
	
	/**
	 * Método de cadastro.
	 */
	function cadastrar() {
		$usuario = unserialize($_SESSION["usuario_sessao"]);
		
		$titulo = $_REQUEST["titulo"];
		$isCadastrado = false;
		
		if( $titulo != null && strlen($titulo) > 0 
			&& $usuario != null && $usuario->id != 0 ) {
			
			$this->categoria = new Categoria();
			
			$this->categoria->titulo = $titulo;
			$this->categoria->usuario_id = $usuario->id;
			
			$categoriaBO = new CategoriaBO();
			
			$isCadastrado = $categoriaBO->cadastrar($this->categoria);
			
			if( $isCadastrado ) {
				$_SESSION["msg"] = "Categoria cadastrada com Sucesso!";
				$_SESSION["tipoMsg"] = "alert alert-success";
			}
			else {
				$_SESSION["msg"] = "Categoria não cadastrada!";
				$_SESSION["tipoMsg"] = "alert alert-error";
			}
		}
		else {
			$_SESSION["msg"] = "Informe o nome da Categoria";
			$_SESSION["tipoMsg"] = "alert alert-block";
		}
		
		header("Location: ../../admin/cadastrarCategoria.php");
	}
	
	function alterar() {
		$usuario = unserialize($_SESSION["usuario_sessao"]);
	
		$id = $_REQUEST["oid"];
		$titulo = $_REQUEST["titulo"];
		$ativo = $_REQUEST["ativo"];
		
		if( $id != null && $id > 0 &&
			$titulo != null && strlen($titulo) > 0 &&
			isset($_REQUEST["ativo"]) &&
			$usuario->id > 0 ) {
				
			$this->categoria = new Categoria();
				
			$this->categoria->id = $id;
			$this->categoria->titulo = $titulo;
			$this->categoria->ativo = $ativo;
			$this->categoria->usuario_id = $usuario->id;
				
			$categoriaBO = new CategoriaBO();
				
			$isAlterado = $categoriaBO->alterar($this->categoria);
				
			if( $isAlterado ) {
				$_SESSION["msg"] = "Categoria alterada com Sucesso!";
				$_SESSION["tipoMsg"] = "alert alert-success";
			}
			else {
				$_SESSION["msg"] = "Categoria não alterada!";
				$_SESSION["tipoMsg"] = "alert alert-error";
			}
		}
	
		$categoria = $categoriaBO->consultarCategoria($id);
			
		if( $categoria != null ) {
			$_SESSION["categoria"] = serialize($categoria);
			header("Location: ../../admin/alterarCategoria.php");
		}
	}
	
	function remover() {
		$id = $_REQUEST["oid"];
		
		if( $id != null && $id != 0 ) {
			
			$categoriaBO = new CategoriaBO();
			
			$categoriaBO->remover($id);
			
			$_SESSION["msg"] = "Categoria removido com Sucesso!";
			$_SESSION["tipoMsg"] = "alert alert-success";
		}
		else {
			$_SESSION["msg"] = "Identificador da Categoria não Encontrado.";
			$_SESSION["tipoMsg"] = "alert alert-block";
		}
		
		$this->consultar();
	}
	
}

$obj = new CategoriaCO();
?>