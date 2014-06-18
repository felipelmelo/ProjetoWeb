<?php

	require_once 'RepositorioUsuario.php';	

	$Verifica = RepositorioUsuario::getInstancia()->VerificaCpf($_POST['Cpf']);
	if($Verifica != null){
		if($_POST["id"] != $Verifica['id_usuario']){
							
			echo "<script type=\"text/javascript\"> 
			alert(\"Usuario já cadastado\"); 
			window.location.href = \"listar.php\"; 			
			</script>";
		}	
	else{
		$Usuario = RepositorioUsuario::getInstancia()->Alterar($_POST['id'],$_POST['nome'],$_POST['Cpf'],$_POST['email'],$_POST['senha'],$_POST['tipo_usuario']);
		
		}
	}
	else{
		$Usuario = RepositorioUsuario::getInstancia()->Alterar($_POST['id'],$_POST['nome'],$_POST['Cpf'],$_POST['email'],$_POST['senha'],$_POST['tipo_usuario']);
		
		}
	
?>