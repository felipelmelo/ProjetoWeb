<?php

Class ControladorUsuario {

    private static $instancia;

    public static function getInstancia() {
        if (!isset(self::$instancia))
            self::$instancia = new ControladorUsuario();
        return self::$instancia;
    }

    private function getRepositorio() {
        return RepositorioUsuario::getInstancia();
    }

    private function __construct() {
        
    }
	
	public static function existeSecao(){
		return !empty($_SESSION['dados_usuario']['id']) ? true : false;
	}
	
	public static function estaCadastrado(){
		return !empty($_SESSION['dados_usuario']['cadastrado']) ? true : false;
	}

    public function adicionar($nome, $identificacao, $telefone) {
        $objValidacao = new Validacao();
        $objValidacao->setRules($nome, "trim|required", "NOME");
        $objValidacao->setRules($identificacao, "trim|required", "IDENTIFICAÇÃO");
        $objValidacao->setRules($telefone, "trim|required", "TELEFONE");
        $objValidacao->run();

        if (count($this->verificarCadastro($identificacao)) > 0)
            throw new ValidacaoException("Usuário já Cadastrado");

        $objUsuario = new Usuario(null, utf8_decode($nome), $identificacao, $telefone);

        return $this->getRepositorio()->adicionar($objUsuario);		
    }

    public function verificarCadastro($identificacao) {
        return $this->getRepositorio()->verificarCadastro($identificacao);
    }

    public function respostaPorUsuario($id) {
        return $this->getRepositorio()->respostaPorUsuario($id);
    }
	
	public function respostaPorUsuarioePergunta($idUsuario, $idPergunta) {
		$objValidacao = new Validacao();
        $objValidacao->setRules($idUsuario, "trim|required", "ID USUARIO");
        $objValidacao->setRules($idPergunta, "trim|required", "ID PERGUNTA");
        $objValidacao->run();
		
		return $this->getRepositorio()->respostaPorUsuarioePergunta($idUsuario, $idPergunta);
	}
	
	public function cadastrarResposta($idUsuario, $idPergunta, $idResposta){
		$objValidacao = new Validacao();
        $objValidacao->setRules($idUsuario, "trim|required", "ID USUARIO");
        $objValidacao->setRules($idPergunta, "trim|required", "ID PERGUNTA");
        $objValidacao->setRules($idResposta, "trim|required", "ID RESPOSTA");
        $objValidacao->run();
		
		return $this->getRepositorio()->cadastrarResposta($idUsuario, $idPergunta, $idResposta);
	}
	
	public function alterarResposta($idUsuario, $idPergunta, $idResposta){
		$objValidacao = new Validacao();
        $objValidacao->setRules($idUsuario, "trim|required", "ID USUARIO");
        $objValidacao->setRules($idPergunta, "trim|required", "ID PERGUNTA");
        $objValidacao->setRules($idResposta, "trim|required", "ID RESPOSTA");
        $objValidacao->run();
		
		return $this->getRepositorio()->alterarResposta($idUsuario, $idPergunta, $idResposta);
	}
	
	public function hashIdDoUsuario($id) {
        return $this->getRepositorio()->hashIdDoUsuario($id);
    }
	
	public function geraImagemBolao($idUsuario){
		
		$res = ControladorUsuario::getInstancia()->respostaPorUsuario($idUsuario);
		$src = ARQUIVOS.'/'.sha1($idUsuario).'.jpg';
		
		include(INCLUDES . '/inc.perguntas.php');
		$simple = new SimpleImage(BASE.'/img/resultado-oscar.jpg');	
		
		$font = BASE . DIRECTORY_SEPARATOR . 'font' . DIRECTORY_SEPARATOR . 'arial.ttf';
		
		$simple->setFont($font);				
				
		$percToRight = 16;
		$percToBottom = 35.5;
		
		$arrGerador = array();
		
		$count = 0;
		foreach($res as $img){ 
			$iPergunda = $img['pergunta_id'] - 1;
			$iResposta = $img['resposta_id'] - 1;

			$img 		= $arrPerguntas[$iPergunda]['respostas'][$iResposta]['foto'];
			$nome 		= $arrPerguntas[$iPergunda]['respostas'][$iResposta]['nome'];
			$categoria 	= $arrPerguntas[$iPergunda]['pergunta']['nome'];
			
			$arrPerguntas[0]['pergunta']['nome'] = 'FILME';
			$n = explode('/', $img);
			
			if(count($n) == 3){
				$antSrc =  $n['2'];
				$newSrc = '80x80-'.$n['2'];		
			}else{
				$antSrc =  $n['0'];
				$newSrc = '80x80-'.$n['0'];		
			}
			
			$arrGerador['foto'][$count] = $img;
			$arrGerador['nome'][$count] = $nome;
			$arrGerador['categoria'][$count] = $categoria;			
		
			$count++;
		}
		
		for($a=0; $a<count($arrGerador['nome']); $a = $a+2){
			$image 	= str_replace('/', '\\', BASE . DIRECTORY_SEPARATOR . $arrGerador['foto'][$a]);
			$image2 = str_replace('/', '\\', BASE . DIRECTORY_SEPARATOR . $arrGerador['foto'][$a+1]);
			
			$simple->merge($image, $percToRight, $percToBottom);
			
			$simple->setFontColor('#ffffff');
			$simple->setFontSize(11);			
			$simple->write($arrGerador['categoria'][$a], $percToRight+10, $percToBottom+2);			
			
			$simple->setFontColor('#FFCB5D');
			$simple->setFontSize(18);			
			$simple->write($arrGerador['nome'][$a], $percToRight+10, $percToBottom+5);			
			
			//BLOCO 2
			
			$simple->merge($image2, $percToRight+40, $percToBottom);
			
			$simple->setFontColor('#ffffff');
			$simple->setFontSize(11);
			$simple->write($arrGerador['categoria'][$a+1], $percToRight+50, $percToBottom+2);

			$simple->setFontColor('#FFCB5D');
			$simple->setFontSize(18);
			$simple->write($arrGerador['nome'][$a+1], $percToRight+50, $percToBottom+5);			

			$percToRight = 16;
			$percToBottom+=9.7;	
		}
		
		$simple->save($src);
		
		return sha1($idUsuario).'.jpg';
	}

}