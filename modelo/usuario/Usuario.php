<?php

class Usuario {

    private $id;
    private $nome;
    private $identificacao;
    private $telefone;
    private $data_cadastro;

    public function __construct($id = null, $nome = null, $identificacao = null, $telefone = null, $data_cadastro = null) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setIdentificacao($identificacao);
        $this->setTelefone($telefone);
        $this->setData_cadastro($data_cadastro);
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

    public function setIdentificacao($identificacao) {
        $this->identificacao = $identificacao;
    }

    public function getIdentificacao() {
        return $this->identificacao;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    public function getData_cadastro() {
        return $this->data_cadastro;
    }

    public function respostaUsuario() {
        return ControladorUsuario::getInstancia()->respostaPorUsuario($this->id);
    }

}
