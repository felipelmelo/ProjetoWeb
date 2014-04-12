<?php
/** 
 * Classe de elementos úteis ao projeto como um todo
 * @author Túlio Carvalho <tcarvalho@jc.com.br>
 * @since 1.0
 */
class Util{
	
	const PERMISSAO_PADRAO = 0775;

	/**
	 * Método que tem a função de inverter o formato de data original
	 * Caso a data venha no formato ptbr, é invertido para o fotmato usa
	 * Caso venha no USA, inverte para o ptbr
	 * Caso venha hora, retorna com hora, sem os segundos
	 * Caso não venha com hora, retorna sem hora
	 * @param string $strData
	 * @static
	 * @access public
	 * @return string
	 */
	
	public static function inverteData($strData){
		$strData = trim($strData);
		$arrayData = explode(" ", $strData);
		
		$data = $arrayData[0];
		$hora = (isset($arrayData[1])) ? " " . substr($arrayData[1], 0,5) : "";
		
		/* ptbr to usa */
		if(strpos($data, "/")){
			list($dia,$mes,$ano) = explode("/", $data);
			return $ano . "-" . $mes . "-" . $dia . $hora;
		}
		/* usa to ptbr */
		else if(strpos($data, "-")){
			list($ano,$mes,$dia) = explode("-", $data);
			return $dia . "/" . $mes . "/" . $ano . $hora;
		}
	}
	
/**
	 * Método que tem a função de retornar o mês da data por extenso
	 
	 * @param string $strData
	 * @static
	 * @access public
	 * @return string
	 */
	public static function mesPorExtenso($strData){
		$strData = trim($strData);
		$arrayData = explode(" ", $strData);
		
		$data = $arrayData[0];
		
		/* ptbr to usa */
		if(strpos($data, "/")){
			list($dia,$mes,$ano) = explode("/", $data);
			
			switch ($mes) { 
		        case '1' :
		        case '01': $mes='Janeiro'; break;
		        case '2' :
		        case '02': $mes='Fevereiro';    break;
		        case '3' :
		        case '03': $mes='Março';    break;
		        case '4' :
		        case '04': $mes='Abril';    break;
		        case '5' :
		        case '05': $mes='Maio';    break;
		        case '6' :
		       	case '06': $mes='Junho';    break;
		        case '7' :
		        case '07': $mes='Julho';    break;
		        case '8' :
		        case '08': $mes='Agosto';    break;
		        case '9' : 
		        case '09': $mes='Setembro'; break;
		        case '10': $mes='Outubro'; break;
		        case '11': $mes='Novembro';    break;
		        case '12': $mes='Dezembro'; break;
		    }
		    
		    return $mes; 
		}
		/* usa to ptbr */
		else if(strpos($data, "-")){
			list($ano,$mes,$dia) = explode("-", $data);
			
			switch ($mes) { 
		       case '1' :
		        case '01': $mes='Janeiro'; break;
		        case '2' :
		        case '02': $mes='Fevereiro';    break;
		        case '3' :
		        case '03': $mes='Março';    break;
		        case '4' :
		        case '04': $mes='Abril';    break;
		        case '5' :
		        case '05': $mes='Maio';    break;
		        case '6' :
		       	case '06': $mes='Junho';    break;
		        case '7' :
		        case '07': $mes='Julho';    break;
		        case '8' :
		        case '08': $mes='Agosto';    break;
		        case '9' : 
		        case '09': $mes='Setembro'; break;
		        case '10': $mes='Outubro'; break;
		        case '11': $mes='Novembro';    break;
		        case '12': $mes='Dezembro'; break;
		    }
		    
		    return $mes; 
		}
	}
	
	/**
	 * Método que tem a função de inverter o formato de data original
	 * Caso a data venha no formato ptbr, é invertido para o fotmato usa
	 * Caso venha no USA, inverte para o ptbr
	 * @param string $strData
	 * @static
	 * @access public
	 * @return string
	 */
	public static function inverteDataSemHora($strData){
		$strData = trim($strData);
		$arrayData = explode(" ", $strData);
		
		$data = $arrayData[0];
		
		/* ptbr to usa */
		if(strpos($data, "/")){
			list($dia,$mes,$ano) = explode("/", $data);
			return $ano . "-" . $mes . "-" . $dia;
		}
		/* usa to ptbr */
		else if(strpos($data, "-")){
			list($ano,$mes,$dia) = explode("-", $data);
			return $dia . "/" . $mes . "/" . $ano;
		}
	}
	
