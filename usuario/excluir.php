<?php

	require_once 'RepositorioUsuario.php';	
			
	$pessoa = RepositorioUsuario::getInstancia()->excluir($_GET['id']);
?>