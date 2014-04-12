<?php 
if(!ControladorUsuario::estaCadastrado()){
	header('Location: '.BASE_URL);die();
}

try{	
	$res = ControladorUsuario::getInstancia()->respostaPorUsuario($_SESSION['dados_usuario']['logado']);	
	$r = ControladorUsuario::getInstancia()->geraImagemBolao($_SESSION['dados_usuario']['logado']);
	$link = BASE_URL.'/apaostas/'.$r;
	
}catch(UsuarioException $e){
	//echo $e->getMessage();
}catch(BancoException $e){
	//echo $e->getMessage();
}catch(ValidacaoException $e){
	//echo $e->getMessage();
}

include(INCLUDES . '/inc.topo.php'); 
include(INCLUDES . '/inc.perguntas.php');
?>
<div id="compartilhe" class="content">

    <h1><span>Compartilhe seu palpite:</span></h1>

		
    <div id="item-ator" class="box-opcoes-oscar">
		<?php 
			foreach($res as $votos){ 
				$iPergunda = $votos['pergunta_id'] - 1;
				$iResposta = $votos['resposta_id'] - 1;
		?>
			<div id="melhor-ITEM.ESCOLHIDO-1" class="opcoes-oscar">
				<div class="item">
					<div class="mask-foto"><img src="<?php echo BASE_URL.'/'.$arrPerguntas[$iPergunda]['respostas'][$iResposta]['foto']; ?>" height="155" width="155" alt=""></div>
						<div class="desc">
							<span><?php echo $arrPerguntas[$iPergunda]['pergunta']['nome']; ?></span>
							<h2><?php echo $arrPerguntas[$iPergunda]['respostas'][$iResposta]['nome']; ?></h2>
						</div>
					</div>
			</div>
		<?php } ?>
		
		
    <div style="text-align:center">
        <h4 class="tit-cor">COMPARTILHE</h4>
		<?php /*
        <a href="javascript:;"><img id="compartilharFace" src="<?php echo BASE_URL; ?>/img/facebook.png" alt=""></a> 
        <a href="javascript:;"><img id="compartilharTwitter" src="<?php echo BASE_URL; ?>/img/twitter.png" alt=""></a>
		*/ ?>
		
		<a href="javascript:;"><img src="<?php echo BASE_URL; ?>/img/facebook.png" alt=""></a> 
        <a href="javascript:;"><img src="<?php echo BASE_URL; ?>/img/twitter.png" alt=""></a>
    </div>


</div><!-- opcoes-oscar -->
<script>
	var fotoFinal = '<?php echo $link; ?>';
</script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/resultado/js/resultado.js"></script>
<?php include(INCLUDES . '/inc.rodape.php'); ?>