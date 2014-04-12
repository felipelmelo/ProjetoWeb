<?php 
if(empty($parametro1)){	
	header('Location: '.BASE_URL);die();
}

$hash = $parametro1;

try{	
	$retorno = ControladorUsuario::getInstancia()->hashIdDoUsuario($hash);	
	$res = ControladorUsuario::getInstancia()->respostaPorUsuario($retorno->getId());	
	$link = BASE_URL.'/escalacao/'.$hash.',index.php';
	
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
		<?php
			$redesFacebook = 'http://www.facebook.com/sharer.php?s=100&p[url]='.$link.'&p[images][0]='.BASE_URL.'/recomendar.jpg&p[title]='.iconv("ISO-8859-1","UTF-8","Veja minha escalação para o Oscar 2014").'&p[summary]='.iconv("ISO-8859-1","UTF-8","Veja minha escalação para o Oscar 2014").'';
			$redesTwitter = 'http://twitter.com/share?url='.$link.'&amp;text=' . iconv("ISO-8859-1","UTF-8","Veja minha escalação no Oscar 2014") . '&amp;hashtags=oscar2014';
		?>
		<a href="<?php echo $redesFacebook; ?>"><img src="<?php echo BASE_URL; ?>/img/facebook.png" alt=""></a> 
        <a href="<?php echo $redesTwitter; ?>"><img src="<?php echo BASE_URL; ?>/img/twitter.png" alt=""></a>
    </div>


</div><!-- opcoes-oscar -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>/resultado/js/resultado.js"></script>
<?php include(INCLUDES . '/inc.rodape.php'); ?>