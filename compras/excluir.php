<?php

	require_once 'RepositorioCategoria.php';	
			
	$Categoria = RepositorioCategoria::getInstancia()->excluir($_GET['id']);
?>