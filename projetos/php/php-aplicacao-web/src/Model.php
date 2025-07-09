<?php

class Produto {
    private $id;
    private $tipo;
    private $nome;
    private $descricao;
    private $imagem;
    private $preco;

    public function __construct($id, $tipo, $nome, $descricao, $preco, $imagem='logo-serenatto.png') {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->imagem = $imagem;
        
    }

    public function getId(){
        return $this->id;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getImagem(){
        return "./img/" . $this->imagem;
    }

    public function getPreco(){
        return ('R$ ' . number_format($this->preco, 2, ',', '.'));    
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