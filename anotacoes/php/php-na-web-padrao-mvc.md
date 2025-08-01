## Papel do PHP na WEB

A WEB utiliza um protocolo HTTP, que funciona com clientes e servidores, no nosso caso, o nosso próprio navegador web é o cliente que faz uma requisição o servidor embutido do PHP, que está rodando na nossa máquina também.

A infraestrutura do servidor pode ser muito diferente de sistema para sistema. Existem cenários em que temos apenas o PHP, como o nosso caso, mas existem infraestruturas mais robustas com servidor web (como o Nginx, Apache ou Caddy), com servidor de aplicação (como PHP-FPM), com servidor de banco de dados (como MySQL ou PostgresSQL), com ambientes de cache, entre outros.

Portanto, nosso navegador faz um pedido para nosso servidor que está rodando o PHP. Por exemplo, ao acessar a página inicial do AluraPlay:

```
http://localhost:8080/index.html
```

O navegador (cliente) está fazendo um requisição para o servidor que está rodando em **localhost** na porta **8080**, pedindo um recurso ao acessar o caminho **index.html**.

O servidor embutido do PHP buscará um arquivo com o nome `index.html` e tentará interpretá-lo como um arquivo PHP. Todo conteúdo que não estiver entre as _tags_ do PHP, será interpretado como texto.

## Recapitulando


O navegador faz uma requisição (_request_) para o servidor, então o servidor executa uma lógica que configuramos e devolve uma resposta (_response_) para o cliente. Uma vez que o navegador consegue interpretar HTML, o resultado é uma página pronta. Ou seja, o PHP não está gerando um HTML. Ele está simplesmente interpretando o código PHP e devolvendo como texto tudo que não for PHP, independentemente do formato do arquivo. Como o navegador entende HTML, ele projeta essa interface na nossa tela.

## Criando um banco

O tipo de banco escolhido foi o **PostgreSQL**, um sistema de banco de dados **relacional** robusto que funciona em um servidor separado. Para utilizá-lo, informamos o **endereço** do servidor, a **porta**, o **nome do banco**, **usuário** e **senha** na criação do objeto **PDO**, e depois executamos um script **SQL** para criar as tabelas e manipular os dados:

```php
<?php

$host = 'localhost';
$port = '5432';
$dbname = 'aluraplay';

$user = 'postgres';
$password = '12345';

$pdo = new PDO("pgsql:host=$host; port=$port; dbname=$dbname", $user, $password);

$sql = "CREATE TABLE videos(id SERIAL PRIMARY KEY, url VARCHAR(100), title VARCHAR(50))";
$pdo->exec($sql);

?>
```

## Inserindo um vídeo

Para inserirmos um vídeo de fato no site via PHP, primeiro precisamos refinar o nosso arquivo **enviar-video.html**, na tag **form**, onde nós temos o nosso formulário, vamos passar dois parâmetros, um chamado **action** que serve para definir o local para onde estamos enviando nossos dados preenchidos no formulário, e o segundo é o **method**, onde definimos o método que estamos usando, sendo o **POST**, pois quando usamos o **GET**, estamos enviando os dados via URL, o que é pode ser considerado menos seguro e menos eficiente, pois existe um limite de caracteres em uma URL. Porém deixando claro que, no **POST** os dados também ficam visíveis, porém o método para visualizarmos é mais complicado: 

```php
<form class="container__formulario" action="./new-video.php" method="post">
```

Agora, por escolha antecipada minha, decidi criar uma classe separada para a **conexão com o banco de dados**, para evitar copiar e colar a conexão em **múltiplos arquivos**. Assim, sem a necessidade de repetir a ligação com o banco, criei o script **PHP _new-video_**, onde importei a conexão com o banco, armazenei os dados enviados pelo formulário em variáveis via método **POST**, defini uma variável com o comando **SQL** de inserção, preparei esse comando através do **statement**, fiz os respectivos **bindValue()** dos dados e, finalmente, executei o comando com **execute()**.

```php
<?php

require "./connection.php";

$url = $_POST['url'];
$title = $_POST['titulo'];

$sql = "INSERT INTO videos (url, title) VALUES (?, ?)";

$statement = $pdo->prepare($sql);

$statement->bindValue(1, $url);
$statement->bindValue(2, $title);

$statement->execute();
```

## Realizando a busca

Antes de mais nada, existe um problema no nosso código que é o fato do usuário atualizar a página, e o dado ser enviado mais uma vez para o banco, gerando duplicidade de dados. Como solução para desse problema bastante comum na web, usaremos o **padrão Post\Redirect\Get**.

### **Padrão Post\Redirect\Get**

Ao receber uma requisição com o verbo **POST**, após executar a ação, vamos redirecionar a pessoa usuária para outra página, utilizando o método **GET**. Dessa forma, ela poderá atualizar quantas vezes quiser e o comportamento não mudará.
Há um cabeçalho HTTP chamado **LOCATION**, quando o servidor o envia, o navegador sabe que deve redirecionar a pessoa. Como o **PHP** foi feito para web, esse processo também será bem simples - basta chamar a função **header( )**.

