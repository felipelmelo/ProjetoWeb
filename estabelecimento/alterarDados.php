<?php

	require_once 'repositorioEstabelecimento.php';	
	
	$estabelecimento = RepositorioEstabelecimento::getInstancia()->Alterar(utf8_decode($_POST['id']),utf8_decode($_POST['nomeFantasia']),utf8_decode($_POST['razaoSocial']),
utf8_decode($_POST['logradouro']),$_POST['numero'],utf8_decode($_POST['complemento']),utf8_decode($_POST['cidade']),utf8_decode($_POST['bairro']),utf8_decode($_POST['estado']));
	
?>

