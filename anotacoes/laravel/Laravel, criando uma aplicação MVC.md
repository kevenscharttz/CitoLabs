
## O que é um framework?

Um **framework** por definição, é um código que outra pessoa também criou, que outra equipe criou, e que vai chamar o meu código, o que isso quer dizer? Um **framework**, é um pedaço de código, é um código maior vamos dizer assim, escrito por outras pessoas que vai lidar com muita coisa, então por exemplo, um **framework** **PHP**, que é um **framework** web, o que ele vai fazer?

Então um **_framework_** como o Laravel, resolve problemas como, realizar _log_, tratar erros, exibir esses erros de forma mais amigável para vermos como corrigir, acesso ao banco de dados de forma facilitada, para inclusive não precisarmos escrever SQL, e diversas outras coisas, lidar com fila de trabalhos, mensageira e etc., então várias dessas tarefas do dia a dia, tarefas mais genéricas já são resolvidas pelo _framework_.

o Laravel é um _framework full stack_, o que isso quer dizer? Utilizando as ferramentas que o Laravel fornece, nós vamos escrever uma aplicação só, que possui o _back-end_, com nossas regras de negócio, e o _front-end_ com nosso HTML, visualização.

## Instalando o Laravel

A instalação que será feita, será a que utiliza o composer, com essa forma, teremos tudo na nossa maquina, executaremos o servidor na nossa maquina também. Para isso, vamos utilizar o comando: ```composer create-project laravel/laravel nome-do-projeto```

Bom, mas o que exatamente esse **create-project** faz? Ele verifica o pacote que se segue depois, no caso o **laravel/laravel** que existe no packages, só que ele é diferente, ele é um projeto que possui somente outras dependências e uma estrutura inicial, como se fosse a base para criarmos um novo projeto e é exatamente isso que queremos, a base do **framework Laravel**.

## Dando uma pequena olhada na estrutura

Dentro da estrutura gerada temos uma série de arquivos e pastas, as principais em questão nesse momento são: a pasta **vendor**, onde temos os pacotes que vamos instalar ou que já foram instalados previamente pelo Laravel, **storage** que apesar de que não será usado nesse treinamento, se trata do local onde armazenaríamos imagens que talvez queiramos manipular, coisas que nossos usuários fizeram **uploads**, enfim, também temos as configurações de rotas dentro da pasta **routes**, temos a pasta **resources** onde estão os recursos relacionado ao front-end, a pasta **public**, que será acessivel pelo servidor web, enfim, muitas coisas, mas algo que não podemos deixar de citar é a pasta **config**, onde podemos configurar diversas coisas.

Enfim, muita coisa citada, mas onde exatamente nós vamos trabalhar a principio? Bom, será dentro da pasta **app**.

## Definindo a primeira rota

Agora, vamos executar esse projeto que foi gerado pelo Laravel, para isso, ao invés daquele comando antigo usando **PHP -S**... Vamos utilizar algo um pouco diferente. Vamos utilizar o comando **php artisan**, que é um comando fornecido pelo Laravel, esse comando nos fornece uma gama de funcionalidades muito interessantes, algumas que serão exploradas no treinamento, mas a principio a que vamos utilizar é o que nos possibilita subir um servidor.

Para subir o servidor vamos utilizar: ```php artisan serve```. Com isso, podemos subir um servidor com com hospedagem e porta já especificados, mas claro, caso seja da vontade do usuário especificar isso por si, podemos utilizar esse mesmo comando com alguns parâmetros a mais: ```php artisan --host=0.0.0.0 --port=8080```

Indo de fato para o assunto principal, como nós podemos encontrar o código que é mostrado nesse projeto, abrindo as rotas, vamos encontrar os caminhos dentro do arquivo **web.php**, e seu funcionamento é bastante simples. Utilizando a classe **Route::** seguido do verbo http que eu espero receber a requisição, no nosso caso, como estou acessando direto do navegador, é **GET**, se eu quisesse receber os dados de um formulário, seria **POST**, e em caso de uma **API**, eu posso usar todos os verbos http.

## Auxilio em caso de erros

Imagine que em algum momento do código, acabe por cometer um erro de sintaxe por exemplo, ao tentar acessar o nosso programa vamos ser levados para uma página de erro completamente configurada para ajudar, e muito, nas hora de fazer um debug.

Todos os _frameworks_ fornecem uma página dessa, só que o Laravel dá uma atenção especial para essa página, ele possui um próprio _framework_ de gerenciamento de erros para gerar isso, então ele mostrará exatamente onde está o nosso erro, mas não apenas isso, ele também mostra todas as funções que foram chamadas até o erro acontecer, mostra também a mensagem erro, basicamente ele vai ser nosso amigo para garantir que tudo esteja de acordo.

