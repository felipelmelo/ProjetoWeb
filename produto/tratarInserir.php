<?php

	require_once 'RepositorioProduto.php';

	
			$produto = RepositorioProduto::getInstancia()->inserir($_POST['nome_produto'],$_POST['fabricante_produto'],$_POST['especificacao_prod'],$_POST['id_categoria']);
	
		
	
	?>
  
  