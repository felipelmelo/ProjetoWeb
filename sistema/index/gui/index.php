<?php
if(isset($_REQUEST['oauth_verifier']) && $_REQUEST['oauth_verifier'] != ''){
	try{
		if(isset($_SESSION['request_token']) && $_SESSION['request_token'] != ''){				
			$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_token_secret']);
			$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
			if($access_token)
			{
				$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);		
				$content = $connection->get('account/verify_credentials',array('include_entities'=>'false'));

				if($content && isset($content->screen_name) && isset($content->name))
				{					
					$_SESSION['dados_usuario']['id'] = $content->id;
					$_SESSION['dados_usuario']['nome'] = $content->name;
					$_SESSION['dados_usuario']['tipo'] = 'Twitter';
					header('Location: '.BASE_URL.'/confirmacao');
				}
			}
		}
	}catch(Exception $e){
		//echo $e->getMessage();
	}
}else{
	try{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
		$request_token = $connection->getRequestToken(OAUTH_CALLBACK);

		if(	$request_token)
		{			
			$token = $request_token['oauth_token'];
			$_SESSION['request_token'] = $token ;
			$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];

			switch ($connection->http_code) 
			{
				case 200:
					$url = $connection->getAuthorizeURL($request_token['oauth_token']);
					break;
				default:
					$url = 'javascript:;';
					break;
			}

		}
	}catch(Exception $e){
		//echo $e->getMessage();
	}
}
?>
<?php include(INCLUDES . '/inc.topo.php'); ?>
<div class="content">

    <h1><span>Acesse com:</span></h1>

    <div class="col-4" style="padding-top:38px;" id="logarFacebook">
        <a href="javascript:;"><img src="<?php echo BASE_URL; ?>/img/facebook.png" alt=""></a>

    </div>
    <div class="col-4" style="padding-top:38px"; id="logarTweet">
        <a href="<?php echo $url; ?>"><img src="<?php echo BASE_URL; ?>/img/twitter.png" alt=""></a>
    </div>
    <div class="col-4">
        <h4 class="tit-cor">CADASTRE-SE</h4>
        <form action="" class="form">
            <p><input type="text" placeholder="Nome" id="strNome" name="strNome"></p>
            <p><input type="text" placeholder="E-mail" id="strEmail" name="strEmail"></p>
            <p><input id="bt_prosseguir" type="submit" class="botao-padrao" value="Prosseguir"></p>
        </form>
    </div>
</div><!-- opcoes-oscar -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>/index/js/index.js"></script>
<?php include(INCLUDES . '/inc.rodape.php'); ?>