<?php

	require_once 'RepositorioUsuario.php';	

	if (strlen($_POST["senha"])<7) { 
			echo "<script type=\"text/javascript\"> 
			alert(\"Senha invalida\"); 
			window.location.href = \"exibirUsuario.php\"; 			
			</script>";
		}
	elseif (!eregi("^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$", $_POST["email"]) || is_null($_POST["email"])) { 
			echo "<script type=\"text/javascript\"> 
			alert(\"Email inválido\"); 
			window.location.href = \"exibirUsuario.php\"; 			
			</script>";
		} 
	elseif ($_POST['nome'] == "" || strlen($_POST['nome'])<14){
		echo "<script type=\"text/javascript\"> 
			alert(\"Nome não pode ser nulo ou com menos de 14 caracteres\"); 
			window.location.href = \"exibirUsuario.php\"; 			
			</script>";
	}
	elseif (strlen($_POST['Cpf'])!=11){
		echo "<script type=\"text/javascript\"> 
			alert(\"CPF Tem que ter 11 digitos\"); 
			window.location.href = \"exibirUsuario.php\"; 			
			</script>";
	}
	elseif (is_null($_POST['tipo_usuario'])){
		echo "<script type=\"text/javascript\"> 
			alert(\"Tipo de usuário não pode ser nulo\"); 
			window.location.href = \"exibirUsuario.php\"; 			
			</script>";
	}
	
	else{
		
		$Verifica = RepositorioUsuario::getInstancia()->VerificaCpf($_POST['Cpf']);
		if(!$Verifica){		
			$Usuario = RepositorioUsuario::getInstancia()->inserir(null,utf8_decode($_POST['nome']),$_POST['Cpf'],$_POST['email'],$_POST['senha'],$_POST['tipo_usuario']);
		}else{
			echo "<script type=\"text/javascript\"> 
				alert(\"Usuario já cadastado\"); 
				window.location.href = \"frmUsuario.php\"; 			
				</script>";
		}
	}		
?>