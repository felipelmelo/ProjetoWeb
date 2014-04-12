<?php
if(!ControladorUsuario::existeSecao()){
	header('Location: '.BASE_URL);die();
}

$cont = ControladorUsuario::getInstancia()->respostaPorUsuario($_SESSION['dados_usuario']['logado']);
if(count($cont) == 10){
	header('Location: '.BASE_URL.'/resultado/');die();
}

$arrRespondidas= array();
if(!empty($_SESSION['respondidas'][$_SESSION['dados_usuario']['logado']])){
	foreach($_SESSION['respondidas'][$_SESSION['dados_usuario']['logado']] as $idPerguntasRespondidas){
		if(!in_array($idPerguntasRespondidas['pergunta_id'], $arrRespondidas)){
			$arrRespondidas[] = $idPerguntasRespondidas['pergunta_id'];
		}		
		
	}
}

include(INCLUDES . '/inc.topo.php');
include(INCLUDES . '/inc.perguntas.php');
// jogar um random nas perguntas
shuffle($arrPerguntas);
$qtdPerguntas = count($arrPerguntas) - 1;
?>
<div class="jcarousel-wrapper">
    <!-- Carousel -->
    <div class="jcarousel">
        <ul id="menu">

            <?php for ($i = 0; $i <= $qtdPerguntas; $i++) : ?>
                <li>
                    <a href="#item-<?php echo UTIL::formatarTituloParaUrl($arrPerguntas[$i]['pergunta']['nome']) ?>">
                        <img src="<?php echo BASE_URL.'/'.$arrPerguntas[$i]['pergunta']['foto']; ?>" alt="<?php echo $arrPerguntas[$i]['pergunta']['nome']; ?>">
                        <h3><?php echo $arrPerguntas[$i]['pergunta']['nome']; ?></h3>
                    </a>
                </li>
            <?php endfor; ?>
            <li>		
        </ul>
    </div>

    <!-- Prev/next controls -->
    <a href="#" class="jcarousel-control-prev"><img src="<?php echo BASE_URL; ?>/img/seta-esquerda.png" height="43" width="24" alt=""></a>
    <a href="#" class="jcarousel-control-next"><img src="<?php echo BASE_URL; ?>/img/seta-direita.png" height="43" width="24" alt=""></a>

    <!-- Pagination -->
    <!--<p class="jcarousel-pagination"></p>-->

</div><!-- jcarousel-wrapper -->

<div class="content">
    <?php
    for ($i = 0; $i <= $qtdPerguntas; $i++) :
        $qtdRespostas = count($arrPerguntas[$i]['respostas']) - 1;
        // random nas respostas
        shuffle($arrPerguntas[$i]['respostas']);
	?>
        <div id="item-<?php echo UTIL::formatarTituloParaUrl($arrPerguntas[$i]['pergunta']['nome']) ?>" class="box-opcoes-oscar">
		<?php	if(!in_array($arrPerguntas[$i]['pergunta']['id'], $arrRespondidas)){  ?>	
            <h1><span><?php echo $arrPerguntas[$i]['pergunta']['nome']; ?></span></h1>

            <?php for ($j = 0; $j <= $qtdRespostas; $j++) : ?>
                <div id="melhor-<?php echo UTIL::formatarTituloParaUrl($arrPerguntas[$i]['pergunta']['id']) ?>-<?php echo $arrPerguntas[$i]['respostas'][$j]['id']; ?>" class="opcoes-oscar">
                    <a href="javascript:;">
                        <div class="mask-foto">
                            <img src="<?php echo BASE_URL.'/'.$arrPerguntas[$i]['respostas'][$j]['foto']; ?>" height="155" width="155" alt="<?php echo $arrPerguntas[$i]['respostas'][$j]['nome']; ?>">
                        </div>
                        <div class="desc">
                            <h2><?php echo $arrPerguntas[$i]['respostas'][$j]['nome']; ?></h2>
                            <p><?php echo $arrPerguntas[$i]['respostas'][$j]['texto']; ?></p>
                        </div>
                    </a>
                </div>
            <?php endfor; ?>
			
		<?php }else{ ?>	
			<h3 style="text-align:center;">VOCÊ JÁ VOTOU NESTA CATEGORIA!</h3>
		<?php } ?>
        </div><!--opcoes-oscar -->			
	<?php endfor; ?>
</div><!--content -->

<script type="text/javascript" src="<?php echo BASE_URL; ?>/oscar/js/index.js"></script>
<?php include(INCLUDES . '/inc.rodape.php'); ?>
