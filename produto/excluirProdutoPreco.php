<?php

	require_once 'RepositorioProduto.php';	
			
	$Produto = RepositorioProduto::getInstancia()->excluirProdutoPreco($_GET['idProduto'], $_GET['idEstabelecimento']);
?>