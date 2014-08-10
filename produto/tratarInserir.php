<?php

	require_once 'RepositorioProduto.php';

	 $nome_produto = $_POST['nome_produto'];
	 $fabricante_produto = $_POST['fabricante_produto'];
	 $especificacao_prod = $_POST['especificacao_prod'];
	 $data_prod = $_POST['inclusao_dt_produto'];
	 $id_categoria = $_POST['id_categoria'];
		
	// $Produto = RepositorioProduto::getInstancia()->VerificarProduto($nome_produto);
	// echo "azcac".$Produto;
	// if(!$Produto){
	// 	$Produto = RepositorioProduto::getInstancia()->inserir(null,$nome_produto, $fabricante_produto, $especificacao_prod, $data_prod, $id_categoria);
	// 	echo "<script type=\"text/javascript\"> 
	// 		alert(\"Produto cadastrado com sucesso!\"); 
	// 		window.location.href = \"frmProduto.php\"; 			
	// 		</script>";
	// }
	// else 
	// {
	// 	echo "<script type=\"text/javascript\"> 
	// 		alert(\"Produto já cadastrado!\"); 
	// 		window.location.href = \"frmProduto.php\"; 			
	// 		</script>";
	// }

 
	 $Produto = RepositorioProduto::getInstancia()->inserir(null,$nome_produto, $fabricante_produto,$especificacao_prod, $data_prod, $id_categoria);
	 
	 if (!$Produto) {
	 	echo "<script type=\"text/javascript\"> 
				alert(\"Produto cadastrado!\"); 
				window.location.href = \"frmProduto.php\"; 			
				</script>";
	 }else{
	 	echo "<script type=\"text/javascript\"> 
				alert(\"Produto não cadastrado!\"); 
				window.location.href = \"frmProduto.php\"; 			
				</script>";
	 }
  ?>