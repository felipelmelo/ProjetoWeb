<?php

	require_once 'RepositorioProduto.php';	
			
	$Produto = RepositorioProduto::getInstancia()->excluir($_GET['id']);
?>