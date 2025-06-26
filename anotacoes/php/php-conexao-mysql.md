
## Como funciona a relação entre o PHP e MySQL

Através de uma exemplo ficará claro como essa relação funciona. O cliente acessa uma loja online, e faz um pedido ao site, esse pedido é o **REQUEST** para o **SERVIDOR WEB**, eventualmente para a construção da resposta, será necessário comunicação com uma base de dados, ou seja, será feita uma **QUERY SQL** ou várias ao **SERVIDOR MYSQL** o servidor vai devolver resultados dessa query para o servidor web e depois um **RESPONSE** com html, css e etc para o cliente. Os resultados podem ser nenhum, um valor único, um array associativo, ou um array de objetos.

## MySQLi ou PDO?

O PHP tem duas formas de se conectar ao MySQL:

- Com a extensão **MySQLi** - _MySQL improved_
- **PDO** - _PHP Data Objects_

Ambas são aceitas e têm vantagens e desvantagens, vamos ver quais, rapidamente.

### MySQLi - MySQL improved

#### Vantagens
Pode ser usada de forma procedural ou orientada a objetos, ela tem um bom desempenho e é uma sintaxe relativamente simples.

#### Desvantagens
Só permite conexão com MySQL e as queries parametrizadas não tem parâmetros nomeados.

### PDO - PHP Data Objects

#### Vantagens
Totalmente orientada a objetos, tem parâmetros nomeados e permite a conexão com 12 tipos de bases de dados diferente.

#### Desvantagens
Não é tão performativo como o MySQLi.


## Importação de uma Base de Dados e Requisitos do PDO

Bom, para começar com um arquivo disponibilizado pelo professor, que foi colocado no banco e posteriormente feito um perfil com acesso apenas a essa database criada.

## Conexão via PDO & Controle de Erros

Vamos começar por aprender como conectar a nossa aplicação á base de dados importada no vídeo anterior.

O primeiro passo é definir as propriedades da ligação: 

```php
    //1. Definir as propriedades da ligação
    $database = 'udemy_loja_online';
    $username = 'user_loja_web';
    $password = '123456789Lu';
```

Agora nós precisamos efetuar a ligação, para isso, vamos criar uma instância da classe PDO. Necessitamos de 3 parâmetros:

- o DNS(Data Source Name), onde vamos especificar, no mínimo, o host e o nome da base de dados;

- o segundo parâmetro é o nome do usuário MySQL;

- e o terceiro a password desse usuário.

```php
    //2. Efetuar a ligação
    
    /*
    Para isso vamos criar uma instância da classe PDO. Necessitamos de 3 parâmetros: 

     - o DNS(Data Source Name), onde vamos especificar, no mínimo, o host e o nome da base de dados; 
     - o segundo parâmetro é o nome do úsuario MySQL; 
     - e o terceiro a password desse usuário.
    */

    $conexão = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);
```

Depois, podemos verificar se a ligação foi estabelecida corretamente, de uma forma muito simples, graças ao **getAttribute**: 

```php
  echo $estado = $conexão->getAttribute(PDO::ATTR_CONNECTION_STATUS); //127.0.0.1 via TCP/IP
```

Como podemos ver, conseguimos fazer a ligação á base de dados e estamos em condições de poder fazer as nossas queries. É importante perceber que existem 3 etapas numa comunicação com a base de dados:

1. Conectar com a base de dados;
2. Comunicar com a base de dados;
3. Fechar a ligação para libertar recursos.

A ligação vai ficar aberta até a destruição do objeto PDO(). Para "desligar" a conexão, basta destruir o objeto $conexao.

```php
$conexao = null;
```

Caso isso não seja feito, ele será destruido automaticamente no final do script. O PDO contém mecanismos que nos permitem identificar e tratar os erros de conexão, para a eventualidade de acontecerem. O bloco catch apanha uma PDOException. Esta exceção contém informações precisas sobre o erro. Já não é uma mensagem gigante. Ela contém um código e uma mensagem

```php
<?php 
    /*
    O PDO contém mecanismos que nos permitem identificar e tratar os erros de conexão, para a eventualidade de acontecerem
    */


    // definir as ligações

    $database = 'udemy_loja_oDSAnline';
    $user = 'user_loja_web';
    $password = '123456789Lu';

    try {
        $conexao = new PDO("mysql:host=127.0.0.1;dbname=$database", $user, $password);

        echo $status = $conexao->getAttribute(PDO::ATTR_CONNECTION_STATUS);

        $conexao = null;

    } catch (PDOException $e){
        echo "ERRO: " . $e->getMessage();
    }

    /*
        O bloco catch apanhou uma PDOException. Esta exceção contém informações precisas sobre o erro. Já não é uma mensagem gigante. ELa contém um código e uma mensagem
    */
?>
```

