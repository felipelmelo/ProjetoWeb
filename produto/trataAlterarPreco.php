<?php
	include_once 'RepositorioProduto.php';
	
	$Produto = RepositorioProduto::getInstancia()->AlterarPreco($_POST['idProduto'], $_POST['idEstabelecimento'], $_POST['preco']);
	
	
?>