	/**
	 * Método que tem a função de comparar uma data inicial e uma data final
	 * Caso a data venha no formato ptbr, é invertido para o fotmato usa
	 * Caso venha no USA, não é invertida
	 * Caso venha hora, retorna com hora, sem os segundos
	 * Caso não venha com hora, retorna sem hora
	 * @param string $strData
	 * @static
	 * @access public
	 * @return string
	 */
	public static function compararData($strDataInicial,$strDataFinal,$strMensagem = "A data final não pode ser menor que a inicial."){
		
		/* ptbr to usa */
		if(strpos($strDataInicial, "/")){
			$strDataInicial = self::inverteData($strDataInicial);
		}
		
		/* ptbr to usa */
		if(strpos($strDataFinal, "/")){
			$strDataFinal = self::inverteData($strDataFinal);
		}
		
		
		if($strDataFinal < $strDataInicial){
			throw new ValidacaoException($strMensagem);
		}
	}
	/**
	 * Método que faz a mesma coisa que o array_dif , porem para objetos
	 * @param array $array1 
	 * @param array $array2 
	 */
	public static function  array_obj_diff ($array1, $array2) {
	   
	    foreach ($array1 as $key => $value) {
	        $array1[$key] = serialize ($value);
	    }
	
	    foreach ($array2 as $key => $value) {
	        $array2[$key] = serialize ($value);
	    }
	   
	    $array_diff = array_diff ($array1, $array2);
	   
	    foreach ($array_diff as $key => $value) {
	        $array_diff[$key] = unserialize ($value);
	    }
	   
	    return $array_diff;
	}
	/**
	 * Método que corta uma string e adicionar os caracteres ... ao seu final
	 * @param String $str
	 * @param int $intLimit
	 * @access public
	 * @static
	 * @return String
	 */
	public static function cortarTexto($str,$intLimit)
	{
		if(strlen($str)<=$intLimit){
			return $str;
		}else{
			$str = substr($str,0,$intLimit);
		}
		return $str."...";
	
	}
	
	/**
	 * Método responsável por gerar o combo que altera o status do registro nas listagens dos módulos do sistema
	 * @param int $intId
	 * @param int $intStatus
	 * @static
	 * @access public
	 * @return string
	 */
	public static function geraBoxAprovar($intId,$intAprovado,$intModulo){
		
		if(Permissao::temPermissao($intModulo, Permissao::ACAO_APROVAR)){
			
			$selectedAprovado 			= ($intAprovado == 1) ? "selected=\"selected\"" : "";
			$selectedNaoAprovado 		= ($intAprovado == 0) ? "selected=\"selected\"" : "";
			
			$objTemplate 				= new Template(SISTEMA.DIRECTORY_SEPARATOR."geradoras".DIRECTORY_SEPARATOR."includes".DIRECTORY_SEPARATOR."gera.select.html");
			$objTemplate->ID_SELECT 	= $intId;
			$objTemplate->CLASSE_SELECT = "select_aprovar";
			
			$objTemplate->VALOR 		= 1;
			$objTemplate->SELECTED 		= $selectedAprovado;
			$objTemplate->DESCRICAO 	= "Aprovado";
			$objTemplate->block("BLOCK_OPTION");
			
			$objTemplate->VALOR 		= 0;
			$objTemplate->SELECTED 		= $selectedNaoAprovado;
			$objTemplate->DESCRICAO 	= "Não Aprovado";
			$objTemplate->block("BLOCK_OPTION");
			
			$objTemplate->block("BLOCK_SELECT");
			
			$objTemplate->show();
			
		}
	}
	
	/**
	 * Método responsável por gerar o combo que altera o status do registro nas listagens dos módulos do sistema
	 * @param int $intId
	 * @param int $intStatus
	 * @static
	 * @access public
	 * @return string
	 */
	public static function geraBoxStatus($intId,$intStatus,$intModulo){
		
		if(Permissao::temPermissao($intModulo, Permissao::ACAO_ALTERAR_STATUS)){
			
			$selectedAtivo = ($intStatus == 1) ? "selected=\"selected\"" : "";
			$selectedInativo = ($intStatus == 0) ? "selected=\"selected\"" : "";
			
			$objTemplate = new Template(SISTEMA.DIRECTORY_SEPARATOR."geradoras".DIRECTORY_SEPARATOR."includes".DIRECTORY_SEPARATOR."gera.select.html");
			$objTemplate->ID_SELECT 	= $intId;
			$objTemplate->CLASSE_SELECT = "select_status";
			
			$objTemplate->VALOR = 1;
			$objTemplate->SELECTED = $selectedAtivo;
			$objTemplate->DESCRICAO = "Ativo";
			$objTemplate->block("BLOCK_OPTION");
			
			$objTemplate->VALOR = 0;
			$objTemplate->SELECTED = $selectedInativo;
			$objTemplate->DESCRICAO = "Inativo";
			$objTemplate->block("BLOCK_OPTION");
			
			$objTemplate->block("BLOCK_SELECT");
			
			$objTemplate->show();
			
		}
	}
	
