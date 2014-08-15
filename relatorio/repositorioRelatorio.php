<?php

require_once ('../Conexao/ConexaoPDO.php');

class RepositorioRelatorio
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
			self::$instancia = new RepositorioRelatorio();
		return self::$instancia;
	}
	
	
	public function relProdutoEstabelecimento()
	{
		try
		{
			$retorno = null;
			$sqlRelProdutoEstabelecimento = "SELECT p.nome_produto,
												    pe.preco_produto,
											    	 e.nome_fantasia_estabelecimento
				   
												FROM produto_has_estabelecimento pe
												INNER JOIN produto p
												on p.id_produto = pe.id_produto
												inner join estabelecimento e 
												on e.id_estabelecimento = pe.id_estabelecimento";
			
			$this->stm = $this->conn->prepare($sqlRelProdutoEstabelecimento);
			$this->stm->execute();
			
			while ($result = $this->stm->fetch(PDO::FETCH_ASSOC))
			{
			
				$temp = array('nome_produto'=>$result['nome_produto'],'preco_produto'=>$result['preco_produto'],'nome_fantasia_estabelecimento'=>$result['nome_fantasia_estabelecimento']
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
}	
?>