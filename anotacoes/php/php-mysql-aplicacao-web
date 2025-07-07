## Usando PHP no HTML

Para exemplificar o funcionamento do html e php, foi criado uma array de arrays associativos.

## Conectando com o banco de dados

Com o banco criado, primeiro criamos uma nova pasta chamada **src**, com um novo arquivo PHP, o **conexao.php**. Dentro desse arquivos, criamos uma variável chamada **pdo**, e depois instanciamos essa variável com a classe **PDO**, onde passamos a string de conexão com a **database, password e username**, onde nem todas as informações que eu citei são obrigatórias:

```php
<?php

	$username = 'serenattoUser';
	$password = '123456789Lu';

	try {
	    $dbConnection = new PDO ("mysql:host=localhost;dbname=serenatto", $username, $password);
	} catch (PDOException $e) {
	    echo "Falha ao tentar conectar no banco: " . $e->getMessage();
	}

?>
```

## Buscando os produtos

Primeiro, para trazer os dados para a tela de uma maneira mais apropriada, nós fazemos o seguinte, primeiro criamos uma variável para armazenar o nosso comando **SQL**, depois precisamos pegar os resultados de query, nesse ponto entra o **statement**, que acaba criando um objeto com o resultado da nossa consulta **SQL**, que posteriormente usamos os métodos **fetch** ou **fetchAll** para processar esses dados de maneira adequeda. O **statement** é como se fosse um intermediario entre os dados.

```php
<?php

    require_once('./src/conexao.php');

    $sqlCommand = "SELECT * FROM produtos WHERE tipo = 'café';";
    $sqlCommand2 = "SELECT * FROM produtos WHERE tipo = 'almoço';";
    
    $statement = $dbConnection -> query($sqlCommand);
    $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

    $statement2 = $dbConnection -> query($sqlCommand2);
    $produtosAlmoco = $statement2->fetchAll(PDO::FETCH_ASSOC)

?>
```

## Criando uma classe Produto

Durante as aulas, afim de organizar melhor nosso código, foi criado uma classe de Produto, para servir de base a a futura construção de objetos a partir do **statement**:

```php
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
```

## Usando um array de produtos

Com a classe feita, agora nós podemos criar um array de objetos, funcionando da seguinte forma: graças ao array_map isso é possível, o **array_map** é como se fosse um foreach, porém com a diferença de que ele serve para executar funções e nos devolver um novo array com as alterações passadas em sua **calback**, dentro do projeto, foi feito uma função para instanciar objetos , passando o array que queria tirar os dados e armazenando o novo array de objetos em uma nova variável:

```php
    {
        $sqlCommand = "SELECT * FROM produtos WHERE tipo = 'café' ORDER BY preco ASC;";

        $statement = $this->pdo->query($sqlCommand);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function ($cafe) {
            return new Produto($cafe['id'], $cafe['tipo'], $cafe['nome'], $cafe['descricao'], $cafe['imagem'], $cafe['preco']);
        }, $produtosCafe);

        return $dadosCafe;
    }
```