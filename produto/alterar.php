<?php
	include_once 'RepositorioProduto.php';
	
	$id = $_POST['id'];
	$nome_produto = $_POST['nome_produto'];
	$fabricante = $_POST['fabricante'];
	$espec = $_POST['especificacao'];
	$id_categoria = $_POST['id_categoria'];
	$Produto = RepositorioProduto::getInstancia()->Alterar($id, $nome_produto, $fabricante,$espec,$id_categoria);
		
?>			

