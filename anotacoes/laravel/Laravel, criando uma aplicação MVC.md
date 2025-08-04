
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

