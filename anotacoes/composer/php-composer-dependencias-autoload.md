 introdução ao curso de PHP Composer, o instrutor Vinicius Dias apresenta o Composer como uma ferramenta essencial para gerenciamento de dependências em projetos PHP. Você vai aprender a construir um pacote para ser disponibilizado para instalação via Composer.

## O que é o Composer?

Em resumo, é um gerenciador de pacotes, porém diferentemente de gerenciadores de pacotes do sistema operacional, o Composer instala dependências específicas para cada projeto.

## Como iniciar um projeto composer?

Caso seja usado o PHPStorm, basta irmos em **tools** e logo depois em **composer**. Porém caso não esteja, pelo terminal, meu caso, usamos o comando **composer init** no terminal, logo em seguida ele pede um nome do pacote, e existe uma regra para isso, que primeiro colocamos quem está distribuindo o pacote, seja nome do github, empresa, etc, e logo após pede o nome do pacote, por exemplo: **kevenscharttz / buscador-cursos**.

Depois podemos passar uma descrição para o pacote, onde podemos incluir um pequeno resumo falando sobre ele, após isso lidamos com a opção **Minimum Stability**, que ser para informar se, ao buscarmos pacotes, queremos obter suas versões mais novas, que ainda não foram completamente testadas, ou em fases de desenvolvimento.

Podemos especificar o tipo de pacote que estamos criando, geralmente quando estamos criando um projeto completo, usamos o tipo **project**, quando temos um projeto apenas com as informações do composer.json, usamos o tipo **metapackage**, e no nosso caso, será um tipo **biblioteca**.

Podemos especificar também o tipo de licença que estaremos ou não usando, e incluir já outras dependências que sabemos que serão necessárias.

Depois podemos definir dependências necessárias para sua necessidade, é como se você dissesse com antecedencia o que vai usar no seu projeto, para já deixa-ló pronto. E além desse, podemos fazer algo parecido, mas, para as dependências de desenvolvimento

## Buscando Pacotes

Para o projeto que está sendo desenvolvido, precisaremos acessar o site da Alura, fazer uma requisição GET, pegar o HTML, percorre-ló, ou seja, fazer um craw. Então serão necessários dois pacotes, um para fazer uma requisição HTTP e outro para leitura de DOM, para isso, através do repositório **Packagist** onde obtemos o **Guzzle** para a requisição e o **Symfony DomCrawler** para o DOM.

## Instalando o Guzzle e DomCrawler

Primeiro, precisamos ressaltar que tudo isso é possível de ser feito apenas pelo PHP, mas, leva muito trabalho, e alguém já passou por isso e deixou essa tarefa pronta para o uso de todos, é disso que se trata um componente, para realizar uma tarefa especifica muito bem. Pelo **Packagist**, podemos obter os comandos de terminal para a instalação desses dois pacotes, porém podemos também apenas  colocar os pacotes manualmente no composer.json. Claro, depois vamos precisar dar um **composer install** e depois usar o **composer update** para atualizar os pacotes, se houver atualização.

Na pagina do Packagist, existe uma sessão onde podemos ver o source desse pacote, da onde ele está sendo pego, tudo, será copiado para uma pasta chamada vendor, e com ele, virão todas as suas dependências.

Depois, podemos verificar a documentação desse pacote, por exemplo o Guzzle, para saber como utilizar o pacote, sem a necessidade de ficar olhando arquivo por arquivo para entender.

## Buscando os cursos da Alura

Antes de inciar enfim o código que iremos fazer, é comentado sobre como o **composer.lock** funciona e o **composer.json**, onde podemos guardar o registro das versões dos pacotes, atualizar os pacotes "automaticamente" quando houver atualizações, enfim. Olhando a documentação nos é mostrado como obter os dados da página que queremos, e obter seus dados:

```php
<?php

	use GuzzleHttp\Client;
	use Symfony\Component\DomCrawler\Crawler;
	
	$client = new Client();
	$response = $client->request("GET", "https://www.alura.com.br/cursos-online-programacao/php");
	
	$html = $response->getBody();
	$crawler = new Crawler($html);

?>
```

Essa é a estrutura básica, onde estamos usando os **namespaces** de **Client** e **Crawler**. Depois instanciamos um cliente, passamos para uma variavel **response**, usando o método **request**, passando como argumentos que queremos usar o método **GET** e passando o link da página de cursos que vamos obter os dados.

Depois, estamos guardando essa resposta em uma varíavel **html**, chamando o método **getBody**, para pegar o conteúdo da página. Por fim, instanciamos um objeto do tipo **Crawler**, passando como argumento a variável html citada acima.

