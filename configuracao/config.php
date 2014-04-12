<?php
if(!session_id())
	session_start();

function redirecionar($page){
	header("Location: " . BASE_URL . "/" . $page);
	exit;
}

/**
 * Função que lê o resultado do .htaccess e monta a tela que será incluida
 * @author Túlio Carvalho <tcarvalho@jc.com.br>
 * @version 1.0
 */
function getPageByRewrite(&$parametros = array()){		
	if(!isset($_GET["url"]) || $_GET["url"] == ""){
		$tela = "index.php";
	}else{
		$tela = $_GET["url"];
		
		$tela = str_replace(".html", ".php", $tela);
		$extensao = substr($tela, strrpos($tela, "."));
		
		if($extensao != ".php" && $extensao != ".js" && $extensao != ".css" && $extensao != ".swf"){
			if(substr($tela, strlen($tela) - 1) == "/"){
				$tela .= "index.php";
			}else{
				$tela .= "/index.php";
			}
		}
	}
	
		
	$arrayUrl = explode("/", $tela);
	$file = $arrayUrl[count($arrayUrl) - 1];
	$arrayParametros = explode(",", $file);
	if(count($arrayParametros) > 1){
		array_pop($arrayUrl);
		$base = implode("/", $arrayUrl);
		$pagina = array_pop($arrayParametros);	
		$parametros = $arrayParametros;
		$tela = $base . "/" . $pagina;
	}
	
	/* verificando se a página é gui ou não */
	$arrayUrl = explode("/", $tela);
	$pagina = "/gui/" . $arrayUrl[count($arrayUrl) - 1];
	array_pop($arrayUrl);
	$pagina = implode("/", $arrayUrl) . $pagina;
	
	if(file_exists(BASE . "/sistema/" . $pagina)){
		return "sistema/" . $pagina;
	}else{
		if(file_exists(BASE . "/sistema/" . $tela)){
			return "sistema/" . $tela;
		}else{
			// caso não encontre a página com extensão .php, vai procurar a .html
			if($extensao == ".php"){
				$pagina = str_replace(".php", ".html", $pagina);
				if(file_exists(BASE . "/sistema/" . $pagina)){
					return "sistema/" . $pagina;
				}else{
					$tela = str_replace(".php", ".html", $tela);
					if(file_exists(BASE . "/sistema/" . $tela)){
						return "sistema/" . $tela;
					}else{
						throw new PaginaNaoEncontrada("Página não encontrada");
					}
				}
			}else{
				throw new PaginaNaoEncontrada("Página não encontrada");
			}
		}
	}
}