<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Oscar 2014</title>
		
		<meta property="og:locale" content="pt_BR" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Blog Social 1 | Oscar 2014" />
		<meta property="og:url" content="http://blogs.ne10.uol.com.br/social1/oscar/" />
		<meta property="og:site_name" content="Blog Social 1 - Oscar 2014" />
		<meta property="article:publisher" content="https://www.facebook.com/oblogsocial1" />
		<meta property="og:image" content="http://blogs.ne10.uol.com.br/social1/oscar/recomendar.jpg" />      


	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
		<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script> 	
		<script src="<?php echo BASE_URL; ?>/js/jquery.alert.js"></script> 
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/jcarousel.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/estilo.css">		
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/alert.css">
		
		<script type="text/javascript">
			var BASE_URL = "<?php echo BASE_URL; ?>";
			var urlTrataDados = "<?php echo BASE_URL; ?>/index/tratamento/trata.dados.php";
			var urlTrataVotacao = "<?php echo BASE_URL; ?>/oscar/tratamento/trataVotacao.php";
			var urlTrataCadastrar = "<?php echo BASE_URL; ?>/confirmacao/tratamento/trata.cadastrar.php";
			var urlTrataSesao = "<?php echo BASE_URL; ?>/confirmacao/tratamento/trata.sessao.php";
			var APPID = "<?php echo APPID; ?>";
			
			
			window.fbAsyncInit = function() {
				FB.init({
				  appId      : APPID,
				  status     : true, 
				  cookie     : true, 
				  xfbml      : true 
				});


				FB.Event.subscribe("auth.authResponseChange", function(response) {
					if (response.status === "connected") {
						getDados();
					} else if (response.status === "not_authorized") {
						FB.login();
					} else {
						FB.login();
					}
				});
			};

			(function(d){
			 var js, id = "facebook-jssdk", ref = d.getElementsByTagName("script")[0];
			 if (d.getElementById(id)) {return;}
			 js = d.createElement("script"); js.id = id; js.async = true;
			 js.src = "//connect.facebook.net/pt_BR/all.js";
			 ref.parentNode.insertBefore(js, ref);
			}(document));
		</script>	

    </head>
    <body>
        <div id="oscar-2014">
            <div id="topo"><img src="<?php echo BASE_URL; ?>/img/logo.jpg" height="178" width="474" alt=""></div>