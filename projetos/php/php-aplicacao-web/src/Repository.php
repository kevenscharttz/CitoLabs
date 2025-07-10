<?php


class ProdutoRepositorio
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Produto($dados['id'],
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['preco'],
            $dados['imagem']
        );
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

    public function salvar($produto) {
        $sqlCommandSave = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (?, ?, ?, ?, ?);";
        $statementSave = $this->pdo->prepare($sqlCommandSave);
        $statementSave->bindValue(1, $produto->getTipo());
        $statementSave->bindValue(2, $produto->getNome());
        $statementSave->bindValue(3, $produto->getDescricao());
        $statementSave->bindValue(4, $produto->getPrecoBruto());
        $statementSave->bindValue(5, $produto->getImagemBruta());
        $statementSave->execute();
    }

    public function buscar ($id) {
        $sqlCommandBuscar = "SELECT * FROM produtos WHERE id = ?";
        $statementCommandBuscar = $this->pdo->prepare($sqlCommandBuscar);
        $statementCommandBuscar->bindValue (1, $id);
        $statementCommandBuscar->execute();

        $dados = $statementCommandBuscar->fetch(PDO::FETCH_ASSOC);
        return $this->formarObjeto($dados);
    }

    public function editar ($produto) {
        $sqlCommandEditar = "UPDATE produtos SET tipo = ?, nome = ?, descricao= ?, preco = ?, imagem = ? WHERE id = ?";
        $statementCommandEditar = $this->pdo->prepare($sqlCommandEditar);
        $statementCommandEditar -> bindValue (1, $produto->getTipo());
        $statementCommandEditar -> bindValue (2, $produto->getNome());
        $statementCommandEditar -> bindValue (3, $produto->getDescricao());
        $statementCommandEditar -> bindValue (4, $produto->getPrecoBruto());
        $statementCommandEditar -> bindValue (5, $produto->getImagemBruta());
        $statementCommandEditar -> bindValue (6, $produto->getID());
        $statementCommandEditar -> execute();
    }
}