Por padrão, o PDO vai emitir uma excepção sempre que acontece um erro. graças ao **ERR_MODE** e o **ERR_EXCEPTION**

```php
<?php 
/*
    Por padrão, o PDO vai emitir uma excepção sempre que acontece um erro.
*/

$database = 'udemy_loja_online';
$user = 'user_loja_web';
$password = '123456789Lu';

try {

    $ligacao = new PDO("mysql:host=127.0.0.1;dbname=$user", $user, $password);

    /*
    Define o modo comos os erros serão tratados neste caso, sendo o padrão, indica que o modo de erro é a apresentação de exceções
    */

    $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo $status = $ligacao->getAttribute(PDO::ATTR_CONNECTION_STATUS);

    $ligacao = null;

} catch (PDOException $err) {
    echo "<pre>";
    print_r($err);

    echo "<hr>";
    print_r($err->errorInfo);
}
?>
```

## setAttribute e getAttribute

Como mostrado nos códigos acima, acabamos usando esse comando algumas vezes com umas condicionais, e elas são dessa forma:

```php
// Para verificarmos a conexão com o banco
getAttribute(PDO::ATTR_CONNECTION_STATUS);

// Define o modo com os erros serão tratados, no caso, dispara exceções que podem ser captadas no catch
setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Não apresentará erros, apesar deles ainda acontecerem
$ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

// Apresenta avisos
$ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
```

## OBTER RESULTADOS COM EXECUÇÃO DE QUERIES

Vamos obter dados a partir da base de dados, e ver como o PHP os pode receber:

```php
<?php 
    // OBTER RESULTADOS COM EXECUÇÃO DE QUERIES

    /*
    Vamos obter dados a partir da base de dados, e ver como o PHP os pode receber
    */

    //Configurações
    $database = 'udemy_loja_online';
    $user = 'user_loja_web';
    $password = '123456789Lu';

    //ligação
    $ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $user, $password);

    //----------------------------
    // Comunicação simples

    //query() é um método do objeto PDO, esse método vai permitir adicionar ums string de ums instrução SQL, para eu dizer ao banco o que pretendo fazer

    $resultados = $ligacao->query('SELECT * FROM produtos');
    echo '<pre>';
    print_r($resultados);
    // O retorno é um objeto PDOStatement. Aparentemente não contém os resultados.
    
    //----------------------------

    //O método fetchAll() também é um método do PDO, e básicamente ele traz todo o conteúdo da nossa query, o que pode parecer ser funcional, mas isso acaba trazendo dados desnecessários.
    $resultados = $ligacao->query('SELECT * FROM produtos')->fetchAll();
    echo '<pre>';
    print_r($resultados);
?>
```

Os métodos **fetch( )** e **fetchAll( )** diferem no seguinte aspecto: fetch() vai buscar o próximo elemento da coleção de dados. fetchAll() vai buscar todos de uma vez.

```php
    //Configurações
    $database = 'udemy_loja_online';
    $user = 'user_loja_web';
    $password = '123456789Lu';

    //ligação
    $ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $user, $password);

    //utilização do fetch()
    $resultados = $ligacao->query('SELECT * FROM produtos')->fetch();
    echo '<pre>';
    print_r($resultados);

    //Com o fetch fomos apenas buscar o primeiro elemento da coleçao

    $ligacao = null;
?>
```

Agora usando o método **FetchAll( )**

```php
<?php 
/*
Se usármos o método fetchAll ( )...
*/

$database = 'udemy_loja_online';
$user = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $user, $password);

$resultados = $ligacao->query("SELECT * FROM produtos")->fetchAll();

foreach ($resultados as $linha){
    echo "Produtos: <strong>" . $linha['produto']. "</strong><br>";
}

// A query devolve um conjunto de resultados. O ciclo foreache percorreu cada uma das linhas do resultado, presentando apenas o nome.
?>
```

## Obter dados em diferentes formatos

Já vimos que temos vindo a obter resultados em forma de array associativo. Vamo perceber o que isso significa:


```PHP
<?php 
// OBTER DADOS EM DIFERENTES FORMATOS 

/*
Já vimos que temos vindo a obter resultados em forma de array associativo. Vamo perceber o que isso significa.
*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

$resultados = $ligacao->query('SELECT * FROM produtos')->fetchAll(PDO::FETCH_ASSOC);

$ligacao = null;

/*
Quando chegamos a este ponto do script, a ligação já foi feita, já foi executada a query que foi buscar TODOS os dados da tabela produtos.

Vamos analisar o que foi guardado nos $resultados
*/

echo "<pre>";
print_r($resultados);
?>
```

O primeiro produto da coleção (assim como os restantes), vem em formato de array que, simultaneamente, têm chaves numéricas e chaves alfanuméricas - um array associativo. Não precisamos dessa repetição. Vamos dizer ao PDO, como queremos que os dados venham.

