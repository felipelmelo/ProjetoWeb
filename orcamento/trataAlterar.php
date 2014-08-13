<?php

	require_once 'RepositorioOrcamento.php';	

	
	$nome = strtolower($_POST['nome']); 
	if(!is_numeric(nome) || $nome == ""){
		$Orcamento = RepositorioOrcamento::getInstancia()->VerificaOrcamento(utf8_decode($nome));
		if(!$Orcamento){
	
			$Orcamento = RepositorioOrcamento::getInstancia()->Alterar($_POST['id'],utf8_decode($nome));
		}
		else 
		{
			echo "<script type=\"text/javascript\"> 
				alert(\"Orcamento já cadastrada\"); 
				window.location.href = \"exibirOrcamento.php\"; 			
				</script>";
		}
	}else{
		"<script type=\"text/javascript\"> 
				alert(\"Orcamento já cadastrada\"); 
				window.location.href = \"frmOrcamentoAlterar.php\"; 			
				</script>";
	}
?>