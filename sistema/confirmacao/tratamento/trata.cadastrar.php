<?php	
	try{
		$id 	= $_SESSION['dados_usuario']['id'];
		$nome 	= $_SESSION['dados_usuario']['nome'];
		$fone   = $_POST['strTelefone'];
		if($fone == ''){
			$arrResp['st'] = 'erro';
			$arrResp['msg'] = 'Informe seu telefone!';
		}else{
			

			$dados = ControladorUsuario::getInstancia()->verificarCadastro($id);
			if($dados !== null){
				$_SESSION['dados_usuario']['logado'] = $dados->getId();
				$_SESSION['dados_usuario']['cadastrado'] = true;				
				$arrResp['st'] = 'red';
				$arrResp['msg'] = 'Já possui cadastro!';
			}else{		
				$novoUsuario = ControladorUsuario::getInstancia()->adicionar($nome,$id,$fone);		
				$_SESSION['dados_usuario']['logado'] = $novoUsuario;		
				$_SESSION['dados_usuario']['cadastrado'] = true;		
				$arrResp['st'] = 'ok';
				$arrResp['msg'] = 'Cadastrado com sucesso!';
			}
		}
		
	}catch(ValidacaoException $e){
		$arrResp['st'] = 'cadastrado';	
		$arrResp['msg'] = $e->getMessage();
	}catch(UsuarioException $e){
		$arrResp['st'] = 'erro';
		$arrResp['msg'] = $e->getMessage();
	}catch(BancoException $e){
		$arrResp['st'] = 'erro';
		$arrResp['msg'] = $e->getMessage();
	}
	echo json_encode($arrResp);	
?>	