Em vez do método fetchAll sem qualquer parâmetro, podemos especificar de que forma queremos os dados.

NOTA: Esta parametrização também vale para o método fetch( ).

- **PDO::FETCH_BOTH** - É a opção padrão. Retorna um array com chaves numéricas e alfanuméricas (associativas).

- **PDO::FETCH_NUM** - Apenas o array com chaves numéricas com índice 0. É atribuída uma chave numérica a cada coluna.

- **PDO::FETCH_ASSOC** - Apenas o array com chaves alfanuméricas (associativas). As chaves são os nomes das colunas da tabela.

- **PDO::FETCH_OBJ** - Retorna os valores organizados num objeto anonimo em que cada elemento contém as propriedades com os nomes das colunas da tabela.

Podemos acrescentar propriedades e métodos na classe e executar operações quando os dados são guardados. Neste caso adicionei uma propriedade que não existe na base de dados. Preço por uma dúzia. Como sei o valos de cada unidade, o construtor vai multiplicar esse valor por doze:

``` php
<?php 
/*
Podemos acrescentar propriedades e métodos na classe e executar operações quando os dados são guardados.

Neste caso adicionei uma propriedade que não existe na base de dados. Preço por uma dúzia. Como sei o valos de cada unidade, o construtor vai multiplicar esse valor por doze
*/

class Produto {
    public $id;
    public $produto;
    public $preco_unidade;
    public $preco_duzia;

    public function __construct() {
        $this->preco_duzia = $this->preco_unidade * 12;
    }
}

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

$resultados = $ligacao->query('SELECT * FROM produtos')->fetchAll(PDO::FETCH_CLASS, 'Produto');

$ligacao = null;

echo "<pre>";
print_r($resultados);
?>
```

Uma nota final sobre esta matéria. Existem outras formas de indicar ao PDO como deve devolver os resultados. Além disso, existe um outro método chamado **setFetchMode**, que nos permite definir o tipo de fetch que será feito.

```php
<?php 
/*
Uma nota final sobre esta matéria. Existem outras formas de indicar ao PDO como deve devolver os resultados.
*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

$resultados = $ligacao->query('SELECT * FROM produtos');
$resultados->setFetchMode(PDO::FETCH_ASSOC);

$ligacao = null;

while ($linha = $resultados->fetch()) {
    echo "Produto: <strong>" . $linha['produto'] . "</strong> - " . "Preço: <strong>" . $linha['preco_unidade'] . "</strong><br>";
}
?>
```

## SQL INJECTION - O PROBLEMA DE SEGURANÇA

Nessa aula vamos simular um sistema de login para vermos possáveis fragilidades das nossas queries que podem comprometer a segurança da aplicação.

Mas antes, imagine que temos um formulário, e seu cliente poderá escolher o que colocar no Username ou senha, nisso podemos nos deparar com um expert em SQL, que irá enviar por essa querie uma combinação de símbolos que farão com que a querie com os valores submetidos façam um resultado não desejado.


## MAIS SEGURANÇA COM CONSULTAS PARAMETRIZADAS

No vídeo anterior vimos uma das principais falhas evocadas no uso do PHP e na sua conexão com o MySQL: Para solucionar este problema que vimos, vamos voltar ao exercicio mas, dessa vez, com a execução da query de uma forma diferente.

```php
<?php

// dados de ligação
$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = 'c2hifo8akeka5iriKOT4X2N2NIG3jE';

// ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database;charset=utf8", $username, $password);

$parametros = [
    ':u' => $_POST['text_username'],
    ':p' => $_POST['text_passwrd']
];

$comando = $ligacao->prepare("SELECT * FROM usuarios WHERE username = :u AND passwrd = :p");
$comando->execute($parametros);
$resultados = $comando->fetchAll(PDO::FETCH_OBJ);

echo '<pre>';
print_r($resultados);

if(count($resultados) == 0){
    echo 'Login inválido.<br>';
} else {
    echo 'Login OK!<br>';
}

// vamos testar a expressão ' or ''=' no campo da password
// já não vamos ter o problema anterior
```

Repare que nós temos um array associativo com ':u' e ':p', e estou usando isso para dizer que ao invés de estar a concatenar os dados na clausula where, estamos colocando um array, onde :u e o :p vão ser os valores que vierem do formulário

Depois ao invés de usar a função **query**, usamos a função **prepare**, esse prepare, está a espera que lhe sejam fornecido parâmetros, isso ocorre pela função **execute**, dessa forma estamos incluindo esse array no prepare, onde ocorrerá a troca de dados do array, porém isso é feito de forma segura pelo próprio **PDO**.


