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

Com a classe feita, agora nós podemos criar um array de objetos, funcionando da seguinte forma: graças ao array_map isso é possível, o **array_map** é como se fosse um foreach, porém com a diferença de que ele serve para executar funções e nos devolver um novo array com as alterações passadas em sua **callback**, dentro do projeto, foi feito uma função para instanciar objetos , passando o array que queria tirar os dados e armazenando o novo array de objetos em uma nova variável:

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

## Excluindo um produto

Bom, para começarmos a entender como excluir esses arquivos, vamos usar a listagem que está na tela de admin. Nessa tela há apenas abertura de fechamento de tag **form**, e um input de **submit**. Para começar é necessário incluir nesse formulário para onde o usuário deve ir ao clicar no botão de submit, co contexto do projeto, devendo ir para o **excluir-produto.php**, e para isso devemos usar o **action** no formulário.

Depois disso, precisamos conseguir passar informação o suficiente para o nosso software entender qual produto deve ser excluído, mas como podemos fazer isso? Passando o id para esse outro lugar, mas como ele não tem exatamente um proposito além de ser apenas um envio de dados, pode ser deixado como **type="hidden"**, dessa forma não aparecendo na tela.

Para de fato enviar algo para a outra página, da maneira mais simples possível, vamos precisar incluir um **name** nesse input invisível, para que dessa forma ele consiga ser enviado para URL, já que por padrão o método de envio é do tipo **GET**.

```php
<form action="excluir-produto.php">
    <input type="hidden" name="id" value="<?= $dado->getId()?>">
    <input type="submit" class="botao-excluir" value="Excluir">
</form>
```


Agora chegou a hora de realmente criar a função que irá apagar as tuplas, primeiro criamos uma função publica que recebe como parâmetro o **$id** e criamos uma variável com a nossa instrução **SQL** de exclusão, porém com um detalhe, usaremos uma **interrogação ( ? )**, que podemos passar um parâmetro pra ela através do PDO e depois ao invés de usarmos o **query**, como temos feito até o momento, usaremos o **prepare** pois queremos trabalhar com instruções preparadas, ou seja, queremos prepará-las antes de enviá-las, pois ainda enviaremos um parâmetro como ID.

Depois disso, guardando esse Statement, usamos o método **bindValue**, que serve para evitar SQLInjections, pois forçamos que tudo que seja enviado seja tratado como dados, e não um comando. Além disso vai ser para enviar ao nosso comando, no lugar da interrogação, o $id que estamos obtendo como parametro desse método.

Por fim, usamos o método **execute**, fazendo com que o comando que preparamos finalmente seja executado.

```php
public function deletar($id) {
    $sqlCOmmandDelete = "DELETE * FROM produtos WHERE id = $id";
    $statementDelete = $this->pdo->prepare($sqlCOmmandDelete);
    statementDelete->bindValue(1, $id);
    $statementDelete->execute();
    }
```

## Adicionando um produto

Para começar, vamos precisar alterar a extensão do arquivo para o tipo **PHP**, e alterar o formulário para que faça seu envio pelo método **POST**, pois por padrão ele é sempre enviado como **GET**. Agora, seria interessante que ao cadastrarmos um produto, fosse criado um objeto do tipo **Produto** e fizéssemos essa persistência no banco de dados, para isso primeiro vamos precisar passar os **requires** para o arquivo de cadastro.

Com esse arquivo já com acesso as outras classes, instanciamos um novo produto, passando em seus parâmetros os itens salvos no **POST**, mas agora pense comigo, ao incluirmos um novo produto, podemos não saber exatamente qual será seu **ID**, então o certo seria criar esse objeto com essa propriedade nula, já que seria lhe dado um **ID** no banco de dados, fora que por regras de negócios, será necessário trocar a ordem do preço e imagem, para que possamos incluir um resultado padrão para as imagens, caso nenhuma seja passada.

Com isso feito, nos resta outro problema, ao acessar o cadastro podemos nos deparar com um erro do sistema tentando criar um objeto, mas sem dados para isso. Para corrigirmos isso, podemos fazer um simples condicional usando a **função** **isset**, passando o **POST** gerado pelo botão que usamos para dar submit, ou seja, com o **name** desse input no **POST**.

A função **ISSET** serve para verificarmos se a variável passada por parâmetro existe, caso exista será executado o que há dentro do bloco de condicional **IF**

```php
<?php

require_once("./src/conexao.php");
require_once("./src/Model.php");
require_once("./src/Repository.php");

if (isset($_POST['cadastro'])) {
    $produto = new Produto(
        null,
        $_POST['tipo'],
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['preco'],
        $_POST['imagem']
    );
}

?>
```