	/**
	 * Método responsável por gerar as caixa com as possíveis ações em massa
	 * @param int $intModulo
	 * @static
	 * @access public
	 * @return string
	 */
	public static function geraBoxAcoesMutiplas($intModulo){
	    if(Permissao::temPermissao($intModulo, Permissao::ACAO_EXCLUIR)||Permissao::temPermissao($intModulo, Permissao::ACAO_ALTERAR_STATUS)){
			$strAcoes = "<div class='grid-acoes'>
			<select  style=\"width: 130px;\" class=\"campo-branco-padrao\" id=\"cmbSelectAcao\" name=\"cmbSelectAcao\">
		    <option selected=\"selected\" value=\"\">Mais Ações</option>
			";
			if(Permissao::temPermissao($intModulo, Permissao::ACAO_EXCLUIR)){
				$strAcoes .= "<option value=\"EXCLUIR\">Excluir</option>";
			}
			if(Permissao::temPermissao($intModulo, Permissao::ACAO_ALTERAR_STATUS)){
				$strAcoes .= "<option value=\"ATIVAR\">Ativar</option>
							  <option value=\"DESATIVAR\">Desativar</option>";
			}
			
			$strAcoes .= "</select></div>";
	    }
		echo $strAcoes;
	}
	
	/**
	 * Método responsável por gerar os links de excluir e alterar das listagens dos módulos do sistema
	 * @param int $intId
	 * @static
	 * @access public
	 * @return string
	 */
	public static function geraBoxAcoes($intId,$intModulo){
		
		$objTemplate = new Template(SISTEMA.DIRECTORY_SEPARATOR."geradoras".DIRECTORY_SEPARATOR."includes".DIRECTORY_SEPARATOR."gera.acoes.html");
		$objTemplate->BASE_URL 	= BASE_URL;
		
		/*
		if(Permissao::temPermissao($intModulo, Permissao::ACAO_CADASTRAR_IMAGEM)){
			$objTemplate->ID_LINK_CADASTRAR_IMAGEM 	= $intId;
			$objTemplate->block("BLOCK_ACAO_CADASTRAR_IMAGEM");
		}*/
		
		if(Permissao::temPermissao($intModulo, Permissao::ACAO_ALTERAR)){
			$objTemplate->ID_LINK_ALTERAR 	= $intId;
			$objTemplate->block("BLOCK_ACAO_ALTERAR");
		}
		
		if(Permissao::temPermissao($intModulo, Permissao::ACAO_EXCLUIR)){
			$objTemplate->ID_LINK_EXCLUIR 	= $intId;
			$objTemplate->block("BLOCK_ACAO_EXCLUIR");
		}
		
		$objTemplate->show();
	}
	
	/**
	 * Método que retira os acentos de uma String e a retorna
	 * @param String $str
	 * @access public
	 * @static
	 * @return String
	 */
	public static function retiraAcento($str)
	{
		$arrAcentos		= array("Á","É","Í","Ó","Ú","Â","Ê","Î","Ô","Û","Ã","Ñ","Õ","Ä","Ë","Ï","Ö","Ü","À","È","Ì","Ò","Ù","á","é","í","ó","ú","â","ê","î","ô","û","ã","ñ","õ","ä","ë","ï","ö","ü","à","è","ì","ò","ù",".",",",":",";","...","ç","%","?","/","\\","”","“","'","!","@","#","$","*","(",")","+","=","{","}","[","]","|","<",">","\"","&ordf;","&ordm;","&deg;","‘","‘","&raquo;","ª","º","»","´","~","&","°","²","³");
		$arrSemacento	= array("a","e","i","o","u","a","e","i","o","u","a","n","o","a","e","i","o","u","a","e","i","o","u","a","e","i","o","u","a","e","i","o","u","a","n","o","a","e","i","o","u","a","e","i","o","u","","","","","","c","_porcento","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","e","","2","3");
		
		for($intPos = 0 ; $intPos < count($arrAcentos) ; $intPos++){
			$str = str_replace($arrAcentos[$intPos],$arrSemacento[$intPos],$str);
			
		}
		
		return $str;
	
	}
	
