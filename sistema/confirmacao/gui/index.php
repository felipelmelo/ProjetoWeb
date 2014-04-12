<?php 
if(!ControladorUsuario::existeSecao()){
	header('Location: '.BASE_URL);die();
}

if(ControladorUsuario::estaCadastrado()){
	header('Location: '.BASE_URL.'/oscar');die();
}

include(INCLUDES . '/inc.topo.php'); 
?>
	<div class="content">
		<h1><span>Confirme seus dados:</span></h1>
		<form action="" class="form">
			<div class="col-2">
				<h4 class="tit-cor">Nome</h4>
				<?php echo !empty($_SESSION['dados_usuario']['nome']) ? $_SESSION['dados_usuario']['nome'] : ''; ?>
			</div>

			<?php 			
			$arrVal = array('Facebook', 'Twitter');			
			if(!in_array($_SESSION['dados_usuario']['tipo'], $arrVal)){ ?>	
				<div class="col-2">
					<h4 class="tit-cor">E-mail</h4>
					<?php echo !empty($_SESSION['dados_usuario']['id']) ? $_SESSION['dados_usuario']['id'] : ''; ?>
				</div>
			<?php 
			}
			?>
			<div class="col-2">
				<h4 class="tit-cor">Informe seu telefone:</h4>
				<input type="text" onkeypress="return mask(this, event,'(##)####-####')" id="strFone" name="strFone">
			</div>

			<div class="col-2">
				<input id="bt_voltar" type="submit" class="botao-padrao" value="Voltar">				
			</div>

			<div class="col-2">
				<input id="bt_cadstrar" type="submit" class="botao-padrao" value="Prosseguir">
			</div>

		</form>	
	</div><!-- content -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>/confirmacao/js/confirmacao.js"></script>
<?php include(INCLUDES . '/inc.rodape.php'); ?>