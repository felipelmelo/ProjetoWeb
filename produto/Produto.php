<?php

// em modelo mvc esta classe seria o Model..
class Produto {

	private $id;
	private $nome_produto;
	private $fabricante_produto;
	private $especificacao_prod;
	private $data_prod;
	private $id_categoria;
	private $id_estabelecimento;
	private $preco;
	
	function __construct($id = null, $nome_produto = null, 
		$fabricante_produto = null, $especificacao_prod = null, 
		$data_prod = null, $id_categoria = null, $id_estabelecimento = null, $preco = null)
	{
		$this->id = $id;
		$this->nome_produto = $nome_produto;
		$this->fabricante_produto = $fabricante_produto;
		$this->especificacao_prod = $especificacao_prod;
		$this->data_prod = $data_prod;
		$this->id_categoria = $id_categoria;
		$this->id_estabelecimento = $id_estabelecimento;
		$this->preco = $preco;

	}

	function setId($id){
		$this->id = $id;
	}

	function getId(){
		return $this->id;
	}

	function setIdEstab($id_estabelecimento){
		$this->id_estabelecimento = $id_estabelecimento;
	}

	function getIdEstab(){
		return $this->id_estabelecimento;
	}

	function setPreco($preco){
		$this->preco = $preco;
	}

	function getPreco(){
		return $this->preco;
	}

	function setNomeProd($nome_produto){
		$this->nome_produto = $nome_produto;
	}

	function getNomeProd(){
		return $this->nome_produto;
	}

	function setFabricanteProd($fabricante_produto){
		$this->fabricante_produto = $fabricante_produto;
	}

	function getFabricanteProd(){
		return $this->fabricante_produto;
	}

	function setEspecificacaoProd($especificacao_prod){
		$this->especificacao_prod = $especificacao_prod;
	}

	function getEspecificacaoProd(){
		return $this->especificacao_prod;
	}

	function setDataProd($data_prod){
		$this->data_prod = $data_prod;
	}

	function getDataProd(){
		return $this->data_prod;
	}

	function setIdCategoria($id_categoria){
		$this->id_categoria = $id_categoria;
	}

	function getIdCategoria(){
		return $this->id_categoria;
	}
}
?>