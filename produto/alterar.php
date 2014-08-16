<?php
	include_once 'RepositorioProduto.php';
	
	$id = $_POST['id'];
	$nome_produto = $_POST['nome_produto'];
	$fabricante = $_POST['fabricante'];
	$espec = $_POST['especificacao'];
	$id_categoria = $_POST['id_categoria'];
	if(!is_numeric($nome_produto) || $nome_produto == ""){
		$Produto = RepositorioProduto::getInstancia()->Alterar($id, $nome_produto, $fabricante,$espec,$id_categoria);
	}else{
		echo "<script type=\"text/javascript\"> 
				alert(\"Produto já cadastrado\"); 
				</script>";
	}//window.location.href = \"frmCategoriaAlterar.php\"; 			
	
?>			