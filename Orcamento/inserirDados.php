<?php

require_once 'repositorioEstabelecimento.php';	


$Estabelecimento = RepositorioEstabelecimento::getInstancia()->inserir(null,utf8_decode($_POST['nomeFantasia']),utf8_decode($_POST['razaoSocial'])
,utf8_decode($_POST['logradouro']),$_POST['numero'],utf8_decode($_POST['complemento']),utf8_decode($_POST['cidade']),utf8_decode($_POST['bairro']),utf8_decode($_POST['estado']));
echo $Estabelecimento;

?>