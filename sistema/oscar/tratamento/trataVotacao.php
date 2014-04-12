<?php

list($temp, $idPergunta, $idResposta) = explode('-', $_POST['info']);

try{
	
	$usrLogado = $_SESSION['dados_usuario']['logado'];
	$res = ControladorUsuario::getInstancia()->respostaPorUsuarioePergunta($usrLogado, $idPergunta);

	if($res){ 
		ControladorUsuario::getInstancia()->cadastrarResposta($usrLogado, $idPergunta, $idResposta);		
		$retorno["status"] = "ok";
		$retorno["msg"] = "Voto cadastrado com sucesso!";
	}else{
		$retorno["status"] = "erro";
		$retorno["msg"] = utf8_encode("Você ja votou nesta categoria.");		
	}	
	$_SESSION['respondidas'][$_SESSION['dados_usuario']['logado']] = ControladorUsuario::getInstancia()->respostaPorUsuario($usrLogado);

	$retorno["contador"] = count($_SESSION['respondidas'][$usrLogado]);
		
}catch(ValidacaoException $e){
	$retorno["status"] = "error";
	$retorno["msg"] = 'Ocorreu um erro, tente novamente masi tarde.';
	echo $e->getMessage();
}catch(BancoException $e){
	$retorno["status"] = "error";
	$retorno["msg"] = 'Ocorreu um erro, tente novamente masi tarde.';
	echo $e->getMessage();
}catch(UsuarioException $e){
	$retorno["status"] = "error";
	$retorno["msg"] = 'Ocorreu um erro, tente novamente masi tarde.';
	echo $e->getMessage();
}

echo json_encode($retorno);
?>