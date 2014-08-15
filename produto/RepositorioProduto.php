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
			
			$objProduto = new Produto(null, $id, $nome_produto, $fabricante_produto, $especificacao_prod, $data_prod, $id_categoria);
			$query_insert = "INSERT INTO porduto (nome_produto, fabricante_produto, especificacao_prod, data_prod, id_categoria)
						VALUES (:nome_produto, :fabricante_produto, :especificacao_prod, :inclusao_dt_produto, :id_Categoria) ";

			$this->stm = $this->conn->prepare($query_insert);
			$this->stm->binValue(":nome_produto", $objProduto->getNomeProd());
			$this->stm->binValue(":fabricante_produto", $objProduto->getFabricanteProd());
			$this->stm->binValue(":especificacao_prod", $objProduto->getEspecificacaoProd());
			$this->stm->binValue(":inclusao_dt_produto", $objProduto->getDataProd());
			$this->stm->binValue(":id_Categoria", $objProduto->getIdCategoria());

			$this->execute();

			header("Location: listar.php");


		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public function inserirProdEstab($id_produto, $id_estabelecimento, $preco){

		try {
			$objProdutoEstab = new Produto($id_produto,null,null,null,null,null,$id_estabelecimento, $preco);
			$query = "INSERT INTO produto_has_estabelecimento (id_produto, id_estabelecimento, preco_produto)
						VALUES (:id_produto, :id_estabelecimento, :preco) ";

			$this->stm = $this->conn->prepare($query);
			$this->stm->bindValue(":id_produto", $objProdutoEstab->getId());
			$this->stm->bindValue(":id_estabelecimento", $objProdutoEstab->getIdEstab());
			$this->stm->bindValue(":preco", $objProdutoEstab->getPreco());

			$this->stm->execute();
			////$this->stm->execute();

			header("Location: exibirProduto.php");


		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


	public function verificarProduto($nome_produto)
	{
		try{
			$retorno = null;
			
			$objProduto = new Produto(null,$nome_produto);
			
			$sql = "SELECT * FROM produto where nome_produto like :nome_produto";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":nome_produto", $objProduto->getNomeProd());
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornarObjeto($result);
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

	public function listarPorCategoria($idCategoria)
		{
		try{
			$retorno = null;
			
			$sql = "select * from produto inner join categoria_produto on categoria_produto.id_Categoria_Produto = produto.id_Categoria and categoria_produto.id_Categoria = :idCategoria";
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":idCategoria", $idCategoria);
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
			}
			return $retorno;
			
		}catch(PDOException$e){
			echo $e->getMessage();
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