## Roteando para o Controller

Vamos começar a criar o nossos sistema de controle de séries, para começar, vamos criar uma página que liste as séries que eu tenho cadastrado. Primeiro de mais nada, vamos criar uma rota que se chamará **/series**, e nessa rota quero que seja exibido essa listagem de séries, só que não é interessante ficar escrevendo código dentro de uma função anônima, dentro do próprio arquivo de rotas, e por isso vamos criar um **controller**.

Vamos ir para dentro da pasta de **Controllers** que fica dentro de **Http**, lá vamos criar uma nova classe chamada **SeriesController**, com essa classe criada, vamos precisar incluir o **namespace**, que nesse caso corresponde a estrutura de pastas **App/Http/Controllers**: 

```php
<?php 
namespace app\Http\Controllers;

class SeriesController
{
    
}

?>
```

Agora com a classe criada, vamos criar um método, por exemplo, **listarSeries()**, ou algo nesse sentido. Esse método é o que será executado quando chegarmos na rota **/series**, mas antes precisamos pensar no que vamos mostrar aqui.

Pensando em algo didático simples, vamos criar uma array simples com algumas séries, e exibi-lá na tela utilizando **HTML** e um ciclo de repetição **foreach**:

```php
<?php

namespace app\Http\Controllers;

class SeriesController
{

    public function listarSeries(): void
    {

        $series = [
            'Doctor House',
            'Breaking Bad',
            'Flash',
            'The boys'
        ];

        $html = '<ul>';

        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        echo $html .= '</lu>';
    }
}
```

Agora, o que devo fazer para que quando eu acessar essa **URL**, o controller seja executado? Basicamente o que devo fazer é ir até o **web.php** onde estão as rotas, utilizar uma função dessa classe,  numa nova rota, então vou passar um array, onde o primeiro item desse array é a classe, o nome dela, seguido de dois ponto e uma especificação de que aquela é a classe, e o segundo item desse array é o nome do método que eu vou utilizar, apenas o nome, envolto de aspas.

E nome da classe pode ser completo direto com todo caminho do namespace, ou importando o namespace e usando só o nome direto:

```php
<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', [SeriesController::class, 'listarSeries']);
```

Por fim, preciso ressaltar que essa é a maneira manual de se criar o controller, mas é possível fazer isso de outra forma.

## Convenções de nome

Bom, como citado anteriormente, é possivel se criar uma classe de uma maneira um pouco mais rápida, mas também vamos ver sobre os nomes que vamos utilizar nos métodos dos nossos **controllers**.

Excluindo o arquivo que criei, e indo até o terminal, podemos rodar o ```php artisan```, que vai mostrar uma lista de todos os comando disponíveis, nessa lista, existe um em especifico que é o que nos interessa nesse momento, o **make:controller**, que cria uma nova classe de controller. O comando completo fica da seguinte forma: ```php artisan make:controler nome-da-classe```, e quanto ao nome da classe, no nosso caso será **SeriesController**. Dessa forma o seguinte arquivo será criado: 

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{

}
```

Repare em algumas coisas diferentes de quando criamos a classe manualmente, primeiro que o namespace já feio automaticamente, segundo que a classe está estendendo uma classe chamada **controller**, classe essa que já veio no nosso projeto, e segundo que estamos usando, mesmo que não de fato utilizando, uma classe de **Request**.

Falando sobre a classe que estamos estendendo, essa extensão nos dá uma gama de funcionalidades, basicamente estamos fazendo com que o nosso **controller** seja um **controller** do próprio Laravel em si, o que acaba trazendo essas funcionalidades que vão ser interessantes no futuro, porém, com o código que temos no momento, isso não será necessário, mas vamos deixa-ló ali já que não afeta em nada o código:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function listarSeries(): void
    {

        $series = [
            'Doctor House',
            'Breaking Bad',
            'Flash',
            'The boys',
        ];

        $html = '<ul>';

        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        echo $html .= '</lu>';
    }
}

```

Um detalhes agora que precisamos ter em mente é o fato de que existe uma regra de nomenclatura para nossos métodos, não necessariamente faz mal nomearmos nosso método da maneira que queremos, mas existe um padrão para quando vamos criar nomes de métodos dos nossos **controllers**.

Na documentação podemos achar algo como **Resource Controllers**, onde temos:

