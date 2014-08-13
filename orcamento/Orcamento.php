<?php
	
class Orcamento{
	
	private $id;
	private $qtd;
	private $idProduto;
	private	$idUsuario;
	public function __construct($id = null,$qtd= null,$idUsuario= null, $idProduto = null){
		$this->id = $id;
		$this->qtd = $qtd;
		$this->idProduto = $idProduto;
		$this->idUsuario = $idUsuario;
		
	}
			
	function setId($id) {
		$this->id = $id;
	}
	
	function getId() {
		return $this->id;
	}
	
	function setQtd($qtd) {
		$this->qtd = $qtd;
	}
	
	function getQtd() {
		return $this->qtd;
	}	
	
	function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
	
	function getIdUsuario() {
		return $this->idUsuario;
	}
	
	
	function setIdProduto($idProduto) {
		$this->idProduto = $idProduto;
	}
	
	function getIdProduto() {
		return $this->idProduto;
	}
	
	}
	
?>