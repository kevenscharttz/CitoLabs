<?php


class ProdutoRepositorio
{


    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function opcoesCafe()
    {
        $sqlCommand = "SELECT * FROM produtos WHERE tipo = 'café' ORDER BY preco ASC;";

        $statement = $this->pdo->query($sqlCommand);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function ($cafe) {
            return new Produto($cafe['id'], $cafe['tipo'], $cafe['nome'], $cafe['descricao'], $cafe['imagem'], $cafe['preco']);
        }, $produtosCafe);

        return $dadosCafe;
    }

    public function opcoesAlmoco()
    {
        $sqlCommand2 = "SELECT * FROM produtos WHERE tipo = 'almoço' ORDER BY preco ASC;";

        $statement2 = $this->pdo->query($sqlCommand2);
        $produtosAlmoco = $statement2->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(function ($almoco) {
            return new Produto($almoco['id'], $almoco['tipo'], $almoco['nome'], $almoco['descricao'], $almoco['imagem'], $almoco['preco']);
        }, $produtosAlmoco);

        return $dadosAlmoco;
    }
}
