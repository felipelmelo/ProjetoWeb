<?php

	require_once 'repositorioEstabelecimento.php';
	
	$estabelecimento = RepositorioEstabelecimento::getInstancia()->excluir($_GET['id']);
	header("Location : exibirDados.php");
?>