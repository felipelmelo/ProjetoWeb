<?php

class RepositorioPergunta {

    /**
     * Atributo de conex�o com a bade de dados
     * @var PDO
     * @access private
     */
    private $conn;

    /**
     * Atributo respons�vel por trabalhar com o Statement do PDO
     * @var PDOStatement
     * @access private
     */
    private $stm;

    /**
     * Atributo de inst�ncia da classe
     * @var RepositorioPergunta
     * @static
     * @access private
     */
    private static $instancia;

    /**
     * Construtor privado da classe
     * @access private
     */
    private function __construct() {
        $this->conn = ConexaoPDO::getInstancia()->getDb();
    }

    /**
     * M�todo respons�vel por retornar a inst�ncia atual da classe
     * @static
     * @return RepositorioPergunta
     * @access public
     */
    public static function getInstancia() {
        if (!isset(self::$instancia))
            self::$instancia = new RepositorioPergunta();
        return self::$instancia;
    }

    /**
     * M�todo privado que retorna um objeto da classe b�sica
     * Recebe como par�metro um array de dados que vem da consulta do banco e retorna o objeto ja pronto,
     * para que o programador n�o tenha que escrever essa linha em cada m�todo que precise retornar o objeto da classe b�sica
     * @param Array $array
     * @access private
     * @return Pergunta
     */
    private function retornaObjeto($array) {
        return new Pergunta($array["id"], $array["nome"], $array["imagem"]);
    }

    public function listar($strComplemento = '') {
        try {
            $retorno = new ArrayObject();

            $strSql = "SELECT * FROM pergunta where id IS NOT NULL " . $strComplemento;
            $this->stm = $this->conn->prepare($strSql);
            $this->stm->execute();

            $resp = $this->conn->query($strSql, PDO::FETCH_ASSOC);

            while ($result = $resp->fetch()) {
                $retorno[] = $this->retornaObjeto($result);
            }
            return $retorno;
        } catch (PDOException $e) {
            throw new PerguntaException($e->getMessage());
        }
    }

    public function listarTodas() {
        try {
            return $this->listar();
        } catch (PDOException $e) {
            throw new PerguntaException($e->getMessage());
        }
    }

    public function visualizar($intId) {
        $strComplemento = " and id = $intId ";

        $retorno = $this->listar($strComplemento);

        if (count($retorno) == 0)
            throw new PerguntaException("Nenhum registro encontrado");

        return $retorno[0];
    }

}
