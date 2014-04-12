<?php	
if (isset($_SESSION['dados_usuario'])){
	unset($_SESSION['dados_usuario']);
}
if (isset($_SESSION['respondidas'])){
	unset($_SESSION['respondidas']);
}
if (isset($_SESSION['fb_' . APPID . '_code'])){
    unset($_SESSION['fb_' . APPID . '_code']);
}
if (isset($_SESSION['fb_' . APPID . '_access_token'])){
    unset($_SESSION['fb_' . APPID . '_access_token']);
}
if (isset($_SESSION['fb_' . APPID . '_user_id'])){
    unset($_SESSION['fb_' . APPID . '_user_id']);
}
if (isset($_SESSION['request_token'])){
    unset($_SESSION['request_token']);
}
if (isset($_SESSION['request_token_secret'])){
    unset($_SESSION['request_token_secret']);
}

echo json_encode('Limpo');
?>	