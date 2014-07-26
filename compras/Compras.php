<?php
	
class Compras{
	
	private $id;
	private $nome;
	private $preco;
	public function __construct($idProduto = null,$idEstabelecimento = null,preco =  null){
		$this->id = $id;
		$this->nome = $nome;
		$this->preco = $preco;
		
	}
			
	function setIdProduto($idProduto) {
		$this->idProduto = $idProdutoidProduto;
	}
	
	function getIdProduto() {
		return $this->idProduto;
	}
	
	function setIdEstabelecimento($idEstabelecimento) {
		$this->idEstabelecimento = $idEstabelecimento;
	}
	
	function getIdEstabelecimento() {
		return $this->idEstabelecimento;
	}
	
	function setPreco($preco) {
		$this->preco = $preco;
	}
	
	function getPreco() {
		return $this->preco;
	}
	
	}

?>