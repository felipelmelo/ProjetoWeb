<?php

require_once ('classeEstabelecimento.php');
require_once ('ConexaoPDO.php');

class RepositorioEstabelecimento
{
	private $conn;
	private $stm;
	private static $instancia;
	
	
	private function __construct()
	{
		$this->conn = ConexaoPDO::getInstancia()->getDb();
	}

	public static function getInstancia()
	{
		if(!isset(self::$instancia))
			self::$instancia = new RepositorioEstabelecimento();
		return self::$instancia;
	}
	
	public function retornaObjeto($array)
	{
			
		return new Estabelecimento($array["id"], $array["nomeFantasia"], $array["razaoSocial"],$array["logradouro"],$array["numero"],$array["complemento"],$array["bairro"], $array["cidade"],  $array["estado"]);
								   
	}
	
	public function inserir($id,$nomeFantasia,$razaoSocial,$logradouro,$numero,$complemento,$bairro,$cidade,$estado)
	{
		try
		{
			
			$objEstabelecimento = new Estabelecimento(null,$nomeFantasia,$razaoSocial,$logradouro,$numero,$complemento,$bairro,$cidade,$estado);
						
			$sqlInsert = "INSERT INTO estabelecimento (nomeFantasia,razaoSocial,logradouro,numero,complemento,bairro,cidade,estado)
						 VALUES (:nomeFantasia,:razaoSocial,:logradouro,:numero,:complemento,:bairro,:cidade,:estado)";
			
			$this->stm = $this->conn->prepare($sqlInsert);
			$this->stm->bindValue(":nomeFantasia",$objEstabelecimento->getNomeFantasia());
			$this->stm->bindValue(":razaoSocial", $objEstabelecimento->getRazaoSocial());
			$this->stm->bindValue(":logradouro", $objEstabelecimento->getLogradouro());
			$this->stm->bindValue(":numero", $objEstabelecimento->getNumero());
			$this->stm->bindValue(":complemento", $objEstabelecimento->getComplemento());
			$this->stm->bindValue(":bairro", $objEstabelecimento->getBairro());
			$this->stm->bindValue(":cidade", $objEstabelecimento->getCidade());
			$this->stm->bindValue(":estado", $objEstabelecimento->getEstado());
			$this->stm->execute();
			
			header ("Location: exibirDados.php");
		}
		
		catch(PDOException $e)
		{
			echo $e -> getMessage();
		}
	}
	
	public function listar()
	{
		try
		{
			$retorno = null;
			$sqlExibir = "SELECT * FROM estabelecimento";
			$this->stm = $this->conn->prepare($sqlExibir);
			$this->stm->execute();
			
			while ($result = $this->stm->fetch(PDO::FETCH_ASSOC))
			{
				$retorno[] = $this->retornaObjeto($result);
				
			}
			return $retorno;
		}
		catch(PDOException $e)
		{
			throw new $e->getMessage(); 
		}
	}	
		
	public function visualizar($id)
	{
		try{
		$retorno = null;
		
		$objEstabelecimento = new Estabelecimento($id,null,null,null,null,null, null,null,null);
		
		$sql = "SELECT * FROM estabelecimento WHERE id = :id";
		
		$this->stm = $this->conn->prepare($sql);
		$this->stm->bindValue(":id", $objEstabelecimento->getId());
		$this->stm->execute();
		
		while($result = $this->stm->fetch(PDO::FETCH_ASSOC))
		{
			$retorno[]=$this->retornaObjeto($result);
		}
		return $retorno;
		
		}
		catch(PDOException $e)
		{
		throw new MensagemTvException($e->getMessage());
		}
	}
	
	public function Alterar($id,$nomeFantasia,$razaoSocial,$logradouro,$numero,$complemento,$bairro,$cidade,$estado)
	{
		try
		{
			$objEstabelecimento = new Estabelecimento($id,$nomeFantasia,$razaoSocial,$logradouro,$numero,$complemento,$bairro,$cidade,$estado);	
			$sqlUpdate = "UPDATE estabelecimento SET nomeFantasia = :nomeFantasia, razaoSocial = :razaoSocial,logradouro = :logradouro,numero = :numero, complemento = :complemento,bairro = :bairro, cidade = :cidade, estado = :estado
			WHERE id = :id";
			
			$this->stm = $this->conn->prepare($sqlUpdate);
			$this->stm->bindValue(":id", $objEstabelecimento->getId());
			$this->stm->bindValue(":nomeFantasia", $objEstabelecimento->getNomeFantasia());
			$this->stm->bindValue(":razaoSocial", $objEstabelecimento->getRazaoSocial());
			$this->stm->bindValue(":logradouro", $objEstabelecimento->getLogradouro());
			$this->stm->bindValue(":numero", $objEstabelecimento->getNumero());
			$this->stm->bindValue(":complemento", $objEstabelecimento->getComplemento());
			$this->stm->bindValue(":bairro", $objEstabelecimento->getBairro());
			$this->stm->bindValue(":cidade", $objEstabelecimento->getCidade());
			$this->stm->bindValue(":estado", $objEstabelecimento->getEstado());
			$this->stm->execute();
			
			header("Location: exibirDados.php");
			
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	public function excluir($id)
	{
		try
		{
			$objEstabelecimento = new Estabelecimento($id, null, null, null, null, null, null, null, null);
			$sqlExcluir = "DELETE FROM estabelecimento WHERE id = :id";
			
			$this->stm = $this->conn->prepare($sqlExcluir);
			$this->stm->bindValue(":id", $objEstabelecimento->getId());
			$this->stm->execute();
			
			header("Location: exibirDados.php");
		}
		catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	public function verificaEstabelecimento($razaoSocial)
	{
		try
		{
			$retorno = null;
			
			$objEstabelecimento = new Estabelecimento(null, $razaoSocial);
			
			$sql = "SELECT * FROM estabelecimento WHERE  razaoSocial like :razaoSocial";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":razaoSocial", $objEstabelecimento->getRazaoSocial());
			$this->stm->execute();
			
			while($result = $this->stm-fetch(PDO::FETCH_ASSOC))
			{
				$retorno[] = $this->retornaObjeto($result);
			}
			return $retorno;
		
		}catch(PDOException$e)
		{	
			echo $e->getMessage();
		}		
	}
}
?>