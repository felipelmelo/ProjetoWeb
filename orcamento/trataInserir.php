<?php

	require_once 'RepositorioOrcamento.php';	
		
		session_start();
		var_dump($_POST);
		$id_usuario = $_SESSION["Login"]["id_usuario"];	
		$Orcamento = RepositorioOrcamento::getInstancia()->inserir(null,$_POST["qtd"],$id_usuario,$_POST["idProduto"]);
		
?>