| Verbo     | URI                  | Ação      | Nome da rota      |
| --------- | -------------------- | --------- | ----------------- |
| GET       | /photos              | índice    | fotos.índice      |
| GET       | /photos/create       | criar     | fotos.criar       |
| POST      | /photos              | loja      | fotos.loja        |
| GET       | /photos/{photo}      | mostrar   | fotos.mostrar     |
| GET       | /photos/{photo}/edit | editar    | fotos.editar      |
| PUT/PATCH | /photos/{photo}      | atualizar | fotos.atualização |
| DELETE    | /photos/{photo}      | destruir  | fotos.destruir    |

No nosso caso por exemplo, estamos lidando com uma URL utilizando o **GET**, então o nome do nosso método que exibe essas séries será **index()**.

## Lidando com Request e Response

Quando estamos trabalhando com um **controller**, esperamos uma requisição para devolvermos uma resposta, e com o Laravel podemos fazer exatamente isso. É por esse motivo que quando criamos o **controller** via terminal, essa classe já é importada, porque podemos receber por parâmetro, esse **request**, essa requisição **Request $request**. Dessa forma podemos obter várias informações da requisição, por exemplo, podemos pegar a **URL**, conseguimos pegar detalhes da **query string**, um input que viria de um formulário e etc. Repetindo mais brevemente, o objeto $request oferece métodos como get(), URL() e method() para extrair dados da requisição.

Também podemos retornar uma resposta, e um detalhe interessante é que aqui não estamos retornando nada, estamos exibindo, inclusive se eu tivesse algum erro em algum local, que não seja um erro de sintaxe, acabaríamos vendo o erro, só que a nossa resposta seria exibida por baixo do erro. Então algo que vamos mudar é, não dar mais echos direamente de um **controller**, não vamos fazer isso mais, vamos retornar o html. Resumindo, o Laravel converte automaticamente _strings_ em conteúdo de resposta HTML e _arrays_ e objetos em JSON.

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request): string
    {

        $series = [
            'Doctor House',
            'Breaking Bad',
            'Flash',
            'The boys',
        ];

        $html = '<ul>';

        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        return $html .= '</lu>';
    }
}

```


Vale falar que podemos retornar uma resposta, e o Laravel nos ajuda bastante com esse detalhe de retornar uma resposta, por exemplo, caso eu retorne uma string, o Laravel pega essa string e adiciona no conteúdo da resposta, define um status, manda os cabeçalhos que tem que mandar, etc... Também é possível manipular esses dados, mas não vai ser o nosso caso no momento, vamos deixar da forma que está. Outra coisa interessante é que caso seja retornado um array por exemplo, é automaticamente por baixo dos panos passado para **JSON** pelo Laravel. 

Vamos agora trabalhar com o **request**, vamos supor que queremos acessar um **id** que está na **URL**, eu posso fazer isso através do **return $request->get( )**, onde passamos a chave dentro como parâmetro, no nosso caso a chave **'id'**. Se quisermos pegar a **URL** por exemplo, basta retornarmos o seguinte método, **return $request->url( )**, se quisermos obter o método usado para obtermos os dados, bata usarmos o **return $request->method( )**. Claro, essa são apenas alguns dos métodos, existem outros que serão vistos em outro momento.

Voltando um pouco para a parte de **response**, além de ter uma resposta tendo um conteúdo, podemos ter uma resposta de redirecionamento, e podemos fazer isso de algumas formas, a mais "complicada" sendo usando o método **response (' ', 302, 'Location' => 'https://google.com)**, isso fará com que ao acessar a página, sejamos redirecionados para o google, mas, uma maneira mais fácil de fazer isso é usando o método **redirect ( )**, e o que ela faz? Exatamente aquilo que fizemos anteriormente com parâmetros e cabeçalho, mas apenas informando o local de redirecionamento.

Com isso, está entendivel o roteamento para um **controller**, e como ele funciona recebendo uma requisição de forma que ele possa tratar esse requisição, e devolver uma resposta em formatos variados. Porém, um detalhe que ainda não está bom, é que está sendo criado um HTML dentro do **controller**, e isso é inadmissível, um código **Laravel** não pode ser feito dessa forma.

Um detalhe que talvez eu tenha esquecido de citar acima sobre a função **response**, ela retorna um objeto do tipo `Response` com o corpo, status e cabeçalhos.

## Extra sobre o objeto request

O objeto de `Request` do Laravel nos fornece várias formas de atingir o mesmo objetivo.

Por exemplo, para buscar um dado da query string, eu utilizei o método `get`. Porém nós também podemos utilizar o método `query` que vai gerar exatamente o mesmo resultado.

A diferença entre o método `get` e o método `query` é que o método `get` busca o dado de qualquer lugar do nosso request, seja da query string ou mesmo de um campo enviado por post. Por isso o ideal é utilizar o método `query` para que nosso código fique mais explícito, deixando claro de onde vamos buscar o dado.

## Views

Bom, como dito anteriormente, nosso **controller** não está criado da melhor forma, o HTML estar sendo criado dentro dele é um problema, então o que vamos fazer basicamente é criar um arquivo que contenha o nosso HTML, e do nosso controller, incluir esse arquivo.

Basicamente uma view no Laravel é essencialmente um template. É um arquivo que contém a estrutura HTML da página, juntamente com espaços para dados dinâmicos. Esses espaços reservados são preenchidos com os dados que o **controller** envia para a **view** antes de ela ser renderizada e enviada como resposta ao navegador.

Agora sabendo disso, vamos para a pasta **views** que está dentro de **resources**, vamos criar nossa **view** para exibir as séries: 

```php
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de séries</title>
</head>
<body>
    <h1>Séries favoritas:</h1>
    <ul>
        <?php foreach ($series as $serie): ?>
            <li><?= $serie?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
