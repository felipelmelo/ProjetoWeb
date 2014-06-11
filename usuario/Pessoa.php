<?php
	
class Pessoa{
	
	private $nome;
	private $idade;
	private $endereco;
	private $sexo;
	private $cep;
	private $id;
	
	public function __construct($id = null,$nome = null, $idade = null, $endereco = null, $sexo = null, $cep = null){
		$this->id = $id;
		$this->nome = $nome;
		$this->idade = $idade;
		$this->endereco = $endereco;
		$this->sexo = $sexo;
		$this->cep = $cep;
	}
			
	function setId($id) {
		$this->id = $id;
	}
	
	function getId() {
		return $this->id;
	}
	
	function setNome($nome) {
		$this->nome = $nome;
	}
	
	function getNome() {
		return $this->nome;
	}
	
	function setIdade($idade) {
		$this->idade = $idade;
	}
	
	function getIdade() {
		return $this->idade;
	}
	
	function setEndereco($endereco) {
		$this->endereco = $endereco;
	}
	
	function getEndereco() {
		return $this->endereco;
	}
	
	function setSexo($sexo) {
		$this->sexo = $sexo;
	}
	function getSexo() {
		return $this->sexo;
	}
	
	function setCep($cep) {
		$this->cep = $cep;
	}
	function getCep() {
		return $this->cep;
	}
}

?>