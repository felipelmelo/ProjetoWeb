<?php

class BancoException extends Exception {

    public function __construct($pdoException) {
        $msg = "Problema na conex�o com banco de dados.";
        parent::__construct($msg);
    }

}
