<?php

require_once 'repositorioEstabelecimento.php';	

$razaoSocial = $_POST['razaoSocial'];

if(!empty($razaoSocial))
{
	$Estabelecimento = RepositorioEstabelecimento::getInstancia()->VerificaEstabelecimento(utf8_decode($razaoSocial));

	if($Estabelecimento)
	{
		$Estabelecimento = RepositorioEstabelecimento::getInstancia()->Alterar($_POST['id'],utf8_decode($_POST['nomeFantasia']),utf8_decode($_POST['razaoSocial'])
        ,utf8_decode($_POST['logradouro']),$_POST['numero'],utf8_decode($_POST['complemento']),utf8_decode($_POST['cidade']),utf8_decode($_POST['bairro']),utf8_decode($_POST['estado']));
		
	}
	else
	{
		echo "<script type=\"text/javascript\"> 
				alert(\"Estabelecimento já cadastrada\"); 
				window.location.href = \"frmCategoriaAlterar.php\"; 			
				</script>";
	}
	
}
else{
		echo "<script type=\"text/javascript\"> 
				alert(\"Estabelecimento já cadastrada\"); 
				window.location.href = \"frmCategoriaAlterar.php\"; 			
				</script>";
	}

?>