```

Como pode ser visto, como dito, é possível utilizar dados dinâmicos. Porém apenas isso não é o suficiente, precisamos também fazer com que nosso **controller** chame essa **view**. Isso é possível retornando a função **view( )** passando como parâmetro o nome da **view**, e depois um array associativo contendo o nome dá variável que estamos usando na **view**, e depois o nome dá variável que queremos que tenham os dados passados no **controller**:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = [
            'Doctor House',
            'Breaking Bad',
            'Flash',
            'The boys',
        ];

        return view(
            'listar-series',
            ['series' => $series]
        );
    }
}
```

Porém existe uma outra função que pode ser usada em alguns casos, que é o nosso inclusive, quando tanto as variáveis do **controller** quanto da **view** tem o mesmo nome, podemos utilizar no lugar desse array associativo a função **compact( )**, que fará exatamente a mesma coisa que o array, só que como o próprio nome já diz, é bem mais compacta, bastando passar o nome da variável: 

``` php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = [
            'Doctor House',
            'Breaking Bad',
            'Flash',
            'The boys',
        ];

        return view(
            'listar-series',
            compact('series')
        );
    }
}
```

## Conhecendo o Blade

Quando nós iniciamos o nosso projeto **Laravel**, dentro da pasta de **views**, um arquivo muito interessante veio criado, incluindo um formato de arquivo chamado **blade**, e o que é isso exatamente? Pra que serve? Bom, primeiramente ao mudarmos o formato da nossa **view** criada para **listar-series.blade.php**, percebesse que ao rodar esse programa nada parace mudar, então o que exatamente está ocorrendo?

Bom, primeiramente devemos entender que o blade é uma _template engine_, ou seja, é um motor que nos ajuda a criar templates, views, uma infinidade de coisas, como um componente, ele trás muitas facilidades na hora de escrever o nosso código. Vamos começar a falar de algumas vantagens, dando uma olhada na documentação e depois no nosso código, percebesse que podemos fazer algumas modificações até que muito positivas, deixando-o mais "fácil" de entendes, por exemplo tirando essa introdução dos scripts PHP, o famoso **<?php ?>** , trocando-o por um simples **@**, ou ao invés do uso de um **echo**, apenas abrimos chaves duas vezes **{{ }}**:

```php
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de séries</title>
</head>
<body>
    <h1>Séries favoritas:</h1>
    <ul>
        @foreach ($series as $serie)
            <li> {{ $serie }} </li>
        @endforeach
    </ul>
</body>
</html>
```

Então repare a facilidade que isso trás ao nosso código, até mesmo o uso do **;** não é necessário mais, o que devemos concordar que reduz e muito nosso código e sua "complexidade" a primeira vista.

Saindo agora um pouco do assunto, voltando para nossa conversa sobre **views**, existe uma outra sintaxe para que seja possivel enviar dados para a view, com o uso do **with**, onde só escrevemos a o que nossa variável é equivalente:

```php
return view('listar-series')
->with('series', $series);
```

## Criando um layout

