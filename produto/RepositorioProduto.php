<?php

// THIS CLASS IS THE THE CONTROLLER
require_once('Produto.php');
require_once('../Conexao/conexaoPDO.php');


class RepositorioProduto {

	private $conn; //chamo a conexao

	private $stm; //statement - onde manipulo as consultas no banco 
	private static $instancia;


	function __construct(){

		$this->conn = ConexaoPDO::getInstancia()->getDB();
	}

	//eu acho que aqui eu faço a ligacao do repositorio com o banco de dados
	public static function getInstancia(){

		if (!isset(self::$instancia)) {
			self::$instancia = new RepositorioProduto();

		return self::$instancia;
		}
	}

	private function retornaObjeto($array){
		return new Produto($array["id_Produto"],
							$array["nome_produto"],
							$array["fabricante_produto"],
							$array["especificao_produto"],
							$array["inclusao_dt_produto"],
							$array["id_Categoria"]);
	}


	public function inserir($id, $nome_produto, $fabricante_produto, $especificacao_prod, $data_prod, $id_categoria){

		try {
			
			$objProduto = new Produto(null, $nome_produto, $fabricante_produto, $especificacao_prod, $data_prod, $id_categoria);
			$query_insert = "INSERT INTO produto (nome_produto, fabricante_produto, especificao_produto, inclusao_dt_produto, id_categoria)
						VALUES (:nome_produto, :fabricante_produto, :especificacao_prod, :inclusao_dt_produto, :id_categoria) ";

			$this->stm = $this->conn->prepare($query_insert);
			$this->stm->bindValue(":nome_produto", $objProduto->getNomeProd());
			$this->stm->bindValue(":fabricante_produto", $objProduto->getFabricanteProd());
			$this->stm->bindValue(":especificacao_prod", $objProduto->getEspecificacaoProd());
			$this->stm->bindValue(":inclusao_dt_produto", $objProduto->getDataProd());
			$this->stm->bindValue(":id_categoria", $objProduto->getIdCategoria());

			$this->stm->execute();

			//header("Location: listar.php");


		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function inserirProdEstab($id_produto, $id_estabelecimento, $preco){

		try {
			
			$objProdutoEstab = new Produto($id_produto, $id_estabelecimento, $preco);
			$query = "INSERT INTO produto_has_estabelecimento (id_produto, id_estabelecimento, preco_produto)
						VALUES (:id_produto, :id_estabelecimento, :preco) ";

			$this->stm = $this->conn->prepare($query);
			$this->stm->bindValue(":id_produto", $objProdutoEstab->getId());
			$this->stm->bindValue(":id_estabelecimento", $objProdutoEstab->getIdEstab());
			$this->stm->bindValue(":preco", $objProdutoEstab->getPreco());

			$this->stm->execute();
			////$this->stm->execute();

			//header("Location: listar.php");


		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function alterar($id,$nome_produto,$fabricante_produto,$especificacao_prod,$data_prod,$id_categoria)
	{
		try
		{
			$objProduto = new Produto($id,$nome_produto,$fabricante_produto,$especificacao_prod,$data_prod,$id_categoria);	
			$sqlUpdate = "UPDATE produto SET nome_produto = :nome_produto, fabricante_produto = :fabricante_produto, 
			especificao_produto = :especificao_produto, inclusao_dt_produto = :inclusao_dt_produto,id_categoria = :id_categoria
			WHERE id_Produto = :id_categoria";
			
			$this->stm = $this->conn->prepare($sqlUpdate);
			$this->stm->bindValue(":id_Produto", $objProduto->getId());
			$this->stm->bindValue(":nome_produto", $objProduto->getNomeProd());
			$this->stm->bindValue(":fabricante_produto", $objProduto->getFabricanteProd());
			$this->stm->binValue(":especificacao_prod", $objProduto->getEspecificacaoProd());
			$this->stm->bindValue(":inclusao_dt_produto", $objProduto->getDataProd());
			$this->stm->bindValue(":id_categoria", $objProduto->getIdCategoria());
			
			$this->stm->execute();
			
			header("Location: index.php"); //vai a pagina inicial
			
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}

	public function verificarProduto($nome_produto)
	{
		try{
			$retorno = null;
			
			$objProduto = new Produto(null,$nome_produto,null,null,null,null);
			
			$sql = "SELECT * FROM produto where nome_produto like :nome_produto";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":nome_produto", $objProduto->getNomeProd());
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);  //retornaObjeto é o método criado mais acima.
			}
			return $retorno;
			
		}catch(PDOException $e){
			throw $e->getMessage();
		}
	}

	public function listar()
	{
		try{
			$retorno = null;
			
			$sql = "select * from produto";
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


	public function visualizar($id)
	{
		try{
		$retorno = null;
		
		$objProduto = new Produto($id,null,null,null,null,null);
		
		$sql = "SELECT * FROM produto WHERE id_Produto = :id";
		
		$this->stm = $this->conn->prepare($sql);
		$this->stm->bindValue(":id_Produto", $objProduto->getId());
		$this->stm->execute();
		
		while($result = $this->stm->fetch(PDO::FETCH_ASSOC))
		{
			$retorno[]=$this->retornaObjeto($result);
		}
		return $retorno;
		
		}
		catch(PDOException $e)
		{
		//throw new MensagemTvException($e->getMessage());
		}
	}



	public function excluir($id)	{
		
		try{
			$objProduto = new Produto($id,null);
		
			$sql = "delete from produto where id_Produto = :id";
		
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id", $objProduto->getId());
			$this->stm->execute();

			header('Location:exibirProduto.php');
			
			
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	

}//fecha a classe
?>