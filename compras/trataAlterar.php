<?php

	require_once 'RepositorioCategoria.php';	

	
	$nome = strtolower($_POST['nome']); 
	$Categoria = RepositorioCategoria::getInstancia()->VerificaCategoria($nome);
	if(!$Categoria){

		$Categoria = RepositorioCategoria::getInstancia()->Alterar($_POST['id'],$nome);
	}
	else 
	{
		echo "<script type=\"text/javascript\"> 
			alert(\"Categoria j� cadastrada\"); 
			window.location.href = \"listar.php\"; 			
			</script>";
	}
?>