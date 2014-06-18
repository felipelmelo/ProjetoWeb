<?php
	
class Usuario{
	
	private $id;
	private $nome;
	private $Cpf;
	private $email;
	private $senha;
	private $tipo_usuario;	
	public function __construct($id = null,$nome = null, $Cpf = null, $email = null, $senha = null, $tipo_usuario = null){
		$this->id = $id;
		$this->nome = $nome;
		$this->Cpf = $Cpf;
		$this->email = $email;
		$this->senha = $senha;
		$this->tipo_usuario = $tipo_usuario;
		
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
	
	function setCpf($Cpf) {
		$this->Cpf = $Cpf;
	}
	
	function getCpf() {
		return $this->Cpf;
	}
	
	function setEmail($email) {
		$this->email = $email;
	}
	
	function getEmail() {
		return $this->email;
	}
	
	function setSenha($senha) {
		$this->senha = $senha;
	}
	function getSenha() {
		return $this->senha;
	}
	function setTipo_usuario($tipo_usuario) {
		$this->tipo_usuario = $tipo_usuario;
	}
	function getTipo_usuario() {
		return $this->tipo_usuario;
	}
}

?>