```php
<?php

require_once "./connection.php";

$title = $_POST['title'];
$url = $_POST['url'];

$sql = "INSERT INTO videos (url, title) VALUES (:url, :title)";

$statement = $pdo->prepare($sql);
$statement->bindValue(":url", $url);
$statement->bindValue(":title", $title);


if ($statement->execute() === false) {
    header('Location: ./index.php?sucesso=0');
    exit;
} else {
    header('Location: ./index.php?sucesso=1');
    exit;
}

```

## Realizando a exclusão

Para a exclusão dos dados, é necessário modificarmos o nosso form um pouco. No botão de excluir, vamos alterar o caminho de envio, para que seja enviado para o novo arquivo php de exclusão, com o id do vídeo na **URL**:

```php
<a href="./remove-video.php?id=<?= $video['id'] ?>">Excluir</a>
```

No remove-video podemos coletar o id que foi passado pelo método **GET**, criamos o comando **SQL** de exclusão e depois podemos começar a preparar esse comando, usando a função **ValueBind( )** para incluir o id no comando e depois executar:

```php
<?php 

require_once("./connection.php");

$id = $_GET['id'];
$sql = 'DELETE FROM videos WHERE id = :id';

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);

if ($statement->execute() === false) {
    header('Location: ./index.php?sucesso=0');
} else {
    header('Location: ./index.php?sucesso=1');
}
?>
```

## Filter_input ( )

Ao invés de acessar diretamente o POST, no **new_video**, agora iremos usar uma função chamada **filter_input**, ela traz um dado de um input, de algo que veio por uma requisicação, e logo em seguida será filtrado/validado por alguma regra:

```php
$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

if ('url' === false) {
    header('Location: /index.php?sucesso=0');
    exit;
}

$title = filter_input(INPUT_POST, 'title');
```

## Limpando o código

Nessa parte, iremos passar por nossos arquivos para melhorar um pouco o nosso código geral, começando por excluir o arquivo de criação da tabela de video. Outra coisa são os aquivos de formulario e de listagem de videos, que tem um inicio e fim do html iguais. Foi criado dois arquivos de inicio e fim desse html e feito um require.

## Por que centralizar

Em uma aplicação mais bem-estruturada, a prática de repetição de código seria inconcebível! Nosso projeto ainda é relativamente pequeno e simples, mas imagine como essa prática seria problemática em um sistema grande! Teríamos que copiar a conexão com o banco de dados, a conexão com outros sistemas, configurações de como nosso sistema roda, variáveis que dependem do ambiente, entre outros recursos.

Existem muitas coisas que podemos centralizar, como configurações, detalhes de conexão e dependências do projeto. Há muitas ações que realizaremos em todas as requisições e não é nada prático repetir código em todos os arquivos. O que é normalmente feito em aplicações PHP é ter um arquivo em que deixamos a **inicialização da aplicação.** 

Esse arquivo não incluirá nenhuma regra de negócio, como verificar se um parâmetro é inteiro ou buscar dados no banco com um filtro específico. A inicialização consistirá em processos como carregar arquivos de configurações, configurar as dependências do nosso sistema, verificar qual URL foi acessada e chamar o arquivo correspondente. Ou seja, ele inicializa a aplicação e não executa nada por conta própria, mas chama outros arquivos para serem executados. É essa prática que implementaremos a seguir, e o nome dela é **_front-controller_**.

## Front-controller

Um _front-controller_ é um controlador que fica à frente de tudo, controlando tudo que entra no sistema. Esse arquivo receberá todas as requisições e redirecioná-las para os arquivos necessários para cada etapa do processo. 

Primeiro foi necessário alterar alguns caminhos no nosso código, por exemplo removendo a extensão **.php** e também porque o nosso antigo index foi alterado para **listagem-videos**, e o novo index servirá para redirecionamento de paǵinas, seguindo nossa ideia de front-controller:

```php
<?php

declare(strict_types=1);

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    require_once 'listagem-videos.php';
} elseif ($_SERVER['PATH_INFO'] === '/novo-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once 'formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'novo-video.php';
    }
}  elseif ($_SERVER['PATH_INFO'] === '/editar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once 'formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'editar-video.php';
    }
} else if ($_SERVER['PATH_INFO'] === '/remover-video') {
	require_once 'remover-video.php';
}
```

## Limpando o código

Nesse momento vamos passar pelos arquivos e vamos analisa-los para ver o que podemos melhorar nesse primeiro momento. A principio há várias melhorias que podemos fazer no código, mas iremos focar nisso em outro momento.

Por agora, podemos visualizar que o começo do html  quanto o final tanto do arquivo de **formulario** e de **listagem-videos** é igual, ou seja, podemos fazer arquivos separados e apenas realizar uma requisição disso.

## Organizando a pasta e melhorando o código

Para começarmos com as melhorias no nosso código, é interessante criarmos uma pasta **src**, para começarmos a usar um autolader que faça as buscas, criaremos um **composer.json** configurando esse autoload, e depois usaremos o comando **composer dumpautoload** para criar automaticamente a pasta vendor:

```json
{
    "autoload": {
        "psr-4": {
            "Alura\\Mvc\\": "src/"
        }
    }
}
```

