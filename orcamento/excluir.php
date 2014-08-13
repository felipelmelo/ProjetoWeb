<?php

	require_once 'RepositorioOrcamento.php';	
			
	$Orcamento = RepositorioOrcamento::getInstancia()->excluir($_GET['id']);
?>