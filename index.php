<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors",1);

header('Content-Type: text/html; charset=UFT-8');
date_default_timezone_set("America/Recife");

/* base dir */
define('BASE', dirname(__FILE__));

/* base url */
$phpself = (dirname($_SERVER['PHP_SELF']) == "/" || dirname($_SERVER['PHP_SELF']) == "\\") ? "" : dirname($_SERVER['PHP_SELF']);
define('BASE_URL', "http://" . $_SERVER['HTTP_HOST'] . $phpself);

/* Novos defines */
define('BASE_URL_IMAGEM', BASE_URL . '/img');
define('BASE_URL_WWW', BASE_URL);

/* definiпїЅпїЅo de constantes da arquitetura */
define("MODELO", BASE . DIRECTORY_SEPARATOR . "modelo");
define("LIB", BASE . DIRECTORY_SEPARATOR . "lib");
define("CONFIG", BASE . DIRECTORY_SEPARATOR . "configuracao");
define("SISTEMA", BASE . DIRECTORY_SEPARATOR . "sistema");
define("ARQUIVOS", BASE . DIRECTORY_SEPARATOR . "apostas");

define("INCLUDES", SISTEMA . DIRECTORY_SEPARATOR . "includes");

/* definiзгo do Ambiente */
define('AMBIENTE_DESENVOLVIMENTO', 1);
define('AMBIENTE_PRODUCAO', 2);
define('AMBIENTE', AMBIENTE_DESENVOLVIMENTO);


// definiзгo do tweet
/*
define ('CONSUMER_KEY', "gAvL9BQfrkE50oKzHXHQ");
define ('CONSUMER_SECRET',"o99YxvNFNSh6uTY1nSrmBpwHcVYfZLQCABobhQK4Q");
define ('ACCESS_TOKEN',"75278746-xUiBimd8bj9EShrUA9nuqCHznIpZrsiKU8Se1lXyD");
define ('OAUTH_TOKEN_SECRET',"XJXA48zTBryHqygxOUVAupSFp4yfhkDeIJXcRWrdCJ159");
define ('OAUTH_CALLBACK',"http://localhost/oscar");
*/

define ('CONSUMER_KEY', "B3EmD86nScB53OTup4TSQQ");
define ('CONSUMER_SECRET',"oeAvpQfIUq1h01PLtFxnFEOHyGxyBYwNy4EtMXNJIo");
define ('ACCESS_TOKEN',"364466615-fLnTteZzxkYPQ6UgOR6kv4vbFdvPrh31qy7L3SxM");
define ('OAUTH_TOKEN_SECRET'," 5G2p6YqslyR88E3rdS0ejJ2a7UjTk2FrTH59KdGvWLWRi");
define ('OAUTH_CALLBACK',"http://localhost.com.br/oscar2014/index/");
define ('OAUTH_CALLBACK_2',"http://localhost.com.br/oscar2014/compartilhar/");


// definiзгo do facebook
define('APPID',"1473218639566524");

require("configuracao/PaginaNaoEncontrada.php");
require("configuracao/autoload.php");
require("configuracao/config.php");


try {
    $parametros = array();
    $page = getPageByRewrite($parametros);

    $cont = 1;
    foreach ($parametros as $parametro) {
        $nomeparametro = "parametro$cont";
        $$nomeparametro = $parametro;
        $cont++;
    }

    include($page);
} catch (PaginaNaoEncontrada $e) {
	echo $page;
    //header("Location: " . BASE_URL_WWW . "404");
}
?>