	/**
	 * Método que retorna uma string passada por parâmetro em formato de url
	 * @param String $strTitulo
	 * @access public
	 * @return String
	 */
	public static function formatarTituloParaUrl($strTitulo){
		// coloca todo mundo em minúsculo
		$strTitulo = strtolower($strTitulo);
		// retira todos os acentos e caracteres especiais
		$strTitulo = self::retiraAcento($strTitulo);
		// retita os espaços em branco e troca para um "-"
		$strTitulo = str_replace(" ", "-", $strTitulo);		
		return $strTitulo;
	}
	
	/**
	 * Método que retira aplica uma função em todas as posições de um array passado por parametro
	 * caso a posição seja um array, a função trabalha de forma recursiva
	 * @param String $callback
	 * @param Array $array
	 * @access public
	 * @static
	 * @return Array
	 */
	public static function arrayMapRecursivo($callback, $array){
		$arrMapeado = array();
		foreach($array as $key=>$posicao){
			if(is_array($posicao)){
				$arrMapeado[$key] = Util::arrayMapRecursivo($callback,$posicao);
			}else{
				$arrMapeado[$key] = $callback($posicao);
			}
		}
		return $arrMapeado;
	}
	
	/**
	 * Método que repupera o IP da maquina que está usando a aplicação
	 * @access public
	 * @static
	 * @return String
	 */
	public static function getIp(){
		return $_SERVER["REMOTE_ADDR"];
	}
	
	/**
	 * Método usado na geração de senhas aleatórias
	 * @param $intTam
	 * @access public
	 * @static
	 * @return string
	 */
	public static function gerarSenha($intTam = 6){
		$array = array(
			array("1","2","3","4","5","6","7","8","9"),
			array("a","b","c","d","e","f","g","h","k","m","n","p","q","r","s","t","u","v","x","z")
		);
		$strSenha = "";
		for($i = 0 ; $i  < $intTam ; $i++ ){
			$key = rand(0,count($array)-1);
			$strSenha .= $array[$key][rand(0,count($array[$key]) - 1)];
		}
		return $strSenha;
	}
	
	/**
	 * Retorna a extensão de um arquivo atravéz do fileName informado
	 * @param String $strFileName
	 * @static
	 * @return String
	 */
	public static function getExtensao($strFileName){
		$pecas = explode(".", $strFileName);
		$tam = count($pecas);
		return $pecas[$tam - 1];
	}
	
	/**
	 * Método responsável por criar o arquivo desejado com sua permissão padrão
	 * @param string $strArquivo
	 */
	public static function criarArquivo($strArquivo){
		// criando o diretório do arquivo
		
		self::criarDiretorio(dirname($strArquivo));
		
		// criando arquivo
		$file = fopen($strArquivo, "w+");
		fclose($file);
		
		// atribuindo permissão padrão para o arquivo
		@chmod($strArquivo, self::PERMISSAO_PADRAO);
	}
	
	/**
	 * Método responsável por criar os diretórios
	 * em caso de diretório <ano/mes/dia> não precisa criar um por vez, o método cria todos ao mesmo tempo
	 * @param string $strDir
	 */
	public static function criarDiretorio($strDir){
		
		$partes = explode(DIRECTORY_SEPARATOR, str_replace(BASE, "", $strDir));
		$parte_anterior = "";
		foreach($partes as $parte){
			//Verificando a existência do diretório
			if(!is_dir(BASE . DIRECTORY_SEPARATOR . $parte_anterior . $parte)){
				// criando o diretório
				mkdir(BASE . DIRECTORY_SEPARATOR . $parte_anterior. $parte,self::PERMISSAO_PADRAO);
			}
			$parte_anterior .= $parte . DIRECTORY_SEPARATOR;
		}
	}
	
