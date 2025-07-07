<?php

class Produto {
    private $id;
    private $tipo;
    private $nome;
    private $descricao;
    private $imagem;
    private $preco;

    public function __constructor() {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->preco = $preco;
    }

    public function getId(){
        return $id;
    }

    public function getTipo(){
        return $tipo;
    }

    public function getNome(){
        return $nome;
    }

    public function getDescricao(){
        return $descricao;
    }

    public function getImagem(){
        return $imagem;
    }

    public function getPreco(){
        return $preco;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setImagem($imagem){
        $this->imagem = $imagem;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }
}

?>