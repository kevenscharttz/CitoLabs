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
            return new Produto($cafe['id'], $cafe['tipo'], $cafe['nome'], $cafe['descricao'], $cafe['preco'], $cafe['imagem']);
        }, $produtosCafe);

        return $dadosCafe;
    }

    public function opcoesAlmoco()
    {
        $sqlCommand2 = "SELECT * FROM produtos WHERE tipo = 'almoço' ORDER BY preco ASC;";

        $statement2 = $this->pdo->query($sqlCommand2);
        $produtosAlmoco = $statement2->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(function ($almoco) {
            return new Produto($almoco['id'], $almoco['tipo'], $almoco['nome'], $almoco['descricao'], $almoco['preco'], $almoco['imagem']);
        }, $produtosAlmoco);

        return $dadosAlmoco;
    }

    public function opcoes()
    {
        $sqlCommand3 = "SELECT * FROM produtos ORDER BY preco ASC;";

        $statement3 = $this->pdo->query($sqlCommand3);
        $produtos = $statement3->fetchAll(PDO::FETCH_ASSOC);

        $dados = array_map(function ($produto) {
            return new Produto($produto['id'], $produto['tipo'], $produto['nome'], $produto['descricao'], $produto['preco'], $produto['imagem']);
        }, $produtos);

        return $dados;
    }

    public function deletar($id) {
        $sqlCOmmandDelete = "DELETE FROM produtos WHERE id = ?";
        $statementDelete = $this->pdo->prepare($sqlCOmmandDelete);
        $statementDelete->bindValue(1, $id);
        $statementDelete->execute();
    }
}