	/**
	 * Método responsável por retornar o dia da semana em português
	 * @param int $intDia
	 * @param int $intMes
	 * @param int $intAno
	 */
	public static function getDiaDaSemana($intDia, $intMes, $intAno){
		switch(date('N', mktime(0, 0, 0, $intMes, $intDia, $intAno))){
			case 1:
				$strRetorno = 'segunda-feira';
				break;
			case 2:
				$strRetorno = 'terça-feira';
				break;
			case 3:
				$strRetorno = 'quarta-feira';
				break;
			case 4:
				$strRetorno = 'quinta-feira';
				break;
			case 5:
				$strRetorno = 'sexta-feira';
				break;
			case 6:
				$strRetorno = 'sábado';
				break;
			case 7:
				$strRetorno = 'domingo';
				break;
		}
		
		return $strRetorno;
	}
	
	/**
	 * Método responsável por retornar o a hora da data
	 * @param string $strData
	 */
	public static function getHoraData($strData){
		$hora = explode(" ",$strData);
		return substr($hora[1],0,2);
	}
	/**
	 * Método responsável por retornar o minuto da data
	 * @param string $strData
	 */
	public static function getMinutoData($strData){
		$minuto = explode(" ",$strData);
		return substr($minuto[1],3,2);
	}
	
	
	/**
	 * Método responsável por subtrair data e hora e retornar o tempo em horas,minutos e segundos
	 * @param string $strHoraDataInicial
	 * @param string $strHoraDataFinal 
	 */
	public function getSubDataHora($strHoraDataInicial,$strHoraDataFinal){
		$data_login = strtotime($strHoraDataInicial);
	    $data_logout = strtotime($strHoraDataFinal);
	
	    $tempo_con = mktime(date('H', $data_logout) - date('H', $data_login), date('i', $data_logout) - date('i', $data_login), date('s', $data_logout) - date('s', $data_login));
	
	   //print date('H:i:s', $tempo_con);
	  return date('H:i', $tempo_con);
	}	   
	
	
	/**
	 * Método responsável para encurtar a url do link passado
	 * @param string $strUrl
	 */
	public static function encurtarUrl($strUrl){
	
		$linkZipNet = "http://zip.net/?format=xml&u=".$strUrl;
	
		//get the url
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $linkZipNet);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);
		
		$xml = simplexml_load_string($response);
			
		return $xml->uol;
	}
