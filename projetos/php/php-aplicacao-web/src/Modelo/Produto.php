<?php
class Produto
{
    private ?int $id;
    private string $tipo;
    private string $nome;
    private string $descricao;
    private string $imagem;
    private float $preco;

    public function __construct(?int $id, string $tipo, string $nome, string $descricao, float $preco, string $imagem = "logo-serenatto.png")
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->imagem = $imagem;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getTipo(): string
    {
        return $this->tipo;
    }


    public function getNome(): string
    {
        return $this->nome;
    }


    public function getDescricao(): string
    {
        return $this->descricao;
    }



    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function getImagemDiretorio(): string
    {
        return "img/".$this->imagem;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getPrecoFormatado():string
    {
        return "R$ " . number_format($this->preco, 2);
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }



}