## CONTROLAR COMUNICAÇÕES COM TRANSAÇÕES

A transação é um mecanismo processual de comunicação com a base de dados no qual podemos efetuar um conjunto de instruções SQL e, caso aconteça um erro, podemos "voltar atrás" nas execuções que foram efetuadas. No caso de haver sucesso, podemos finalizar essas comunicações todas.

```php
<?php 

// CONTROLAR COMUNICAÇÕES COM TRANSAÇÕES

/*
A transação é um mecanismo processual de comunicação com a base de dados no qual podemos efetuar um conjunto de instruções SQL e, caso aconteça um erro, podemos "voltar atrás" nas execuções que foram efetuadas. No caso de haver sucesso, podemos finalizar essas comunicações todas

Vamos ver com um exemplo.
*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

try {
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Keven', 'aaaaaaa')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Pedro', 'bbbbbbb')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Marcelo', 'ccccccc')");

    // erro proposital
    $ligacao->exec("INSERT INTO users VALUES(0, 'Victor', 'aabbccd')");
} catch (PDOException $err) {
    echo 'Aconteceu um erro no SQL';
} finally {
    $resultados = $ligacao->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_OBJ);

    foreach ($resultados as $resultado){
        echo "<br>Nome: $resultado->username<br>";
    }
}
?>
```

Veja agora como é simples controlar eventuais erros num processo de comunicação. Foi adicionado um **beginTransaction()** antes de iniciar as comunicações.  Depois as comunicações, no final, não existindo nenhum erro, surge o **commit()**. O **commit()** vai consolidar na base de dados todas as comunicações definidas. 

No caso de acontecer algum erro, como é o caso, as 3 primeiras inserções não vão ser aplicadas, porque vai ser disparada a exceção e, dentro do bloco do catch, temos um **rollBack()**. O **rollBack()** indica que tudo o que foi inserido com sucesso, dentro da transação, deve ficar retido.

```php
<?php 
/*
Vê como é simples controlar eventuais erros num processo de comunicação. Foi adicionado 
um beginTransaction() antes de iniciar as comunicações. Depois as comunicações.
No final, não existindo nenhum erro, surge o commit(). O commit() vai consolidar na base
de dados todas as comunicações definidas.

No caso de acontecer algum erro, como é o caso, as 3 primeiras inserções não vão ser
aplicadas, porque vai ser disparada a exceção e, dentro do bloco do catch, temos um
rollBack().

O rollBack() indica que tudo o que foi inserido com sucesso, dentro da transação, deve ficar retido.
*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

try {
    $ligacao->beginTransaction();
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Keven', 'aaaaaaa')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Pedro', 'bbbbbbb')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Marcelo', 'ccccccc')");
    // erro proposital
    $ligacao->exec("INSERT INTO users VALUES(0, 'Victor', 'aabbccd')");
    $ligacao->commit();
} catch (PDOException $err) {
    $ligacao->rollBack();
    echo 'Aconteceu um erro no SQL';
} finally {
    $resultados = $ligacao->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_OBJ);

    foreach ($resultados as $resultado){
        echo "<br>Nome: $resultado->username<br>";
    }
}
?>
```

## CONCLUSÃO SOBRE O QUE VIMOS ATÉ O MOMENTO

* Aprendemos a conectar o PHP com o MySQL via PDO;
* Habitualmente, vamos desenvolver aplicações recorrendo a frameworks PHP (CodeIgniter, CakePHP, Symfony, Laravel...);
* Podemos usar estes conhecimentos para pequenos projetos;
	* Automações que executam tarefas simples;
	* Execução de processos para alimentação de bases de dados;

A construção de uma classe pode contribuir para diminuir o tempo de desenvolvimento destas pequenas soluções.

**EXEMPLOS:

Vamos desenvolver um conjunto de scripts que carregam dados de ficheiros CSV e atualizam ou esmagam informação numa base de dados.

Vamos criar uma API simples que não requer frameworks. 

Criar um pequeno sistema que recolhe informações de uma base de dados e exporta essa informação para um ficheiro.

**PRATICA**

Vamos criar uma classe para executar as nossas operações **CRUD**

## FUNÇÃO EXEC()

Serve para executar um comando SQL.

## CONCLUSÕES & EXERCÍCIOS PRÁTICOS COM CRUD

Esse módulo serviu para mostrar com ligar o PHP ao MySQL via PDO; Entender os conceitos desse módulo é importante para perceber como a comunicação com bases de dados funciona.

**CRUD** - Create, Read, Update e Delete. Nossa aplicação gera as seguintes funcionalidades: Gerir um lista de contatos com nomes e telefones, que permita adicionar, editar e remover contatos, impedir telefones duplicados, permitir pesquisa por nome e/ou telefone e funcionalidade para exportação dos dados para CSV.