Antes de mais nada, vale mencionar um detalhe muito importante, assim como há um padrão para nomearmos nossas **actions** dos nossos **controllers**, também há um padrão na hora de nomearmos nossas **views**, e esse padrão é que sigamos o mesmo nome da nossa **action** para o nome da view. Porém veja, chamar a view, por exemplo, apenas de **index**  não é interessante, imagine vários arquivos com index um, dois, três... Concordamos que não é eficiente, para resolver isso vamos criar uma pasta chamada **series**, e aqui dentro vamos passar o nosso antigo **listar-series** para **index**. Com isso feito, há ainda um ultimo detalhe de devemos alterar para que tudo continue funcionando perfeitamente, que no casso é corrigir o caminho no nosso **controller**, normalmente utilizariamos uma barra para indicar que estamos querendo acessar um arquivo dentro de uma pasta, mas aqui, utilizamos apenas um ponto:

```php
return view('series.index') 
	->with('series', $series);
```

Com esse detalhe passado, vamos pensar em como podemos reutilizar partes da nossa view, como um componente, e isso é possível com o **blade**, para começar vamos criar uma pasta chamada **components** e dentro vamos criar o arquivo **layout.blade.php**. Dentro desse novo arquivo, passamos o layout que pode se manter igual em diferentes arquivos para essa componentização, onde na areá onde teoricamente vai o conteúdo que é diferente, incluimos uma variável **{{ $slot }}**, além disso, podemos passar mais informações, como um parâmetro, por exemplo o **{{ $title }}**: 

```php
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    {{ $slot }}
</body>

</html>

```

Componente criado, perfeito, mas como eu posso fazer uso dele? Se ele foi criado corretamente, ou seja, dentro da pasta "components", com esse nome. Bom, agora podemos excluir toda a parte que já está presente dentro do nosso componente, e depois, envolver o conteúdo que não está presente pela tag personalizada ```<x-layout>```, onde o **X** indica que estamos trabalhando com um componente blade, seguido do nome do nosso componente. Apenas isso já funcionaria, mas, estamos passando também um atributo chamado **title**, que podemos definir nessa tag como um parâmetro ```<x-layout title="Séries">```:

```php
<x-layout title="Séries">
    <ul>
        @foreach ($series as $serie)
            <li>{{ $serie }}</li>
        @endforeach
    </ul>
</x-layout>

```

Por fim, vale dizer que também podemos criar esses componentes pelo terminal, rodando um comando ```php artisan make:component *nome do componente*```. A diferença de se fazer isso é que além de criar uma _view_, isso também vai criar uma classe de componentes, adicionada em **View**, dentro da pasta de **app**. Mas caso seja da preferência não criar essa classe, podemos usar o comando ```php artisan make:component layout –view```.

## Mais funcionalidades

Bom, ao utilizarmos algumas vezes o **ctrl + U** dentro do nosso código, as vezes acabamos por notar que alguns elementos HTML estão diferentes, o que o _blade_ faz por padrão, é que sempre que exibirmos qualquer conteúdo utilizando essa sintaxe, ou o antigo _echo_, como faríamos com PHP puro através do _echo_, o que o _blade_ faz é, transformar qualquer caractere que possa ter algum significado ambíguo dentro do HTML ou até de JavaScript, ele transforma esses caracteres em uma entidade HTML para garantir que não tenhamos nenhum problema.

Outra coisa é, caso eu queira utilizar por exemplo ```{{ nome }}```, para que isso consiga ser exibido sem erros, precisamos incluir no inicio disso um **@**. O _**blade**_, vai entender que é para ignorar isso aqui e enviar do jeito que está, então quando eu atualizo ele agora não vai fazer o _parsed_ e vai enviar exatamente como isso está.

Com isso entendido, vamos começar a criar uma nova view para a inserção de novas séries, bom, de começo podemos iniciar criando a nossa view de fato, chamando seus componentes e criando um formulário, apenas o básico: 

```php
<x-layout title="Nova Série">
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
    </form>
</x-layout>
```

Agora é preciso criar o nosso **controller**, onde escrevemos uma função **create**, onde retornamos nossa view:

```php
public function create()
    {
        return view('series.create');
    }
```

Finalizando, basta criarmos uma rota para essa nova tela:

```php
Route::get('/series/criar', [SeriesController::class, 'create']);
```

## Entendendo o conceito

Agora vamos falar um pouco mais do Laravel no sentido de front-end, já vimos o **Blade**, que é uma ótima ferramenta para isso, mas podemos ir além. Existe uma ferramenta muito conhecida e utilizada no front-end, que é o webpack.

O que o webpack faz? Simplificando bastante, Ele tem um arquivo de configuração, onde dizemos para ele o que queremos que esse **webpack** faça com nossos arquivos front-end, qualquer coisas relacionada a **front-end** pode ser feita por ele, como mover arquivos de um local para outro, transformar um SCCS em CSS, aplicar plugins, muitas coisas.

