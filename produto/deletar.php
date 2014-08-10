<?php

	require_once 'RepositorioProduto.php';	
			
	$Categoria = RepositorioProduto::getInstancia()->excluir($_GET['id']);
?>