/**
	 * Método responsável por retornar o botao de compartilhamento do twitter e o botao de like do facebook
	 * @param string $strTextoTwitter
	 * @param string $strUrl
	 * @return string
	 */
	public static function getCompartilhamento($strTextoTwitter, $strUrl){
		return self::getBotaoTwitter($strTextoTwitter,$strUrl)." ".self::getBotaoFacebook($strUrl)." ".self::getBotaoOrkut($strUrl);
	}
	
	/**
	 * Método responsável por retornar o botao de compartilhamento do twitter
	 * @param string $strTextoTwitter
	 * @return string
	 */
	public static function getBotaoTwitter($strTextoTwitter,$strUrl=""){
		$strTwitterButton = "<div class='redes_botao'><script type='text/javascript' src='http://platform.twitter.com/widgets.js'></script>
							<a href='http://twitter.com/share' class='twitter-share-button' data-text='JC: ".$strTextoTwitter."' data-url='".$strUrl."' data-count='horizontal' data-via='jc_pe'>Tweet</a></div>";
		return $strTwitterButton;
	}

	/**
	 * Método responsável por retornar o botao de like do facebook
	 * @param string $strUrl
	 * @return string
	 */
	public static function getBotaoFacebook($strUrl){
		$strFacebookLike = "<div class='redes_botao'><iframe scrolling='no' frameborder='0' allowtransparency='true' style='border: medium none; overflow: hidden; width:80px; height: 21px;' src='http://www.facebook.com/plugins/like.php?href=".$strUrl."&amp;layout=button_count&amp;show_faces=false&amp;width=110&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=21'></iframe></div>";
		return $strFacebookLike;
	}
	/**
	 * Método responsável por retornar o botao do orkut
	 * @param string $strUrl
	 * @return string
	 */
	public static function getBotaoOrkut($strUrl){
		$strOrkutButton = "<div class='redes_botao'>
								<a href='#'>
									<img title='Orkut' alt='Orkut' src='".BASE_URL_IMAGEM."/imagem/botao_orkut.gif'>
								</a>
							</div>";
		return $strOrkutButton; 
	}
	/**
	 * Método responsável por retornar as outras redes
	 * @param string $strUrl
	 * @return string
	 */
	public static function getOutrasRedes($strUrl){
		$strOutrasRedes = "<div class='redes_icones'>
            <div class='redes_botao'><a href='#'><img src='".BASE_URL_IMAGEM."/imagem/inc_delicious.gif' alt='Delicious' title='Delicious' /></a></div>
            <div class='redes_botao'><a href='#'><img src='".BASE_URL_IMAGEM."/imagem/inc_digg.gif' alt='Digg' title='Digg' /></a></div>
            <div class='redes_botao'><a href='#'><img src='".BASE_URL_IMAGEM."/imagem/inc_newsvine.gif' alt='Newsvine' title='Newsvine' /></a></div>
            <div class='redes_botao'><a href='#'><img src='".BASE_URL_IMAGEM."/imagem/inc_stumble.gif' alt='StumbleUpon' title='StumbleUpon' /></a></div>
            <div class='redes_botao'><a href='#'><img src='".BASE_URL_IMAGEM."/imagem/inc_windows.gif' alt='Windows live' title='Windows live' /></a></div>
            <div class='redes_botao'><a href='#'><img src='".BASE_URL_IMAGEM."/imagem/inc_google.gif' alt='Google' title='Google' /></a></div>
            <div class='redes_botao'><a href='#'><img src='".BASE_URL_IMAGEM."/imagem/inc_myspace.gif' alt='My Space' title='My Space' /></a></div>
        </div>";
		return $strOutrasRedes;
	}
	
	
	
	/**
	 * Método responsável por retornar o botao de comentar
	 * @param string $strUrl
	 * @return string
	 */
	public static function getBotaoComente($id,$modulo){
		$strBotaoComente = "<div id='$id,$modulo' class='bt_comentar'><a href='#'>comente</a></div>";
		return $strBotaoComente;
	}
	/**
	 * Método responsável por retornar o botao de imprimir
	 * @return string
	 */
	public static function getBotaoImprima(){
		$strBotaoImprima = "<div onclick='window.print();'>imprima</div>";
		return $strBotaoImprima;
	}
	/**
	 * Método responsável por retornar o botao de enviar para amigo com a classe
	 * @param string $strUrl
	 * @return string
	 */ 
	public static function getBotaoEnvieParaAmigo($intId,$intModulo){
		$strBotaoImprima = "<div class='envieAmigo'>
								<input type='hidden' name='intIdInteratividade' id='intIdInteratividade' value='$intId' />
								<input type='hidden' name='intIdModulo' id='intIdModulo' value='$intModulo' /> 
								envie para um amigo
							</div>";
		return $strBotaoImprima;
	}
	/**
	 * Método responsável por retornar o botao de reportar erro com a classe
	 * @param int $intId
	 * @return string
	 */ 
	public static function getBotaoReportarErro($intId){
		$strBotaoErro = "<div class='envieAmigo'>
								<input type='hidden' name='intIdInteratividade' id='intIdInteratividade' value='$intId' />
								reportar erro
							</div>";
		return $strBotaoErro;
	}
	
	public static function enviarEmail($strDestinatario, $strTitulo, $strCorpo, $strRemetente = ""){
		$strHeaders  = "MIME-Version: 1.0\n"; 
		$strHeaders .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n";
		$strHeaders .= "From: \"Tecnologia SJCC\" <tecnologia@jc.com.br>\r\n";

		if ($strRemetente != "") {
			$strHeaders .= "Reply-To: " . $strRemetente . "\r\n";
			$strHeaders .= "Return-Path: " . $strRemetente . "\r\n";
		}

		$envio = mail($strDestinatario ,$strTitulo, $strCorpo, $strHeaders);
		
		return $envio;
	}

	
	public static function getVerificaArquivoExterno($strCaminhoArquivo){
		
		$strUrl = curl_init($strCaminhoArquivo);
		 
		 // Define a opção que diz que você quer receber o resultado encontrado
 		curl_setopt($strUrl, CURLOPT_RETURNTRANSFER, true);
 		
		$resultado = curl_exec($strUrl);
		
		// Pega o código de resposta HTTP
		$resposta = curl_getinfo($strUrl, CURLINFO_HTTP_CODE);
		
		curl_close($strUrl);
		
		//caso não exista o arquivo no servidor externo
		if($resposta == "404"){
			return false;
		}
		else{
			return true;
		}
	}
	
	public static function getDataCompleta($strData){
		$strData		= ($strData == "") ? "00-00-0000 00:00:00" : $strData;
		$arrDataHora	= explode(" ", $strData); 
		$arrData		= explode("-", $arrDataHora[0]);
		$intDia			= $arrData[2];
		$intMes			= $arrData[1];
		$intAno			= $arrData[0];	
		$intHora		= "00";
		$intMinuto		= "00";
		$intSegundo		= "00";
		if(array_key_exists(1,$arrDataHora))
		{
			
			$arrHora		= explode(":", $arrDataHora[1]);			
			$intHora		= $arrHora[0];
			$intMinuto		= $arrHora[1];
			$intSegundo		= $arrHora[2];
				
		}				
		$array['dia']		= $intDia;
		$array['mes']		= $intMes;
		$array['ano']		= $intAno;
		$array['hora']		= $intHora;
		$array['minuto']	= $intMinuto;
		$array['segundo']	= $intSegundo;
		return $array;		
	}
	
	function formata_data_extenso($strDate)
	{
	// Array com os dia da semana em português;
		$arrDaysOfWeek = array('Domingo','Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sábado');
		// Array com os meses do ano em português;
		$arrMonthsOfYear = array(1 => 'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
		// Descobre o dia da semana
		$intDayOfWeek = date('w',strtotime($strDate));
		// Descobre o dia do mês
		$intDayOfMonth = date('d',strtotime($strDate));
		// Descobre o mês
		$intMonthOfYear = date('m',strtotime($strDate));
		// Descobre o ano
		$intYear = date('Y',strtotime($strDate));
		// Formato a ser retornado
		return $arrDaysOfWeek[$intDayOfWeek] . ', ' . $intDayOfMonth . ' / ' . $intMonthOfYear . ' / ' . $intYear;
	}
	
	
	/**
	 * Método que retorna todas as informações da notícia atravéz da url passada por parâmetro
	 * @param string $strLink
	 * @access public
	 * @static
	 * @return Array
	 */
	public static function getInformacoesNoticiaPeloLink($strLink = ""){
		
		$strCanal = "";
		$strSecao = "";
		$intAno = "";
		$intMes = "";
		$intDia = "";
		$intId = "";
		
		if(strpos($strLink,BASE_URL_WWW)!== false){
			
			$strLink = str_replace(BASE_URL_WWW,"",$strLink);
			
			if(strpos($strLink,"/canal/") === false) return array("intId"=>$intId,"strCanal"=>$strCanal,"strSecao"=>$strSecao,"intAno"=>$intAno,"intMes"=>$intMes,"intDia"=>$intDia);
			
			$strLink = str_replace("/canal/","",$strLink);
			$pedacos = explode("/",$strLink);
			
			$strCanal = (isset($pedacos[0]) && !is_numeric($pedacos[0]))?$pedacos[0]:"";
			$strCanal = trim($strCanal);
			if(isset($pedacos[1]) && $pedacos[1] == "noticia"){
				$strSecao = "";
				$intAno = (isset($pedacos[2]) && is_numeric($pedacos[2]))?$pedacos[2]:"";
				$intMes = (isset($pedacos[3]) && is_numeric($pedacos[3]))?$pedacos[3]:"";
				$intDia = (isset($pedacos[4]) && is_numeric($pedacos[4]))?$pedacos[4]:"";
			}else{
				$strSecao = (isset($pedacos[1]) && !is_numeric($pedacos[1]))?$pedacos[1]:"";
				// $pedacos[2] == "noticia"
				$intAno = (isset($pedacos[3]) && is_numeric($pedacos[3]))?$pedacos[3]:"";
				$intMes = (isset($pedacos[4]) && is_numeric($pedacos[4]))?$pedacos[4]:"";
				$intDia = (isset($pedacos[5]) && is_numeric($pedacos[5]))?$pedacos[5]:"";
			}
			$strSecao = trim($strSecao);
			if(isset($pedacos[count($pedacos) - 1]))
				$intId = str_replace(array(".php",".html",".xhtml",".xml"),"",substr($pedacos[count($pedacos)- 1],strrpos($pedacos[count($pedacos)- 1],"-") + 1));
			
			if(!is_numeric($intId)){
				$intId = "";
			}
			
			if(!empty($strSecao)){
				$xml =  BASE_URL_WWW.DIRECTORY_SEPARATOR."sistema".DIRECTORY_SEPARATOR."canal".DIRECTORY_SEPARATOR.$strCanal.DIRECTORY_SEPARATOR.$strSecao.DIRECTORY_SEPARATOR."noticia".DIRECTORY_SEPARATOR.$intAno.DIRECTORY_SEPARATOR.$intMes.DIRECTORY_SEPARATOR.$intDia.DIRECTORY_SEPARATOR.$intId.".xml";
			}else{
				$xml = BASE_URL_WWW.DIRECTORY_SEPARATOR."sistema".DIRECTORY_SEPARATOR."canal".DIRECTORY_SEPARATOR.$strCanal.DIRECTORY_SEPARATOR."noticia".DIRECTORY_SEPARATOR.$intAno.DIRECTORY_SEPARATOR.$intMes.DIRECTORY_SEPARATOR.$intDia.DIRECTORY_SEPARATOR.$intId.".xml";
			}
			
		}else{
			// Se não é uma matéria do Portal o link xml é escrita
			$xml = $strLink;
		}
		
				
		return array("intId"=>$intId,"strCanal"=>$strCanal,"strSecao"=>$strSecao,"intAno"=>$intAno,"intMes"=>$intMes,"intDia"=>$intDia,"xml"=>$xml);
	}
	
	
	/**
	 * Método que retorna o tipo real da home
	 * @param string $tipo
	 * @access public
	 * @static
	 */
	public static function getTipoHome($tipo){
		$tipo = $tipo==HomePortal::TIPO1?"4":($tipo==HomePortal::TIPO2?"3":($tipo==HomePortal::TIPO3?"2":"1"));
		
		return $tipo;
	}
	
	/**
	 * Método que irá remover palavras que contenham sintaxe sql,aspas,tags...
	 * 
	 * @access public  
	 * @param string $sql
	 * @return string
	 */
	public static function anti_injection($string)
	{
		$string = preg_replace("/(from|select|insert|delete|where |script|'|&lt;|&gt;|&#39;|< |> | & |drop table|show tables|#|\*|--|\\\\)/","",$string);
		$string = trim($string);//limpa espaços vazio
		$string = strip_tags($string);//tira tags html e php
		$string = addslashes($string);//Adiciona barras invertidas a uma string
		return $string;
	}
	
/**
	 * Método que irá limitar a quantidade de caracter na listagem sem quebrar as palavras
	 * 
	 * @access public  
	 * @param string $string
	 * @param int    $num
	 * @return string
	 */
	function limitarTexto($string, $num) {
	    $total      = strlen($string);
	    $texto      = substr($string, 0, $num);
	    $separar    = explode(" ", $texto);
	    $end = "";
	 
	    if ($total >= $num) {
	        for ($i = 0; $i < (count($separar)-1); $i++) {
	            $end .= $separar[$i]." ";
	        }
	 
	        $end .= '...';
	    } else {
	        $end = $texto;
	    }
	 
	    return $end;
	}
	
	
	public static function gerarLinkXMl($strUrl){
		$montagem = '${2}/${3}${4}${5}.xml';
		$expRegular = '@(http:\/\/[\W|\w]+?)\/([\w|\W]+?)\/([\d|\/]+).*-(\d+).*@im';
		$novoLink = preg_replace($expRegular, $montagem, $strUrl);
		
		return str_replace(" ", "", str_replace('/', ',', $novoLink));		
	}
	
	public static function verificarCampeonto($strTime){
		
		switch ($strTime){
			case 'nautico':
				$idCampeontao = 1;
				break;
			case 'santa-cruz':
				$idCampeontao = 3;
				break;
			case 'sport':
				$idCampeontao = 2;
				break;
		}
		return $idCampeontao;
	}
	
	public static function diasemana($data) {
		$ano =  substr("$data", 0, 4);
		$mes =  substr("$data", 5, -3);
		$dia =  substr("$data", 8, 9);
	
		$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
	
		switch($diasemana) {
			case"0": $diasemana = "Domingo";       break;
			case"1": $diasemana = "Segunda-Feira"; break;
			case"2": $diasemana = "Terça-Feira";   break;
			case"3": $diasemana = "Quarta-Feira";  break;
			case"4": $diasemana = "Quinta-Feira";  break;
			case"5": $diasemana = "Sexta-Feira";   break;
			case"6": $diasemana = "Sábado";        break;
		}
	
		return $diasemana;
	}
	

	public static function urlBaseImagem(){
		$url = 'http://especiais.jconline.ne10.uol.com.br/confederacoes2013/';	
		return $url;
	}
	
}