Alguns frameworks já trazem isso bem abstraído, diminuindo a complexidade, trazendo-os configurados, mas quando trabalhamos com dependências sendo gerenciadas por nós mesmos, acabamos precisando lidar com o **webpack**, e para facilitar esse trabalho temos o **Laravel Mix**.

## Laravel Mix

O Laravel Mix é um pacote JavaScript, que nos fornece componentes para facilitar a escrita de um arquivo de configuração do webpack, por exemplo, caso eu queira aplicar e utilizar um plugin chamado **post.css**, ao invés que configurar inúmeras linhas, tudo que tenho que fazer é utilizar uma linha onde eu aponto para onde está o conteúdo que eu quero fazer o procedimento, e para o local onde esse conteúdo vai.

Para instalar o Laravel Mix é necessário instalar o **NODE**, e depois disso utilizar o comando ```npm install```.

## Instalando o Bootstrap

Bom, existem algumas formas para instalar o bootstrap, mas a que será usada é através do NPM, utilizando o comando ```npm install bootstrap```, com isso feito podemos vamos precisar importar o Bootstrap para o arquivo app.scss (arquivo esse anteriormente chamado de app.css), dentro da pasta css que se encontra em resources: 

```scss
@import 'tailwindcss';
@import "~bootstrap/scss/bootstrap";

@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
@source '../../storage/framework/views/*.php';
@source '../**/*.blade.php';
@source '../**/*.js';

@theme {
    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
        'Segoe UI Symbol', 'Noto Color Emoji';
}

```

Só o que eu preciso fazer agora? Eu preciso fazer toda configuração para que? Para fazer com que esse meu arquivo SCSS, meu arquivo SCSS, seja compilado para CSS e venha aqui para minha pasta _public_.

Mas ao invés de fazer toda uma configuração maluca, precisarei apenas alterar levemente meu webpack criado anteriormente: 
```js
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/css/app.scss', 'public/css');
```

Agora quando eu executar o ```npm run mix```,  o que ele vai fazer é executar o Laravel Mix, e da primeira vez que você rodar esse comando, ele vai baixar o _plugin_ de SASS. Com isso feito, ele gerará na pasta public um fichário CSS, com toda configuração do bootstrap dentro.

Agora no final, pasta importar esse bootstrap para nosso componente, mas para isso, podemos utilizar uma função **asset** para essa importação,  é uma boa prática utilizarmos essa função _asset_, sempre que vamos buscar um recurso que está dentro da “public”, porque de novo, no futuro, em alguma configuração sua, você pode querer ter os seus _assets_, seus arquivos estáticos, em outro lugar, em algum CDN da vida, um S3 da Amazon e etc.

## Configurações

Agora, para esse próximo passo vamos começar a configurar o nosso Laravel para utilização de banco de dados, já que nossa ideia é ser possível adicionar séries no nosso sistema. Dentro da pasta **config**, temos vários arquivos de configuração, por exemplo o **app.php**, que se trata das configurações da nossa aplicação, mas esse não é o foco, o que procuramos são as configurações responsáveis pelas conexão com o banco de dados, no caso a **database.php**.

A minha escolha é utilizar o PostgreSQL para esse projeto, e saber disso é importante pois nesse arquivo de configurações podemos alterar as variáveis que usaremos para deixar de acordo com a nossa conexão de preferência, porém, existem alguns dados que são sensíveis como senhas e etc, que não fariam bem serem expostas no código, para resolver isso vamos até o arquivo **.env**, onde podemos editar os dados referentes ao banco, e por que isso? Porque no nosso arquivo de configuração, ele prioriza os dados que estão presentes no **.env**, e caso esse não exista, ele utiliza o valor default:

```php
DB_CONNECTION=pgsql

DB_HOST=127.0.0.1

DB_PORT=5436

DB_DATABASE=controleSeries

DB_USERNAME=postgres

DB_PASSWORD=########
```

## Migrations

Bom, dentro da pasta **database**, temos algumas outras pastas como: **factories**, **migrations** e **seeders**, apesar de que eu vá utilizar apenas a **migrations**, vale apena citar brevemente sobre as outras.

Basicamente, os **seeders** são criadores de dados que podemos utilizar para já inserir no banco de dados quando uma aplicação, podemos usar como exemplo um novo funcionário que entrou em determinada empresa,e já queremos que ele tenha uma base de dados inserida em sua maquina, ou talvez um usuário padrão com determinadas permissões para ele, enfim...

