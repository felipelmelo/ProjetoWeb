<?php
	
	require_once 'RepositorioProduto.php';
		
	
	$nome_produto = strtolower($_POST['nome_produto']); 
	$Produto = RepositorioProduto::getInstancia()->VerificarProduto($nome_produto);
	if(!$Produto){
		$Produto = RepositorioProduto::getInstancia()->inserir(null, $id $nome_produto, $fabricante_produto, 
			$especificacao_prod, $data_prod, $id_categoria);
	}
	else 
	{
		echo "<script type=\"text/javascript\"> 
			alert(\"Produto já cadastrada!\"); 
			window.location.href = \"inserir.php\"; 			
			</script>";
	}
?>