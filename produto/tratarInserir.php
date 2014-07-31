<?php
	
	require_once 'RepositorioProduto.php';

	 $nome_produto = $_POST['nome_produto'];
	 $fabricante_produto = $_POST['fabricante_produto'];
	 $especificacao_prod = $_POST['especificacao_prod'];
	 $data_prod = $_POST['inclusao_dt_produto'];
	 $id_categoria = $_POST['id_categoria'];
	
	$Produto = RepositorioProduto::getInstancia()->VerificarProduto($nome_produto);
	if(!$Produto){
		$Produto = RepositorioProduto::getInstancia()->inserir(null,$nome_produto, $fabricante_produto, $especificacao_prod, $data_prod, $id_categoria);
	}
	else 
	{
		echo "<script type=\"text/javascript\"> 
			alert(\"Produto já cadastrada!\"); 
			window.location.href = \"inserir.php\"; 			
			</script>";
	}
?>