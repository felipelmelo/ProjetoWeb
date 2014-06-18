<?php

	require_once 'RepositorioCategoria.php';	
	
	$nome = strtolower($_POST['nome']); 
	$Categoria = RepositorioCategoria::getInstancia()->VerificaCategoria($nome);
	if(!$Categoria){
		$Categoria = RepositorioCategoria::getInstancia()->inserir(null,$nome);
	}
	else 
	{
		echo "<script type=\"text/javascript\"> 
			alert(\"Categoria já cadastrada!\"); 
			window.location.href = \"inserir.php\"; 			
			</script>";
	}
?>