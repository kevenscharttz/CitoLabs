
## Introdução às rotas
Nesta aula, abordamos os conceitos fundamentais para construir uma aplicação usando o Laravel, com foco nas rotas. Comecei vendo o que são rotas e como elas definem as ações a serem executadas com base na URL acessada, seja por links ou formulários. A primeira página em um projeto Laravel é a página de boas-vindas, acessada através de uma rota já definida.

Explorei a estrutura de pastas do projeto, destacando a pasta '**Routes**', onde os arquivos para definir as rotas estão localizados. O arquivo '**web.php**' é voltado para aplicações web e utiliza a classe '**Route**' do Laravel. Cada rota é definida com um método **HTTP** (GET, POST etc.) e dois parâmetros: a rota em si e a ação a ser executada, que pode ser uma função anônima.

Ao acessar a rota raiz da aplicação, uma função que retorna a view 'welcome' é executada. Também testei como alterar a rota para exibir uma mensagem simples como 'Hello World' e a adição de novas rotas, como uma rota '**about**', que retorna a mensagem '**About Us**' ao ser acessada.

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre', function () {
   echo 'É sobre isso e tá tudo bem';
});
```

## Criar um Controller e Uma Route para o Controller

Nesta aula foi visto sobre a criação de um controlador no Laravel, a aula foi bem prática então começamos criando um controlador via artisan no terminal, usando o comando: ```php artisan make:controller MainController```, que gera um novo controlador localizado na pasta app/http/controllers. Esse controlador feito pelo artisan vem com algumas coisas, primeiro que ele herda funcionalidades de um controlador pai, permitindo a reutilização de métodos existentes, e já vem por padrão com o uso de um namespace **Request**, que será melhor discutido em outro momento, mas resumidamente, é uma classe que armazena informações sobre pedidos feitos à aplicação.

Neste controller, criamos um método index que retorna uma mensagem simples, um básico 'Hello World' quando chamado: 

```php
class MainController extends Controller
{
	function index()
	{
		echo "hello world!";
	}
}
```

Para tornar esse método acessível, é necessário definirmos uma rota correspondente, especificando que a rota '/index', deve acessar a classe **MainController**, e chamar o método **index**:

```php
Route::get('/index',[MainController::class, 'index']);
```

## Apresentar Uma View a Partir de um Controller

Nesta aula, abordei o conceito de **views** no Laravel e como criar uma view utilizando o Blade. A view é muito importante para a apresentação dos dados. Primeiramente, utilizando novamente o **Artisan**, foi criado uma view usando o comando ```php artisan make:view main``` e o Laravel cria um arquivo **.blade.php**. Nesta view eu fiz um código HTML simples, apenas com um título e parágrafo e em seguida fui até o nosso **controller**. 

No método **index**, alterei o código e utilizei um método **view( )**, que serve para renderizar as views da aplicação, e tudo que preciso fazer é passar o nome dessa view como parâmetro:

```php
class MainController extends Controller
{
	function index()
	{
		return view('main');
	}
}
```

E sobre esse tal Blade, o que ele é? O Blade é um motor de templates poderoso que vem integrado ao Laravel. Ele permite que você crie views de forma mais eficiente e legível, e é diferente de outros motores de templates porque não restringe o uso de PHP puro nas suas views.

## Receber Parâmetros nas Rotas

Nesta aula vi sobre receber parâmetros nas rotas do Laravel, permitindo que valores dinâmicos sejam passados para as views. É importante capturar valores, como números, que podem ser incluídos nas rotas. Podemos definir um parâmetro utilizando chaves nas rotas, transformando-o em uma variável acessível no método correspondente:

```php
Route::get('/main/{value}',[MainController::class, 'index']);
```

Para passarmos esse valor para uma view, primeiro vamos precisar alterar um pouco o nosso controlador. Existem duas formas de se passar os dados para a view, o que achei mais interessante foi o que usamos no método **view** como argumento, um array associativo, permitindo que variáveis sejam utilizadas na view: 
```php
return view('main', ['value' => $value]);
```

Existe outra forma, utilizando o método **with()**, onde passamos os dados de da mesma maneira, apenas trocando o **=>** por uma vírgula.

## Views e Blade

Nesta aula foi abordado brevemente sobre o motor de templates do Laravel, o Blade, que facilita a criação de views de forma mais eficiente. O Blade permite o uso de comandos específicos que simplificam a apresentação de dados, analisando o código nas views e traduzindo comandos para operações rápidas.

Uma mudança na view que foi feita, removendo a inserção de dados comumente feita com uma short-hand do PHP, se mostrou mais interessante: 

```php
    <h3>The value parameter is:</h3>
    <p>{{ $value }}</p>
```

## Criando Layout para Múltiplas Views

O foco dessa aula é sobre o uso de views que compartilham um layout em comum, permitindo uma estrutura mais organizada e reutilizável. Para começar, criei mais duas rotas, cada uma com valores a serem recebidos por parâmetro:

```php
Route::get('/page1/{value}',[MainController::class, 'page1']);
Route::get('/page2/{value}',[MainController::class, 'page2']);
```

Para cada uma dessas rotas, criei métodos no controlador correspondente, que carregam views específicas. Só que se for notado, existe uma grande repetição de conteúdo igual entre as views, para resolver isso, fui introduzido ao conceito de **Layout**. Criei uma pasta chamada '**Layouts**' e, dentro dela, um arquivo de layout chamado '**Main Layout**', que contém a estrutura HTML básica a ser compartilhada entre as diferentes views.

Nesse layout, o local onde o conteúdo que se difere entre as views são definidas por  uma variável do **Blade**, a variável é a "**@yield()**" onde por parâmetro passei a seção 'content' foi criada para permitir que cada view insira seu conteúdo dinâmico:

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <hr>
    @yield('content_main')
    <hr>
</body>
</html>
```

Com esse layout feito, agora podemos utilizá-lo nas views, onde utilizando uma variável do **Blade** chamada **@extends()** passamos o local onde esse layout se localiza, e depois usamos uma variável **@section()** para definir a qual local esse conteúdo pertence:

```php
@extends('layouts.main_layout')

@section('content_main')

    <h1>Welcome View Main and Blade!</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quasi eaque tempore animi odio doloremque porro error eligendi omnis? Nemo recusandae explicabo odio reprehenderit maxime. Quae vel est quasi quo!</p>

    <h3>The value parameter is:</h3>
    <p>{{ $value }}</p>

@endsection
```

## Limpando o código