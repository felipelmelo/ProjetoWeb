<?php

	require_once 'RepositorioCategoria.php';	

	
	$nome = strtolower($_POST['nome']); 
	if(!is_numeric(nome) || $nome == ""){
		$Categoria = RepositorioCategoria::getInstancia()->VerificaCategoria(utf8_decode($nome));
		if(!$Categoria){
	
			$Categoria = RepositorioCategoria::getInstancia()->Alterar($_POST['id'],utf8_decode($nome));
		}
		else 
		{
			echo "<script type=\"text/javascript\"> 
				alert(\"Categoria já cadastrada\"); 
				window.location.href = \"exibirCategoria.php\"; 			
				</script>";
		}
	}else{
		"<script type=\"text/javascript\"> 
				alert(\"Categoria já cadastrada\"); 
				window.location.href = \"frmCategoriaAlterar.php\"; 			
				</script>";
	}
?>