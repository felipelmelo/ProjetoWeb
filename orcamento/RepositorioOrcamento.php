<?php
	require_once('Orcamento.php');
	require_once('../Conexao/conexaoPDO.php');
	class RepositorioOrcamento{

	private $conn;
	
	private $stm;
	private static $instancia;
	
	private function __construct(){
		
		$this->conn = ConexaoPDO::getInstancia()->getDb();
	}
	
	public static function getInstancia(){
		if(!isset(self::$instancia))
			self::$instancia = new RepositorioOrcamento();
		return self::$instancia;
	}
	
	
	private function retornaObjeto($array){
		return new Orcamento($array["id_orcamento"],$array["qtd_produto_vc_orcamento"],$array["id_usuario"],$array["id_produto"]);
	}
		
	public function inserir($id,$qtd,$idUsuario,$idProduto){
	
		
		try{
			$objOrcamento = new Orcamento(null,$qtd,$idUsuario,$idProduto);
			$sql = "INSERT INTO Orcamento_historico (qtd_produto_vc_orcamento, id_usuario,id_produto)
						 values(:qtd,:idUsuario,:idProduto)";
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":qtd", $objOrcamento->getQtd());
			$this->stm->bindValue(":idUsuario", $objOrcamento->getIdUsuario());
			$this->stm->bindValue(":idProduto", $objOrcamento->getIdProduto());
			$this->stm->execute();
			
			header("Location: frmOrcamento.php");
			
					
			}catch(PDOException$e){
				echo$e->getMessage();
			}
		}
	
	public function Alterar($id,$nome)	{
		
		try{
			$objOrcamento = new Orcamento($id,$nome);
			
			$Orcamento = new Orcamento($_POST["id"],$_POST["nome"]);
			
			$sql = "update Orcamento_historico set  nome_Orcamento = :nome 
			where id_Orcamento_Produto = :id";

			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objOrcamento->getId());
			$this->stm->bindValue(":nome", $objOrcamento->getNome());
			$this->stm->execute();
			
			header("Location: exibirOrcamento.php");
			
					
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	
	public function excluir($id)	{
		
		try{
			$objOrcamento = new Orcamento($id,null);
		
			$sql = "delete from Orcamento_historico where id_Orcamento = :id";
		
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objOrcamento->getId());
			$this->stm->execute();

			header("Location: exibirOrcamento.php");
			
		}catch(PDOException$e){
			echo "erro";
		}
	}
	
	
	public function listar()
	{
		try{
			$retorno = null;
			
			$sql = "select * from Orcamento_historico";
			$this->stm = $this->conn->prepare($sql);
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException $e){
			echo "erro";
		}
	}
	
	public function vizualizar($id)
	{
		try{
			$retorno = null;
			
			$objOrcamento = new Orcamento($id,null,null,null);
			
			$sql = "select * from Orcamento_historico where id_orcamento = :id";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objOrcamento->getId());
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException $e){
			echo "erro";
		}
	}
	
	
}
	?>