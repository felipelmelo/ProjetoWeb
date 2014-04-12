<?php

Class ControladorPergunta {

    /**
     * Atributo respons�vel por guardar a inst�ncia da classe
     * @static
     * @var ControladorPergunta
     * @access private
     */
    private static $instancia;

    /**
     * M�todo que retorna uma �nica inst�ncia da classe
     * @static
     * @access public
     * @return ControladorPergunta
     */
    public static function getInstancia() {
        if (!isset(self::$instancia))
            self::$instancia = new ControladorPergunta();
        return self::$instancia;
    }

    /**
     * M�todo que retorna a inst�ncia do Reposit�rio
     * @access private
     * @return RepositorioPergunta
     */
    private function getRepositorio() {
        return RepositorioPergunta::getInstancia();
    }

    /**
     * Construtor privado da classe
     * @access private
     */
    private function __construct() {
        
    }

    public function listarTodas() {
        return $this->getRepositorio()->listarTodas();
    }

}