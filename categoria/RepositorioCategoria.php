<?php
	require_once('Categoria.php');
	require_once('../Conexao/conexaoPDO.php');
	class RepositorioCategoria{

	private $conn;
	
	private $stm;
	private static $instancia;
	
	private function __construct(){
		
		$this->conn = ConexaoPDO::getInstancia()->getDb();
	}
	
	public static function getInstancia(){
		if(!isset(self::$instancia))
			self::$instancia = new RepositorioCategoria();
		return self::$instancia;
	}
	
	
	private function retornaObjeto($array){
		return new Categoria($array["id_Categoria_Produto"],$array["nome_categoria"]);
	}
	
		
	public function inserir($id,$nome){
	
		
		try{
				
			$objCategoria = new Categoria(null,$nome);
			$sql = "INSERT INTO categoria_produto (nome_categoria)
						 values(:nome)";
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":nome", $objCategoria->getNome());
			$this->stm->execute();
			
			header("Location: exibirCategoria.php");
			
					
			}catch(PDOException$e){
				echo$e->getMessage();
			}
		}
	
	public function Alterar($id,$nome)	{
		
		try{
			$objCategoria = new Categoria($id,$nome);
			
			$categoria = new Categoria($_POST["id"],$_POST["nome"]);
			
			$sql = "update categoria_produto set  nome_categoria = :nome 
			where id_Categoria_Produto = :id";

			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objCategoria->getId());
			$this->stm->bindValue(":nome", $objCategoria->getNome());
			$this->stm->execute();
			
			header("Location: exibirCategoria.php");
			
					
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	public function excluir($id)	{
		
		try{
			$objCategoria = new Categoria($id,null);
		
			$sql = "delete from categoria_produto where id_Categoria_Produto = :id";
		
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objCategoria->getId());
			$this->stm->execute();

			header("Location: exibirCategoria.php");
			
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	
	public function listar()
	{
		try{
			$retorno = null;
			
			$sql = "select * from categoria_produto";
			$this->stm = $this->conn->prepare($sql);
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	public function vizualizar($id)
	{
		try{
			$retorno = null;
			
			$objCategoria = new Categoria($id,null);
			
			$sql = "select * from categoria_produto where id_Categoria_Produto = :id";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objCategoria->getId());
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException $e){
			throw $e->getMessage();
		}
	}
	
	public function VerificaCategoria($nome)
	{
		try{
			$retorno = null;
			
			$objCategoria = new Categoria(null,$nome);
			
			$sql = "select * from categoria_produto where nome_categoria = :nome_categoria";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":nome_categoria", $objCategoria->getNome());
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException $e){
			throw $e->getMessage();
		}
	}
}
	?>