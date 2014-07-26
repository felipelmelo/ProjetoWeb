<?php
	require_once('Estabelecimento.php');
	require_once('../Conexao/conexaoPDO.php');
	class RepositorioEstabelecimento{

	private $conn;
	
	private $stm;
	private static $instancia;
	
	private function __construct(){
		
		$this->conn = ConexaoPDO::getInstancia()->getDb();
	}
	
	public static function getInstancia(){
		if(!isset(self::$instancia))
			self::$instancia = new RepositorioEstabelecimento();
		return self::$instancia;
	}
	
	
	private function retornaObjeto($array){
		return new Estabelecimento($array["id_Produto"],$array["id_Estabelecimento"],$array["preco_produto");
	}
	
		
	public function inserir(id_Produto,id_Estabelecimento,preco_produto){
	
		
		try{
				
			$objEstabelecimento = new Estabelecimento(id_Produto,id_Estabelecimento,preco_produto);
			$sql = "INSERT INTO produto_has_estabelecimento (id_Produto,id_Estabelecimento,preco_produto)
						 values(:idEstabelecimento,:idProduto,:preco)";
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":idEstabelecimento", $objEstabelecimento->getIdProduto());
			$this->stm->bindValue(":idProduto", $objEstabelecimento->getIdEstabelecimento());
			$this->stm->bindValue(":preco", $objEstabelecimento->getPreco());
			$this->stm->execute();
			
			header("Location: listar.php");
			
					
			}catch(PDOException$e){
				echo$e->getMessage();
			}
		}
	
		//alterar depois
	public function Alterar(id_Produto,id_Estabelecimento,preco_produto)	{
		
		try{
			$objEstabelecimento = new Estabelecimento(id_Produto,id_Estabelecimento,preco_produto);
			
			$sql = "update produto_has_estabelecimento set  id_Produto = :idProduto, id_Estabelecimento = :idEstabelecimento,
			preco_produto = :preco
			where id_produto_has_estabelecimento = :id";

			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":idEstabelecimento", $objEstabelecimento->getIdProduto());
			$this->stm->bindValue(":idProduto", $objEstabelecimento->getIdEstabelecimento());
			$this->stm->bindValue(":preco", $objEstabelecimento->getPreco());
			$this->stm->execute();
			
			header("Location: listar.php");
			
					
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	public function excluir(id_Produto,id_Estabelecimento)	{
		
		try{
			$objEstabelecimento = new Estabelecimento(id_Produto,id_Estabelecimento,null);
		
			$sql = "delete from produto_has_estabelecimento where id_Produto = :idProduto, id_Estabelecimento = :idEstabelecimento";
		
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":idEstabelecimento", $objEstabelecimento->getIdProduto());
			$this->stm->bindValue(":idProduto", $objEstabelecimento->getIdEstabelecimento());
			$this->stm->execute();

			header("Location: listar.php");
			
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	
	public function listar()
	{
		try{
			$retorno = null;
			
			$sql = "select * from produto_has_estabelecimento";
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
	
	public function vizualizar(id_Produto,id_Estabelecimento)
	{
		try{
			$retorno = null;
			
			$objEstabelecimento = new Estabelecimento($id,null);
			
			$sql = "select * from produto_has_estabelecimento where id_Produto = :idProduto, id_Estabelecimento = :idEstabelecimento";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":idEstabelecimento", $objEstabelecimento->getIdProduto());
			$this->stm->bindValue(":idProduto", $objEstabelecimento->getIdEstabelecimento());
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException $e){
			throw $e->getMessage();
		}
	}
	
	public function VerificaEstabelecimento($nome)
	{
		try{
			$retorno = null;
			
			$objEstabelecimento = new Estabelecimento(null,$nome);
			
			$sql = "select * from produto_has_estabelecimento where id_Produto = :idProduto, id_Estabelecimento = :idEstabelecimento";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":idEstabelecimento", $objEstabelecimento->getIdProduto());
			$this->stm->bindValue(":idProduto", $objEstabelecimento->getIdEstabelecimento());
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