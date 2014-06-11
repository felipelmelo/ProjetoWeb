<?php

	require_once 'RepositorioPessoa.php';	

	$pessoa = RepositorioPessoa::getInstancia()->Alterar($_POST['id'],$_POST['nome'],$_POST['idade'],$_POST['endereco'],$_POST['sexo'],$_POST['cep']);
	
?>