## Incluindo produto no banco

Com a criação do objeto feita, agora nós podemos adiciona-lo ao banco, o que é bem simples para falar a verdade. No nosso arquivo **Repository**, dentro da classe **ProdutoRepositorio** nós acrescentamos o método **salvar** passando como parâmetro o objeto criado. Dentro do método nós incluímos o código **SQL** com **?** no lugar dos values, onde os dados que vamos obter serão colocados. Depois com um **statement**, preparamos esse código **SQL**, e fazemos seus **bindValues**, passando cada uma das informações trazidas via getters do **MODEL.php**, por fim, usamos o método **execute**, para toda essa preparação ser executada.

```php
    public function salvar($produto) {
        $sqlCommandSave = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (?, ?, ?, ?, ?);";
        $statementSave = $this->pdo->prepare($sqlCommandSave);
        $statementSave->bindValue(1, $produto->getTipo());
        $statementSave->bindValue(2, $produto->getNome());
        $statementSave->bindValue(3, $produto->getDescricao());
        $statementSave->bindValue(4, $produto->getPrecoBruto());
        $statementSave->bindValue(5, $produto->getImagem());
        $statementSave->execute();
    }
```

No fim, basta instanciarmos um novo objeto de **ProdutoRepositorio**, passando a conexão com o **PDO** como parâmetro e chamando em seguida o método **salvar**, passando o produto criado.

```php
$produtoAdicionado = new ProdutoRepositorio($dbConnection);
$produtoAdicionado->salvar($produto);
header('Location: ./admin.php');
```

## Editando um produto

Primeiro para editarmos os dados de um produto, é necessário termos acesso aos dados já existentes desse produto, e o método mais fácil de pesquisa é através de seu id. No botão de edição na tela de **admin**, foi alterado a **href** para que referenciasse também ao **id** daquele usuário em especifico. Já na tela de **Repository**, dentro da classe **ProdutoRepositorio** preparamos o método **buscar** que cria um comando **SQL**, para obter os dados do produto que ter determinado **ID**, e depois executa-o, salvando posteriormente em uma variável para utilizar o método **fetch(PDO::FETCH_ASSOC)**, e depois retornando esses dados para o método **FormarObjeto**, passando esses dados como parâmetro para formar um objeto.

```php
    public function buscar ($id) {
        $sqlCommandBuscar = "SELECT * FROM produtos WHERE id = ?";
        $statementCommandBuscar = $this->pdo->prepare($sqlCommandBuscar);
        $statementCommandBuscar->bindValue (1, $id);
        $statementCommandBuscar->execute();

        $dados = $statementCommandBuscar->fetch(PDO::FETCH_ASSOC);
        return $this->formarObjeto($dados);
    }
```

Na tela de edição, agora, podemos criar uma nova instancia de **ProdutoRepositorio**, para utilizar seu método através de uma nova variável, para executar essa buscar através do **ID** obtido pelo **$_GET**_, apenas incluindo esses dados dinâmicos nos **value** dos inputs.

```php
$produtoRepositorio = new ProdutoRepositorio($dbConnection);
$produto = $produtoRepositorio->buscar($_GET['id']);
```

Mas como podemos de fato fazer essa alteração? Porque até o momento apenas sincronizando as informações e as trazendo para a tela de edição. Não é muito diferente de como nós fizemos a adição de produtos, primeiro precisamos incluir um novo método na classe **ProdutoRepositorio**, onde terá uma novo código **SQL** para a atualização das informações, nada muito diferente do que já foi visto.

```php
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
```

Com isso feito, para atualizar esses dados, vamos precisar criar um objeto na tela de **editar-produto**, onde obtemos os dados através de um método **POST**, fazendo uma ligação com o banco e depois chamando o método de edição para de fato substituir os dados obtidos com o método de **busca**. Como falado anteriormente, foram colocados **values** dinâmicos no formulário para termos uma visualização dos dados que pretendemos substituir, mas além disso, vamos precisar incluir um novo input nessa tela, para que possamos obter o **ID**, para que a edição ocorra corretamente ```<input type="hidden" name="id" value="<?= $produto->getId()?>">``` e incluímos uma condicional **ELSE**, para que caso não exista dados no **POST**, seja procurado esses dados:

```PHP
if (isset($_POST['editar'])) {
    $produto = new Produto(
        $_POST['id'],
        $_POST['tipo'],
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['preco'],
        $_POST['imagem']
    );
    $produtoEditar = new ProdutoRepositorio($dbConnection);
    $produtoEditar->editar($produto);
    header('Location: ./admin.php');
} else {
    $produto = $produtoRepositorio->buscar($_GET['id']);
}
```


##