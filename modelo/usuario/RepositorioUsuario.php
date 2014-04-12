<?php

class RepositorioUsuario {

    private $conn;
    private $stm;
    private static $instancia;

    private function __construct() {
        $this->conn = ConexaoPDO::getInstancia()->getDb();
    }

    public static function getInstancia() {
        if (!isset(self::$instancia))
            self::$instancia = new RepositorioUsuario();
        return self::$instancia;
    }

    private function retornaObjeto($array) {
        return new Usuario($array["usu_id"], $array["usu_nome"], $array["usu_identificacao"], $array["usu_telefone"], $array["data_cadastro"]);
    }

    public function adicionar(Usuario $objUsuario) {
        try {

            $strSql = "insert into usuario(usu_nome,usu_identificacao,usu_telefone,data_cadastro)
                                        values(:nome,:identificacao,:telefone,now())";
            $this->stm = $this->conn->prepare($strSql);
            $this->stm->bindValue(":nome", $objUsuario->getNome());
            $this->stm->bindValue(":identificacao", $objUsuario->getIdentificacao());
            $this->stm->bindValue(":telefone", $objUsuario->getTelefone());
            $this->stm->execute();

            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            throw new BancoException($e);
        }
    }

    public function verificarCadastro($identificacao) {
        try {
            $strSql = "select * from usuario where usu_identificacao = :identificacao";
            $this->stm = $this->conn->prepare($strSql);
            $this->stm->bindValue(":identificacao", $identificacao);
            $this->stm->execute();
            $result = $this->stm->fetch(PDO::FETCH_ASSOC);

            if (!$result)
                return null;

            return $this->retornaObjeto($result);
        } catch (PDOException $e) {
            throw new BancoException($e);
        }
    }

    public function respostaPorUsuario($id) {
        try {

            $strSql = "SELECT ru.pergunta_id, ru.resposta_id FROM resposta_usuario ru
                       WHERE ru.usuario_id = :id";
            $this->stm = $this->conn->prepare($strSql);
            $this->stm->bindValue(":id", $id);
            $this->stm->execute();
            return $this->stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new BancoException($e);
        }
    }
	
    public function respostaPorUsuarioePergunta($idUsuario, $idPergunta) {
        try {

            $strSql = "SELECT count(ru.id) as total FROM resposta_usuario ru
                       WHERE ru.usuario_id = :idUsuario AND ru.pergunta_id = :idPergunta";
            $this->stm = $this->conn->prepare($strSql);
            $this->stm->bindValue(":idUsuario", $idUsuario);
			$this->stm->bindValue(":idPergunta", $idPergunta);
            $this->stm->execute();
            
			$arrRetorno = $this->stm->fetch(PDO::FETCH_ASSOC);
			return $arrRetorno['total'] == 0 ? true : false;
        } catch (PDOException $e) {
            throw new BancoException($e);
        }
    }
	
	public function cadastrarResposta($idUsuario, $idPergunta, $idResposta){
		try{
			$strSql = 'INSERT INTO resposta_usuario (usuario_id, pergunta_id, resposta_id) VALUES (:usuId, :perId, :respId)';
			
			$this->stm = $this->conn->prepare($strSql);
			$this->stm->bindValue(':usuId', $idUsuario);
			$this->stm->bindValue(':perId', $idPergunta);
			$this->stm->bindValue(':respId', $idResposta);
			$this->stm->execute();
			
			return $this->conn->lastInsertId();
			
		} catch (PDOException $e) {
			echo $e->getMessage();
            throw new BancoException($e);
        }
	}
	
	public function alterarResposta($idUsuario, $idPergunta, $idResposta){
		try{
			$strSql = 'UPDATE resposta_usuario SET resposta_id = :respId WHERE usuario_id = :usuId AND pergunta_id = :perId';				
			$this->stm = $this->conn->prepare($strSql);
			$this->stm->bindValue(':usuId', $idUsuario);
			$this->stm->bindValue(':perId', $idPergunta);
			$this->stm->bindValue(':respId', $idResposta);
			$this->stm->execute();
			
			return $this->conn->lastInsertId();
			
		} catch (PDOException $e) {
			echo $e->getMessage();
            throw new BancoException($e);
        }
	}
	
	public function hashIdDoUsuario($id) {
        try {
            $strSql = "select * from usuario where sha1(usu_identificacao) = :identificacao";
            $this->stm = $this->conn->prepare($strSql);
            $this->stm->bindValue(":identificacao", $id);
            $this->stm->execute();
            $result = $this->stm->fetch(PDO::FETCH_ASSOC);

            if (!$result)
                return null;

            return $this->retornaObjeto($result);
        } catch (PDOException $e) {
            throw new BancoException($e);
        }
    }

}
