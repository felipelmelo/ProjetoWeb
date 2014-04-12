<?php

if(isset($_REQUEST['oauth_verifier']) && $_REQUEST['oauth_verifier'] != ''){
	try{
		if(isset($_SESSION['request_token']) && $_SESSION['request_token'] != ''){				
			$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_token_secret']);
			$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
			if($access_token)
			{/*
				$imagem = 'recomendar.jpg';				
				$handle = fopen($filename, "rb");
				$imagem = fread($handle, filesize($filename));
				fclose($handle);
			 */	
				$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);		
				//$result = $connection->post('statuses/update_with_media', array('media[]' => "@{$imagem};type=image/jpg;filename={$imagem}",'status' => 'Vem ai ...'), true);
				$result = $connection->post('statuses/update',array('status'=>'Acesse ja blogs.ne10.uol.com.br/social1/oscar e de seu palpite no Oscar 2014'));
				
				if(!isset($result->errors)){
					header('Location: '+BASE_URL);die();
				}
			}
		}
	}catch(Exception $e){
		//echo $e->getMessage();
	}
}else{
	try{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
		$request_token = $connection->getRequestToken(OAUTH_CALLBACK_2);

		if(	$request_token)
		{			
			$token = $request_token['oauth_token'];
			$_SESSION['request_token'] = $token ;
			$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];

			switch ($connection->http_code) 
			{
				case 200:
					$url = $connection->getAuthorizeURL($request_token['oauth_token']);
					header('Location: '.$url);die();
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