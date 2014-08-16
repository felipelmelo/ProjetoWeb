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



	
	public function Alterar($id, $nome_produto, $fabricante_produto, $especificacao_prod, $id_categoria)	{
		
		try{
		
			$objProduto = new Produto($id,$nome_produto,$fabricante_produto,$especificacao_prod,null,$id_categoria,null,null);
			$sql = "update produto set nome_produto = '$nome_produto', fabricante_produto = '$fabricante_produto', especificao_produto = '$especificacao_prod',
			id_categoria = $id_categoria where id_Produto= $id";
				
			$this->stm = $this->conn->prepare($sql);
			
			$this->stm->execute();
			
			header("Location: exibirProduto.php");
			
					
		}catch(PDOException$e){
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

			header("Location: exibirProdutoEstabelecimento.php");


		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


	public function verificarProduto($nome_produto)
	{
		try{
			$retorno = null;
			
			$objProduto = new Produto(null,$nome_produto,null,null,null,null,null,null);
			
			$sql = "SELECT * FROM produto where nome_produto = :nome_produto";
			
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":nome_produto", $objProduto->getNomeProd());
			$this->stm->execute();
			
			while($result = $this->stm->fetch(PDO::FETCH_ASSOC)){
				$retorno[]=$this->retornaObjeto($result);
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
		
		$objProduto = new Produto($id,null,null,null,null,null,null,null);;
		
		$sql = "SELECT * FROM produto WHERE id_Produto = :id_Produto";
		
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
		 echo "erro";
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
	
	public function listarPreco($idCategoria)
		{
		try{
			$retorno = null;
			
			$sql = "select * from ";
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
	
	public function ProdutoEstabelecimento()
	{
		try
		{
			$retorno = null;
			$sqlProdutoEstabelecimento = "SELECT p.nome_produto,
												    pe.preco_produto,
											    	 e.nome_fantasia_estabelecimento,
													 pe.id_Produto,
													 pe.id_Estabelecimento
				   
												FROM produto_has_estabelecimento pe
												INNER JOIN produto p
												on p.id_produto = pe.id_produto
												inner join estabelecimento e 
												on e.id_estabelecimento = pe.id_estabelecimento";
			
			$this->stm = $this->conn->prepare($sqlProdutoEstabelecimento);
			$this->stm->execute();
			
			while ($result = $this->stm->fetch(PDO::FETCH_ASSOC))
			{
			
				$temp = array('nome_produto'=>$result['nome_produto'],'preco_produto'=>$result['preco_produto'],'nome_fantasia_estabelecimento'=>$result['nome_fantasia_estabelecimento'],
				'id_Estabelecimento'=>$result['id_Estabelecimento'],'id_Produto'=>$result['id_Produto']
				);
				$retorno[] = $temp;
			}
			return $retorno;
		}
		catch(PDOException $e)
		{
			echo "erro"; 
		}
	}
		public function visualizarProdutoPreco($idProduto,$idEstabelecimento)
	{
		try
		{
			$retorno = null;
			$sqlProdutoEstabelecimento = "SELECT p.nome_produto,
												    pe.preco_produto,
											    	 e.nome_fantasia_estabelecimento,
													 pe.id_Produto,
													 pe.id_Estabelecimento
				   
												FROM produto_has_estabelecimento pe
												INNER JOIN produto p
												on p.id_produto = pe.id_produto
												inner join estabelecimento e 
												on e.id_estabelecimento = pe.id_estabelecimento
												where pe.id_Produto = " . $idProduto . " and pe.id_Estabelecimento = " . $idEstabelecimento;
			//echo $sqlProdutoEstabelecimento;
			//die();
			$this->stm = $this->conn->prepare($sqlProdutoEstabelecimento);
			$this->stm->execute();
			
			while ($result = $this->stm->fetch(PDO::FETCH_ASSOC))
			{
			
				$temp = array('nome_produto'=>$result['nome_produto'],'preco_produto'=>$result['preco_produto'],'nome_fantasia_estabelecimento'=>$result['nome_fantasia_estabelecimento'],
				'id_Estabelecimento'=>$result['id_Estabelecimento'],'id_Produto'=>$result['id_Produto']
				);
				$retorno[] = $temp;
			}
			return $retorno;
		}
		catch(PDOException $e)
		{
			echo "erro"; 
		}
	}
	
	public function AlterarPreco($idProduto, $idEstabelecimento, $preco)	{
		
		try{
			$objProduto = new Produto($idProduto,null,null,null,null,null,$idEstabelecimento, $preco);
			
			$sql = "update produto_has_estabelecimento set  preco_produto = :preco 
			where id_Produto= :id_produto and id_estabelecimento = :id_estabelecimento";

			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id_produto", $objProduto->getId());
			$this->stm->bindValue(":id_estabelecimento", $objProduto->getIdEstab());
			$this->stm->bindValue(":preco", $objProduto->getPreco());
			$this->stm->execute();
			
			header("Location: exibirProdutoEstabelecimento.php");
			
					
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}
	public function excluirProdutoPreco($idProduto, $idEstabelecimento)	{
		
		try{
			$objProduto = new Produto($idProduto,null,null,null,null,null,$idEstabelecimento,null);
		
			$sql = "delete from produto_has_estabelecimento where id_Produto= :id_produto and id_estabelecimento = :id_estabelecimento";
		
			$this->stm = $this->conn->prepare($sql);
			$this->stm->bindValue(":id_produto", $objProduto->getId());
			$this->stm->bindValue(":id_estabelecimento", $objProduto->getIdEstab());
			$this->stm->execute();

			header('Location: exibirProdutoEstabelecimento.php');
			
			
		}catch(PDOException$e){
			echo $e->getMessage();
		}
	}

		public function inserir($nome,$fabricante,$especificacao,$id_categoria){
	
		try{
		
			$objProduto = new Produto(null, $nome, $fabricante, $especificacao, null, $id_categoria,null,null);
			$query_insert = "INSERT INTO produto (nome_produto, fabricante_produto, especificao_produto, inclusao_dt_produto, id_categoria)
						VALUES (:nome_produto, :fabricante_produto, :especificacao_prod, now(), :id_Categoria) ";

			$this->stm = $this->conn->prepare($query_insert);
			$this->stm->bindValue(":nome_produto", $objProduto->getNomeProd());
			$this->stm->bindValue(":fabricante_produto", $objProduto->getFabricanteProd());
			$this->stm->bindValue(":especificacao_prod", $objProduto->getEspecificacaoProd());
			$this->stm->bindValue(":id_Categoria", $objProduto->getIdCategoria());

			$this->stm->execute();

			header("Location: exibirProduto.php");


		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		}
}//fecha a classe
?>