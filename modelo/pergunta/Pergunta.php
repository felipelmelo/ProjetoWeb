<?php

class Pergunta {

    private $id;
    private $nome;
    private $imagem;

    function __construct($id = null, $nome = null, $imagem = null) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setImagem($imagem);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getImagem() {
        return $this->imagem;
    }

}
