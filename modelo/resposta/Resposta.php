<?php

class Resposta {

    private $id;
    private $nome;
    private $descricao;
    private $imagem;

    function __construct($id = null, $nome = null, $descricao = null, $imagem = null) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setDescricao($descricao);
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

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getImagem() {
        return $this->imagem;
    }

}