Apesar de parecer que está tudo feito, ainda não está, alguns conceitos e códigos precisam ser feitos para obtermos de fato o que queremos, como mostrado abaixo: 

```php
<?php 

    require 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use Symfony\Component\DomCrawler\Crawler;

    $client = new Client();

    $response = $client->request("GET", "https://www.alura.com.br/cursos-online-programacao/php");

    echo $response->getStatusCode();
    $html = $response->getBody();
    
    $crawler = new Crawler();
    $crawler -> addHtmlContent($html);

    $cursos = $crawler -> filter ('.card-curso__nome');
    
    foreach ($cursos as $curso) {
        echo $curso -> textContent . PHP_EOL;
    }
?>
```

Agora, estramos passando essa variável **crawler** que criamos para uma nova variável chamada **cursos**, onde usamos o método filter, que serve para rastrearmos seletivamente o conteúdo que queremos no site, neste caso, estamos pegando apenas aqueles que possuem a classe **card-curso__nome**.

Depois, estamos fazendo um ciclo de repetição foreach para imprimirmos na tela através do echo, apenas o conteúdo de texto, através do parametro **textContent**, acoplando-o com uma constante chamada **PHP_EOL**, para que depois de um dos dados serem obtidos, o texto vá até o final da linha e quebre, fazendo com que o próximo conteúdo fique uma linha abaixo.

Além disso tudo que eu citei, para que essa aplicação funcione, é necessário fazermos um require dos itens que estamos usando nos **namespaces**, mas daria muito trabalho e até iria poluir visualmente nosso código, para isso, existe algo chamado **Autoload**.

### Autoload

O autoload é uma funcionalidade do PHP, que consiste em uma forma de ensinar o PHP como as classes devem ser encontradas nos nossos arquivos. O Composer nos traz o autoload já implementado, então no nosso exemplo podemos implementar nossas necessidades apenas com o **vendor/autoload.php** eliminando a necessidade do usado do require.

## Extraindo a classe

Agora, vamos passar esse lógica de obter os dados para uma nova classe, começando por mostrar como essa nova classe ficou: 

```php
<?php 

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this -> httpClient = $httpClient;
        $this -> crawler = $crawler;
    }

    public function buscar (String $url) {

        $response = $this -> httpClient->request("GET", $url);

        $html = $response->getBody();

        $this->crawler -> addHtmlContent($html);

        $elementosCursos = $this->crawler -> filter ('.card-curso__nome');
        $cursos = [];

        foreach ($elementosCursos as $elementoCurso) {
            $cursos[] = $elementoCurso -> textContent;
        }

        return $cursos;
    }
}

?>
```

Primeiro criamos um novo namespace para essa classe, e criamos a classe **Buscador**, onde criamos um método construtor que recebe os parametros **ClientInterface $httpClient** e o **Crawler $crawler**.

Depois criamos um método buscar que recebe como parâmetro a **URL** do site que desejamos, e dentro do método, nada muda muito, com excessão que transformamos a variável **$cursos** em um array, para que assim sejam guardados todos os dados do site dentro dessa array que depois é retornada.

Agora sobre como ficou nossa classe anterior: 

```php
<?php 

    require 'vendor/autoload.php';
    require './src/Buscador.php';
    
    use GuzzleHttp\Client;
    use Symfony\Component\DomCrawler\Crawler;
    use Alura\BuscadorDeCursos\Buscador;

    $client = new Client(['base_uri' => 'https://www.alura.com.br/']);
    $crawler = new Crawler();

    $url = "/cursos-online-programacao/php";

    $buscador = new Buscador($client, $crawler);
    $cursos = $buscador->buscar($url);


    foreach ($cursos as $curso) {
        echo $curso . PHP_EOL;
    }
?>
```

Aqui, apesar daquilo que vimos sobre autoload, ele não funciona com o **Buscador.php**, pois foi algo que nós criamos, não o **composer**. Depois usamos os namespaces necessários, inclusive o que criamos.

Nessa parte um novo conceito foi mostrado, a possibilidade de passar parte da URL na instanciação de **$cliente**. 

## Autoload para nossos arquivos

Apesar do nossa implementação estar pronta, há algo ainda a ser melhorado, que são os nossos requires. Imagine uma aplicação cheia de classes, onde teríamos que dar require em cada uma, não seria prático e nem eficiente. A solução para isso seria o Autoload, que é disponibilizado pelo Composer, mas como podemos fazer isso com os nossos arquivos criados? Seria legal se pudêssemos ensinar o composer a carregar as nossas classes, mas para isso seria necessário um padrão, por exemplo, para diferenciar nomes de arquivos de classes.

