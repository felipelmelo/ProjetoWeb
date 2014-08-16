<?php

	require_once 'RepositorioProduto.php';

	 
	  $produto = RepositorioProduto::getInstancia()->inserir($_POST['nome_produto'],$_POST['fabricante_produto'],$_POST['especificacao_prod'],$_POST['id_categoria']);
	
	 	echo "<script type=\"text/javascript\"> 
				alert(\"Produto cadastrado!\"); 
				window.location.href = \"frmProduto.php\"; 			
				</script>";
	 
  /*
	require_once 'RepositorioProduto.php';

	 $nome_produto = strtolower($_POST['nome_produto']);
	
	  $produto = RepositorioProduto::getInstancia()->inserir($_POST['nome_produto'],$_POST['fabricante_produto'],$_POST['especificacao_prod'],$_POST['id_categoria']);
	
	 	echo "<script type=\"text/javascript\"> 
				alert(\"Produto cadastrado!\"); 
				window.location.href = \"frmProduto.php\"; 			
				</script>";
	*/?>
  