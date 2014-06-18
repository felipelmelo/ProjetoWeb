<?php

	require_once 'RepositorioUsuario.php';	

	$Verifica = RepositorioUsuario::getInstancia()->VerificaCpf($_POST['Cpf']);
	if(!$Verifica){		
		$Usuario = RepositorioUsuario::getInstancia()->inserir(null,$_POST['nome'],$_POST['Cpf'],$_POST['email'],$_POST['senha'],$_POST['tipo_usuario']);
	}else{
		echo "<script type=\"text/javascript\"> 
			alert(\"Usuario já cadastado\"); 
			window.location.href = \"inserir.php\"; 			
			</script>";
	}
	
?>