## PHP FIG e PSR

O PHP-FIG  é um grupo de interoperabilidade entre frameworks que propõe diversos padrões, interfaces e recomendações - estas chamadas de PSRs (PHP Standard Recommendations). E essas recomendações, bibliotecas, sejam reutilizáveis entre frameworks. Uma dessas recomendações é a **PSR-4**, referente ao **Autoloader**, ou seja, do conceito de mapearmos as nossas classes com os nomes dos arquivos para que uma função de autoload possa encontrá-las.

Podemos encontrar muitas coisas por aqui, mas o principal é que uma classe que esteja em um namespace sempre precisa ter um namespace principal, normalmente chamado de "vendor namespace".

Sendo assim, se a nossa classe é um buscador de cursos, podemos dizer que o namespace padrão é `Alura\BuscadorDeCursos`. Esse namespace padrão será mapeado para uma pasta, por exemplo a pasta "src". Com isso, informaremos que todas as classes que pertencerem ao namespace `Alura\BuscadorDeCursos` estarão dentro da pasta "src".

## Configurando a PSR-4

	Para configurarmos nossa **PSR-4**, vamos editar o nosso arquivo **composer.json**, incluindo uma sessão sobre **autoload** e dentro dela o **psr-4** , junto com o nosso **namespace** e o arquivo onde serão armazenados as classes.

```json
{
    "name": "kevenscharttz/buscador-cursos",
    "description": "Uma biblioteca para buscar os cursos da Alura",
    "type": "library",
    "authors":
        [
            {
                "name": "Keven Willians",
                "email": "kevenscha@gmail.com"
            }
        ],
    "license": "MIT",
    "require": {
        "guzzlehttp/guzzle": "^7.9",
        "symfony/dom-crawler": "^7.3",
        "symfony/css-selector": "^7.3"
    },
    "autoload": {
        "psr-4": {
            "Alura\\BuscadorDeCursos\\": "src/"
        }
    }
}
```