Já as **factories**, são forma de se criar dados falsos, por exemplo, queremos criar vários usuários para realizar testes, eu posso utilizar uma **factory** para criar inúmeros nomes de mentira, idades falsas, enfim.

E a **migration**, que é o que vamos utilizar, é basicamente um versionamento do banco de dados, muito similar ao **GIT** por exemplo, onde basicamente podemos fazer ou desfazer uma migration, no caso, ir ou voltar de um ponto a pouco na "linha do tempo" do nosso banco de dados.

Para criarmos a nossa própria **migration** é muito simples, podemos ir até o nosso terminal e incluir o seguinte comando: ```php artisan make:migration [nome-da-migration]```,  e o que isso faz? Ele gera uma nova classe para nós, essa classe estende, ou seja, é uma **migration**. A nossa tabela não terá informações tão complexas, apenas id, nome e o timestamps. E o que é esse _timestamps_ aqui? Basicamente isso cria os campos de inserido e atualizado em determinado momento, o que isso quer dizer? Quando eu vou criar uma nova série no meu banco de dados, esse campo de criado em determinado momento vai ser preenchido com momento atual e quando eu atualizar uma série, um campo de atualização vai ser modificado também: 

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('series');
    }
};
```

Agora, para que de fato essas tabelas sejam criadas, é preciso rodar um outro comando, sendo ele: ```PHP artisan migrate```, dessa forma, nossas tabelas são criadas caso o banco esteja conectado corretamente. Um detalhe importante é que além das tabelas que nós criamos, o Laravel cria automaticamente algumas, por exemplo a tabela **migrations**, onde o Laravel armazena quais delas foram executadas, para que dessa forma ao rodar o comando novamente, ele não fique tentando criar tabelas que já existem.

## DB Facade

Bom, agora chegou a hora de fazer com que o formulário realmente salve no banco de dados uma nova série, então para começarmos isso vamos modificar o formulário, incluindo seu caminho de envio, e depois, salvar uma nova rota para isso:

```php
<form action="/series/salvar" method="POST">
```

```php
Route::post('/series/salvar', [SeriesController::class, 'store']);
```

Certo, nossa rota está pronta, agora vamos criar o nosso método para que esse "salvamento" ocorra, e o nome dele será **store**, respeitando as regras de nomenclatura do Laravel. Para realmente eu obter o nome da série, será utilizado um método chamado **input**, da variável **request**, onde passamos por parâmetro a name do input:

```php
public function store(Request $request)
{
	$nomeSerie = $request->input('nome');
}
```

Agora de fato para adicionar essa série no banco de dados, existem algumas formas de fazer, e primeiro vamos utilizar a menos interessante. Existe uma classse onde basicamente só existem métodos estáticos, seu nome é **facade**, porém não é necessariamente uma implementação **design pattern** forçado, mas é como chamam.

Essa facade se chama ```DB::```, um dos vários métodos estáticos disponiveis que podemos usar é o **insert(' ')**, onde podemos passar nossa **querySQL**, podemos incluir uma condicional if para sabermos se o que está sendo feito nisso está ocorrendo adequadamente, ou está ocorrendo erro. Além disso, tem um pequeno detalhe extra que é necessário para que isso tudo funcione, existe um ataque, uma falha de segurança que podemos ter em formulários que o Laravel nos obriga a tratar, é um de _cross site request forgery_, é basicamente a possibilidade de outras pessoas forjarem uma requisição de outro _site_ para o meu, ou alguma coisa assim. mas basicamente o que precisamos fazer para corrigir é, recebemos uma informação do servidor, sempre que essa página de formulário for carregada, essa página aqui.

Então precisamos enviar de volta essa informação para que lá no nosso _back-end_, saibamos que esta informação realmente foi enviada por esse formulário e não de algum outro lugar, então embora a solução pareça complexa, para corrigirmos basta no nosso formulário adicionar `@csrf`, essa diretiva do _blade_, ele já cuida de todos os detalhes para nós.

```php
 public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');

        if (DB::insert('INSERT INTO series (name) VALUES (?)', [$nomeSerie])){
            return "OK";
        } else {
            return "ERROR";
        }
        
    }
```

Porém ainda existe um problema, os timestamps não estão funcionado, então indo vazios para o banco, mas isso podemos arrumar depois. Voltando agora para a tela inicial de séries, podemos notar que ela ainda não está conectada com o banco, como podemos resolver isso? Bom, podemos fazer a mesma coisa que fizemos antes para inserir as séries, mas agora usando a função **select** e alterando obviamente o **querySQL**. Mas claro, isso não vai trazer um array de nomes certinho, ou vai? Podemos testar isso usando uma função **dd()**, que significar _dump and die_, ele vai executar o famoso var_dump para a gente, e depois encerrar tudo que se segue, sendo muito útil para debug:

```php
public function index(Request $request)
    {

        $series = DB::select('SELECT name FROM series');
        return view('series.index')
            ->with('series', $series);
    }
