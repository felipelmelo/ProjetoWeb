<?php
	require_once('login.php');
	$validar = loginRepositorio::getInstancia()->login($_POST["login"],md5($_POST["senha"]));
	$tipo = $_SESSION["Login"]['tipo_usuario'];
	if($validar){
		if($tipo == 1){
			header("Location: ../usuario/exibirUsuario.php");
		}else{
			header("Location: ../categoria/exibirCategoria.php");
		}
	}
?>