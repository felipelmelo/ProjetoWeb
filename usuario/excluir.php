<?php

	require_once 'RepositorioPessoa.php';	
			
	$pessoa = RepositorioPessoa::getInstancia()->excluir($_GET['id']);
?>