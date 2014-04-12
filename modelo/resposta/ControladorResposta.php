<?php

Class ControladorResposta {

    private static $instancia;

    public static function getInstancia() {
        if (!isset(self::$instancia))
            self::$instancia = new ControladorResposta();
        return self::$instancia;
    }

    private function getRepositorio() {
        return RepositorioResposta::getInstancia();
    }

    private function __construct() {
        
    }

    public function listarPorPergunta($intId) {
        $objValidacao = new Validacao();
        $objValidacao->setRules($intId, "required|numeric", "ID");
        $objValidacao->run();

        return $this->getRepositorio()->listarPorPergunta($intId);
    }

    public function visualizar($intId) {
        $objValidacao = new Validacao();
        $objValidacao->setRules($intId, "required|numeric", "ID");
        $objValidacao->run();

        return $this->getRepositorio()->visualizar($intId);
    }

}
