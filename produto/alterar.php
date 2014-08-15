<?php
	include_once 'RepositorioProduto.php';
	
	$id = $_POST['id'];
	$nome_produto = $_POST['nome_produto'];
	$fabricante = $_POST['fabricante'];
	$espec = $_POST['especificacao'];
	if(!is_numeric(nome) || $nome == ""){
		$Produto = RepositorioProduto::getInstancia()->Alterar($id, $nome_produto, $fabricante,$espec);
	}else{
		echo "<script type=\"text/javascript\"> 
				alert(\"Categoria já cadastrada\"); 
				window.location.href = \"frmCategoriaAlterar.php\"; 			
				</script>";
	}
?>