```

Mas apenas isso não será o suficiente, pois, estamos obtendo um objeto, ou seja, precisaremos especificar qual parâmetro desse objeto queremos que seja impresso no nosso index: 

```php
@foreach ($series as $serie)
    <li class="list-group-item">{{ $serie->name }}</li>
@endforeach
```

Mas, outro problema vem agora, ao terminarmos de adicionar uma série, somos redirecionados apenas para a tela onde aparece nosso **ok** e nosso **error**, ou seja, precisamos fazer um redirecionamento.

## Eloquent ORM

Vamos começar isso arrumando os problemas apontados acima, primeiro de tudo farei com que o usuário seja redirecionado para a pagina inicial de séries, dando retorno da função **redirect ('/series')**, apesar de existir formas melhores de se fazer isso, a abordagem utilizada será essa.

Quanto aos **created_at** e **update_at**, que não estão sendo preenchidos, isso acontece porque a forma com que eu estou preenchendo os dados de nome das séries, usando o **DB**, faz com que eu tenha que colocar no comando **SQL**, também esses atributos, apesar do Laravel preencher automaticamente isso, mas não com esse método.

O que esse DB faz? Ele nos fornece acesso ao banco de dados diretamente, então temos funções como _insert_, _select_, _delete_, _update_, só que precisamos escrever SQL, e eu comentei que o Laravel forneceria ferramentas que inclusive nos ajudariam a não precisar escrever SQL. A ferramenta que irei usar, fornecida pelo Laravel é um **ORM** ou **Object Relational Mapping**, um mapeamento do mundo orientado a objetos, para o mundo relacional, só que o **Eloquent** segue um padrão bem diferente, onde a mesma classe vai fazer tudo, ela representará uma série, ela vai inserir um nova série, buscará uma série, o que é uma baita simplicidade.

Como podemos criar isso? Podemos fazer isso apenas indo até a pasta model e criando a mão, ou indo até o terminal e escrever: ```php artisan make:model Serie```, criando assim a nossa classe:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    
}
```

Essa _model_ meio que é mapeada para uma tabela do banco, então se eu tenho uma classe chamada série, o _eloquent_ ORM vai buscar uma tabela no banco de dados chamada “series”, que é exatamente o nome da tabela que temos lá, mas se o nome da tabela fosse “seriados” por exemplo, eu poderia ter aqui o atributo _table_ definido como seriados, então eu consigo configurar isso, mas o padrão já vai servir.

E como essa classe está estendendo _model_, temos vários métodos que podemos utilizar, no nosso controller, primeiro, podemos buscar os dados usando essa nova model, porém ao fazer isso, o que nos é retornado é uma **Collection**, com os itens dessa coleção, e cada item é uma coleção, porém o código vai continuar funcionado porque o atributo nome existe em cada um desses itens:

```php
$serie = Serie::all();
```

Quando ao nosso **store**, podemos deixar nosso request como está, mas depois criarmos um novo objeto de **Serie**, e definir que o nome do novo objeto de **Serie** será o resultado trazido do request. No final basta usarmos o método **save( );** desse objeto, para que dessa forma seja feito a inserção no banco de dados: 

```php
    $nomeSerie = $request->input('nome');
    $serie = new Serie();
    $serie->name = $nomeSerie;
    $serie->save();
```

Com essa mudança, os timestamps serão colocados no banco corretamente. Então repara que já conseguimos fazer bastante coisa, já temos o nosso sistema completamente funcional, eu só quero chamar atenção para um detalhe aqui, do _eloquent_ ORM, temos uma classe que representa uma série, que sabe se salvar no banco de dados e que também permite que executemos consultas, por exemplo, imagina que eu queira trazer essas séries aqui ordenadas pelo nome, eu consigo fazer uma _query_ um pouco mais complexa do que simplesmente buscar todos. 

Com o método **query** o que fazemos? Podemos criar um **query builder**, ou criador de querys, e nisso eu posso fazer várias coisas, como por exemplo ordenar os nomes de ordem crescente ou decrescente. Isso gera como retorno uma **query**, que para ser executada de fato, precisamos usar o método **get(  ):**

```php
        $series = Serie::query()
            ->orderBy('name')
            ->get();
```
