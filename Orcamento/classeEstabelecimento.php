<?php

Class Estabelecimento
{
	private $id;
	private $nomeFantasia;
	private $razaoSocial;
	private $logradouro;
	private $numero;
	private $complemento;
	private $bairro;
	private $cidade;
	private $estado;
	
	function __construct($id = null,
						$nomeFantasia = null, 
						$razaoSocial = null, 
						$logradouro = null, 
						$numero = null, 
						$complemento = null, 
						$bairro = null,
						$cidade = null,
						$estado = null)
	{
		$this->id = $id;
		$this->nomeFantasia = $nomeFantasia;
		$this->razaoSocial = $razaoSocial;
		$this->logradouro = $logradouro;
		$this->numero = $numero;
		$this->complemento = $complemento;
		$this->bairro = $bairro ;
		$this->cidade = $cidade;
		$this->estado = $estado;	
	}
	
	function getId()
	{
		return $this->id;
	}
	
	function setId($id)
	{
		$this->id = $id;
	}
	
	function getNomeFantasia()
	{
		return $this->nomeFantasia;
	}
	
	function setNomeFantasia($nomeFantasia)
	{
		$this->nomeFantasia = $nomeFantasia;
	}
	
	function getRazaoSocial()
	{
		return $this->razaoSocial;
	}
	
	function setRazaoSocial($razaoSocial)
	{
		$this->razaoSocial = $razaoSocial;
	}

	function getLogradouro()
	{
		return $this->logradouro;
	}

	function setLogradouro($logradouro)
	{
		$this->logradouro = $logradouro;
	}

	function getNumero()
	{
		return $this->numero;
	}
	
	function setNumero($numero)
	{
		$this->numero = $numero;
	}

	function getComplemento()
	{
		return $this->complemento;
	}
	
	function setComplemento($complemento)
	{
		$this->complemento = $complemento;
	}
	
	function getBairro()
	{
		return $this->bairro;
	}
	
	function setBairro($bairro)
	{
		$this->bairro = $bairro;
	}

	function getCidade()
	{
		return $this->cidade;
	}
	
	function setCidade($cidade)
	{
		$this->cidade = $cidade;
	}
	
	function getEstado()
	{
		return $this->estado;
	}
	
	function setEstado($estado)
	{
		$this->estado = $estado;
	}
	
	
	
	
}
?>