Para finalizar essa primeira parte, vamos apenas usar um require no **index.php**, chamando esse autoload. Dentro da pasta **src** criaremos primeiro a pasta **Entity** com o **Video.php**, que será o nosso modelo do vídeo:

```php
<?php
namespace Alura\Mvc\Entity;

class Video
{
    public readonly int $id;
    public readonly string $url;

    public function __construct(
        string $url,
        public readonly string $title,
    ) {
        $this->setUrl($url);
    }

    private function setUrl(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) == false) {
            throw new \InvalidArgumentException();
        }

        $this->url = $url;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}

```

E também na pasta src, criaremos a pasta de Repository, onde existirá o **VideoRepository**, que conterá nossas funções de adição, remoção, edição, enfim:

```php
<?php

namespace Alura\Mvc\Repository;

use Alura\Mvc\Entity\Video;

use PDO;
class VideoRepository {
    /**
     * @param PDO $pdo
     */
    public function __construct(private PDO $pdo) {
    }

    /**
     * @param Video $video
     * @return bool
     */
    public function add(Video $video) : bool {
        $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->title);

        $result = $statement->execute();
        $id = $this->pdo->lastInsertId();

        $video->setId(intval($id));

        return $result;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function remove(int $id): bool {
        $sql = 'DELETE FROM videos WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);

        return $statement->execute();
    }

    /**
     * @param Video $video
     * @return bool
     */
    public function update(Video $video): bool {
        $sql = 'UPDATE videos SET url = :url, title = :title WHERE id = :id;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':url', $video->url);
        $statement->bindValue(':title', $video->title);
        $statement->bindValue(':id', $video->id, PDO::PARAM_INT);

        return $statement->execute();
    }

    /**
     * @return Video[]
     */
    public function all(): array {
        $videoList = $this->pdo
            ->query('SELECT * FROM videos;')
            ->fetchAll(PDO::FETCH_ASSOC);
        return array_map(
            function (array $videoData) {
                $video = new Video($videoData['url'], $videoData['title']);
                $video->setId($videoData['id']);

                return $video;
        }, $videoList);
    }
}
```

Depois disso tudo feito, bastará editar os arquivos para que comecem a trabalhar com objetos.

## Controladores de requisição

O controador de requisição terá um método que processa a requisição. Este processamento, por sua vez, consiste em criar dependêNcias necessárias, receber os dados da requisição e montar a resposta. E para isso, vamos começar com o **listagem-videos.php**

Primeiro criamos uma pasta **Controller**, referente ao controlador de requisições. Nessa subpastam criaremos uma nova classe denominada **VideoListController**. Nessa classe, chamaremos um método que processa as requisições de **processaRequisicao**. Por enquanto, não receberá nenhum parâmetro nem retornará nada, apenas lidará com a requisição e exibirá o nosso HTML ou enviará cabeçalhos HTTP, por exemplo, dependendo do que for necessário.

Agora, precisamos exibir algum arquivo de visualização. Neste caso, poderíamos pegar tudo que está no arquivo `listagem-videos.php`, com exceção do trecho do repositório, e colar em `$videoList`, apagando somente a tag de abertura `<?php>` e de fechamento `?>` respectivamente no início e no fim do código.

Pensando em melhorá-lo ainda mais, ao invés de criar o `PDO`, pegar o `dbPath` e instaciar o repositório, podemos receber este repositório como parâmetro de `--construct` e limpar o construtor, pois passaremos o trecho de código que está nele para a `index`.

```php
<?php

namespace Alura\Mvc\Controller;
use \Alura\Mvc\Repository\VideoRepository;
use PDO;

class VideoListController
{
    /**
     * Recebe o repositório por parâmetro;
     *
     * @param VideoRepository $videoRepository
     */
    public function __construct(private VideoRepository $videoRepository)
    {

    }

    /**
     * lida com a requisição e exibe o html;
     *
     * @return void
     */
    public function processaRequisicao(): void 
    {
        $videoList = $this->videoRepository->all();
        require_once __DIR__ . '/../../inicio-html.php';
        ?>
        <ul class="videos__container">
            <?php foreach ($videoList as $video): ?>
            <li class="videos__item">
                <iframe width="100%" height="72%" src="<?= $video->url ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="descricao-video">
                    <h3><?= $video->title ?></h3>
                    <div class="acoes-video">
                        <a href="/editar-video?id=<?= $video->id; ?>">Editar</a>
                        <a href="/remover-video?id=<?= $video->id; ?>">Excluir</a>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php require_once __DIR__ . "/../../fim-html.php";
    }
}

```

Já no **index.php**, será necessário alterar um pouco o arquivo para que dessa forma, seja possível criar a nossa instancia de **VideoRepository**:

```php
<?php

declare(strict_types=1);

use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Repository\VideoRepository;
$path = __DIR__;
require_once __DIR__ . '/../vendor/autoload.php';
require_once $path . '/../connection.php';

$videoRepository = new VideoRepository($pdo);

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    $controller = new VideoListController($videoRepository);
    $controller->processaRequisicao();
```