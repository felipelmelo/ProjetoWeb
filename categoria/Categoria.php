<?php
	
class Categoria{
	
	private $id;
	private $nome;
	public function __construct($id = null,$nome = null){
		$this->id = $id;
		$this->nome = $nome;
		
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
	
	}

?>