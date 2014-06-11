<?php
	require_once('Pessoa.php');
	require_once('../Conexao/conexaoPDO.php');
	class RepositorioPessoa{

	private $conn;
	
	private $stm;
	private static $instancia;
	
	private function __construct(){
		
		$this->conn = ConexaoPDO::getInstancia()->getDb();
	}
	
	public static function getInstancia(){
		if(!isset(self::$instancia))
			self::$instancia = new RepositorioPessoa();
		return self::$instancia;
	}
	
	
	private function retornaObjeto($array){
		return new Pessoa($array["id"],$array["nome"],$array["idade"],$array["endereco"],$array["sexo"],$array["CEP"]);
	}
	
		
	public function inserir($id,$nome,$idade,$endereco,$sexo,$cep){
	
		
		try{
				
			$objPessoa = new Pessoa(null,$nome,$idade,$endereco,$sexo,$cep);
			$sql = "INSERT INTO pessoa (nome,idade,endereco,sexo,cep)
						 values(:nome,:idade,:endereco,:sexo,:cep)";
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":nome", $objPessoa->getNome());
			$this->stm->bindValue(":idade", $objPessoa->getIdade());
			$this->stm->bindValue(":endereco", $objPessoa->getEndereco());
			$this->stm->bindValue(":sexo", $objPessoa->getSexo());
			$this->stm->bindValue(":cep", $objPessoa->getCep());
			$this->stm->execute();
			
			header("Location: index.php");
			
					
			}catch(PDOException$e){
				echo$e->getMessage();
			}
		}
	
	public function Alterar($id,$nome,$idade,$endereco,$sexo,$cep)	{
		
		try{
			$objPessoa = new Pessoa($id,$nome,$idade,$endereco,$sexo,$cep);
			
			$pessoa = new Pessoa($_POST["id"],$_POST["nome"],$_POST["idade"],$_POST["endereco"],$_POST["sexo"],$_POST["cep"]);
			
			$sql = "update pessoa set  nome = :nome, idade = :idade, endereco = :endereco, sexo = :sexo ,cep = :cep  where id = :id";

			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objPessoa->getId());
			$this->stm->bindValue(":nome", $objPessoa->getNome());
			$this->stm->bindValue(":idade", $objPessoa->getIdade());
			$this->stm->bindValue(":endereco", $objPessoa->getEndereco());
			$this->stm->bindValue(":sexo", $objPessoa->getSexo());
			$this->stm->bindValue(":cep", $objPessoa->getCep());
			$this->stm->execute();
			
			header("Location: index.php");
			
					
		}catch(PDOException$e){
			echo$e->getMessage();
		}
	}
	
	public function excluir($id)	{
		
		try{
			$objPessoa = new Pessoa($id,null,null,null,null);
		
			$sql = "delete from pessoa where id = :id";
		
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objPessoa->getId());
			$this->stm->execute();

			header("Location: index.php");
			
		}catch(PDOException$e){
			echo$e->getMessage();
		}
	}
	
	
	public function listar()
	{
		try{
			$retorno = null;
			
			$sql = "select * from pessoa";
			$this->stm = $this->conn->prepare($sql);
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException $e){
			throw new MensagemTvException($e->getMessage());
		}
	}
	
	public function vizualizar($id)
	{
		try{
			$retorno = null;
			
			$objPessoa = new Pessoa($id,null,null,null,null);
			
			$sql = "select * from pessoa where id = :id";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objPessoa->getId());
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException $e){
			throw new MensagemTvException($e->getMessage());
		}
	}
}
	?>