Assim, todas as classes que começarem com o namespace **Alura\\BuscadorDeCursos\\** serão buscadas na pasta **src/** do nosso projeto. Por exemplo, se quisermos encontrar uma classe  **Alura\BuscadorDeCursos\Service\ClasseTeste**, dessa forma esse arquivo estaria dentro de **src/Service/ClasseTeste.php**. Dessa forma, não será mais necessário usarmos o **require**, porém ainda não funcionará, mas por quê?

Isso acontece porque o **vendor/autoload.php** é um arquivo que precisa conhecer as pastas do mapeamento da nossa **PSR-4**. Porém, ele já existia antes de fazermos essas configurações no **composer.json**. Sendo assim precisaremos atualizá-lo. Mas ao invés de usarmos **composer install** ou **composer require** usaremos o **composer dumpautoload** (ou **composer dump-autoload**), que gerará um novo arquivo autoload com as configurações que nós fizemos

## Classmap e Files

Algumas vezes pode ocorrer de acabarmos trabalhando com códigos que não seguem as regras da **PSR-4**, como projetos legados ou projetos de outras pessoas que não conheciam essa recomendação. Isso significa que não podemos usar o autoload do Composer? Não, existe outra configuração que podemos informar ao Composer chama **Classmap**, um mapa de classes. O **Classmap** basicamente define que estamos mapeando uma classe para determinado caminho/diretório. Assim, sempre que tentarmos instanciar uma classe de determinado nome, iremos buscá-la no arquivo indicado, como por exemplo: 

```json
{
    "name": "kevenscharttz/buscador-cursos",
    "description": "Uma biblioteca para buscar os cursos da Alura",
    "type": "library",
    "authors":
        [
            {
                "name": "Keven Willians",
                "email": "kevenscha@gmail.com"
            }
        ],
    "license": "MIT",
    "require": {
        "guzzlehttp/guzzle": "^7.9",
        "symfony/dom-crawler": "^7.3",
        "symfony/css-selector": "^7.3"
    },
    "autoload": {
        "classmap": [
            "./temp/Teste.php"
        ],
        "psr-4": {
            "Alura\\BuscadorDeCursos\\": "src/"
        }
    }
}
```

Foi criado uma pasta e arquivo de teste, que não foram incluídos no autoload, usando o **classmap**, foi definido onde essa classe está, como se estivessemos dizendo onde que essa classe está. Depois, basta utilizar o comando que falamos anteriormente, o **composer dump-autoload**.

Mas e se tivéssemos um arquivo com muitas funções? Por exemplo uma função que fazer a leitura de algo, como o Composer vai achar essa função? Não se trata de uma classe, então não podemos usar o **classmap**. Neste caso, podemos usar o **files**, onde informo quais arquivos vão sempre ser incluídos, ele é colocado dentro do autoload, então sempre que o autoload for buscado, os arquivos de **files** vão ser inseridos. E claro, podemos usar mais de um arquivo em **files**.

## Instalando o PHPUnit

Até o momento, só temos visto dependências com as quais escrevemos código, como um cliente HTTP ou um crawler, que são dependências que vão para o nosso projeto em produção, ou seja, para o código que iremos disponibilizar. Mas e as ferramentas que são utilizadas no momento do desenvolvimento, como o PHPUnit, utilizado para testar nossa aplicação? Será que podemos utilizar o Composer para baixá-lo? 

Outra coisa, como já dito, todo esse código vai para a produção, e não queremos ferramentas de desenvolvimento indo junto, é possível fazer essa separação? A resposta é sim.

utilizando o comando :
```composer require phpunit/phpunit``` o código será instalado normalmente, o que não queremos, para garantir que ele fique apenas em um ambiente de desenvolvimento, utilizamos **--dev** depois do require, dessa forma: ```composer require --dev phpunit/phpunit```

Agora supondo que, terminei meu código e vou leva-ló para a produção, e preciso fazer a instalação das dependências, basta utilizar o comando ```composer install --no-dev```

## O que é o PHPUnit?

é uma ferramenta muto poderosa para testes - majoritariamente testes unitários, mas que disponibiliza recursos para realizar qualquer tipo de testes. E que tal fazermos um teste? E como podemos garantir que ele está instalado no projeto, já que se trata de uma ferramenta, não tem código.

Primeiro, dentro da pasta bin, que está dentro da vendor, há um executável do phpunit, onde podemos verificar sua versão, com o comando ```vendor\bin\phpunit --version```

## Escrevendo um teste

Foi nos passado na aula um código já pronto de um teste:

```php
<?php

namespace Alura\BuscadorDeCursos\Tests;

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\DomCrawler\Crawler;

class TestBuscadorDeCursos extends TestCase
{
    private $httpClientMock;
    private $url = 'url-teste';

    protected function setUp(): void
    {
        $html = <<<FIM
        <html>
            <body>
                <span class="card-curso__nome">Curso Teste 1</span>
                <span class="card-curso__nome">Curso Teste 2</span>
                <span class="card-curso__nome">Curso Teste 3</span>
            </body>
        </html>
        FIM;


        $stream = $this->createMock(StreamInterface::class);
        $stream
            ->expects($this->once())
            ->method('__toString')
            ->willReturn($html);

        $response = $this->createMock(ResponseInterface::class);
        $response
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($stream);

        $httpClient = $this
            ->createMock(ClientInterface::class);
        $httpClient
            ->expects($this->once())
            ->method('request')
            ->with('GET', $this->url)
            ->willReturn($response);

        $this->httpClientMock = $httpClient;
    }

    public function testBuscadorDeveRetornarCursos()
    {
        $crawler = new Crawler();
        $buscador = new Buscador($this->httpClientMock, $crawler);
        $cursos = $buscador->buscar($this->url);

        $this->assertCount(3, $cursos);
        $this->assertEquals('Curso Teste 1', $cursos[0]);
        $this->assertEquals('Curso Teste 2', $cursos[1]);
        $this->assertEquals('Curso Teste 3', $cursos[2]);
    }
}
```

Para executar esse teste, no terminal, usamos o seguinte comando: ```vendor/bin/phpunit tests/TestBuscadorDeCursos.php```.


## Instalando o PHPCS

Além do PHPUnit, existem inúmeras outras ferramentas muito úteis, como por exemplo o **PHP_CodeSniffer**, ou também conhecido como **PHPCS**, que serve para verificar se nosso código está dentro dos padrões. Por exemplo, existe uma uma **PSR** que dita que estruturas de controle, como loops e `if`, precisam ter as chaves sendo abertas na mesma linha em que a estrutura foi definida. Já métodos e classes têm as chaves abertas na linha de baixo.

```php
<?php 
	function teste () 
	{
		if (condição) {
		} else(condição) {
		}
	}
?>
```

Lembrando que essa ferramenta é para a verificação de como o código está estruturado, não é para identificar erros. no terminal basta utilizar o comando: ```vendor/bin/phpcs --standard=PSR12 src/```

## Phan

