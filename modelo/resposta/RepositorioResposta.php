<?php

class RepositorioResposta {

    private $conn;
    private $stm;
    private static $instancia;

    private function __construct() {
        $this->conn = ConexaoPDO::getInstancia()->getDb();
    }

    public static function getInstancia() {
        if (!isset(self::$instancia))
            self::$instancia = new RepositorioResposta();
        return self::$instancia;
    }

    private function retornaObjeto($array) {
        return new Resposta($array['id'], $array["nome"], $array["descricao"], $array["imagem"]);
    }

    public function listar($strComplemento = "") {
        try {
            $retorno = new ArrayObject();

            $strSql = "SELECT * FROM resposta WHERE $strComplemento";

            $this->stm = $this->conn->prepare($strSql);
            $this->stm->execute();
            $resp = $this->conn->query($strSql, PDO::FETCH_ASSOC);

            while ($result = $resp->fetch()) {
                $retorno[] = $this->retornaObjeto($result);
            }
            return $retorno;
        } catch (PDOException $e) {
            throw new RespostaException($e->getMessage());
        }
    }

    public function listarPorPergunta($intId) {
        $strComplemento = " pergunta_id = $intId ";

        $retorno = $this->listar($strComplemento);

        if (count($retorno) == 0)
            throw new RespostaException("Nenhum registro encontrado");

        return $retorno;
    }

    public function visualizar($intId) {
        $strComplemento = " id = $intId ";

        $retorno = $this->listar($strComplemento);

        if (count($retorno) == 0)
            throw new RespostaException("Nenhum registro encontrado");

        return $retorno[0];
    }

}
