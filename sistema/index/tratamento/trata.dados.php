<?php	
	$_SESSION['dados_usuario']['id'] = $_POST['id'];
	$_SESSION['dados_usuario']['nome'] = $_POST['nome'];
	$_SESSION['dados_usuario']['tipo'] = $_POST['tipo'];
	echo json_encode('ok');
?>	
	