
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

Está aula foi destinada a limpeza de código, foram removidas todas as views, controllers e rotas que fizemos até o momento.  Também foram removidos arquivos que vieram como padrão no projeto Laravel, como as migrations. seeders, factorys, models, e algumas configurações do arquivo **.env**.

## Controller para Autenticação

Nesta aula, o foco foi dar inicio ao desenvolvimento da aplicação chamada **Notes** usando o framework Laravel. Foi brevemente discutido que o objetivo desse projeto não é necessariamente usarmos a grande quantidade de recursos do Laravel, mas sim os conceitos fundamentais dele, como:

1. **Estrutura do Projeto**: Utilização de rotas, controladores, modelos, views e o motor de templates Blade.
2. **Base de Dados**: Uso de MySQL, incluindo migrations e seeds.

A primeira coisa que fiz foi criar um controller via artisan, onde criei dois métodos, um referente ao **login** e outro ao **logout**:

```php
class AuthController extends Controller
{
    public function login()
    {
        echo 'login';
    }

    public function logout()
    {
        echo 'logout';
    }
}
```

A partir disso, fui até a área de rotas e defini as rotas que levam até os métodos desse controlar:

```php
//Auth routes
Route::get('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
```

## Criando Layout Base da Aplicação e o Formulário de Login

Nesta aula, o foco foi na criação do layout base da aplicação e no desenvolvimento do formulário de login utilizando Laravel. O processo inicia com a cópia da pasta de assets disponibilizada pelo instrutor para a pasta public do projeto, garantindo a disponibilidade dos recursos necessários. Logo após, crio um layout principal com o comando Artisan do Laravel, organizando os arquivos para que o cabeçalho e o rodapé sejam fáceis de gerenciar. O layout é elaborado para ser genérico, possibilitando que diferentes páginas da aplicação compartilhem a mesma estrutura. Alteramos os links de referência para que funcionem com o uso da sintaxe do Blade, o motor de templates do Laravel, para carregar assets corretamente e facilitar a renderização do conteúdo dinâmico nas views:

```php
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOTES</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png') }}" type="image/png">
</head>
<body>

    @yield('content');


    <script src="{{asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
```

Após a criação desse layout, criamos de fato a view do nosso formulário de login usando de base o designe dado pelo instrutor, apenas o interligando com o layout genérico que acabei de fazer:

```php
@extends('layouts.main_layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card p-5">

                    <!-- logo -->
                    <div class="text-center p-3">
                        <img src="assets/images/logo.png" alt="Notes logo">
                    </div>

                    <!-- form -->
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <label for="text_username" class="form-label">Username</label>
                                    <input type="text" class="form-control bg-dark text-info" name="text_username"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="text_password" class="form-label">Password</label>
                                    <input type="password" class="form-control bg-dark text-info" name="text_password"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-secondary w-100">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- copy -->
                    <div class="text-center text-secondary mt-3">
                        <small>&copy; <?= date('Y') ?> Notes</small>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

```

Por fim, fui até o método de login do controlador e o fiz retornar essa view:

```php
public function login()
{
	return view('login');
}
```

## CSRF e Submissão de Formulários

Nesta aula foi discutido a importância da implementação de login em uma aplicação Laravel, desde sua criação até a segurança. Comecei com a estrutura básica do formulário que já existe na view, no campo **action** do formulário acrescentei a rota **/loginSubmit**, que pode ser colocada de outra maneira aqui, mas que iremos ver um pouco mais tarde.

Depois, propriamente nas rotas, eu criei essa nova rota e já defini um nome para o método que irei criar posteriormente:

```php
Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
```

Em seguida, com a rota criada, implementei o método que defini na rota no controlador, porém, o proposito desse método é justamente receber os dados enviados do formulário, então eu tenho que de alguma forma fazer com que esse método tenha esses dados. Para fazer isso, devo passar como parãmetro uma classe do Laravel citada lá no começo do curso, o **Request**, junto com a variável que será usada, que por padrão damos o nome de **$request**.

```php
public function loginSubmit(Request $request)
{
    echo 'login submit';
}
```

Um ponto crucial abordado foi a segurança dos formulários, especialmente a proteção contra ataques CSRF (Cross-Site Request Forgery). O Laravel exige que todos os formulários incluam um token CSRF para evitar que agentes maliciosos enviem dados em nome de um usuário legítimo. O token é gerado automaticamente pelo Laravel e adicionado como um campo oculto no formulário, garantindo que apenas requisições legítimas sejam processadas:

```php
<form action="/loginSubmit" method="post">

@csrf
```

## Como Capturar os Dados do Formulário

Nesta aula, o foco foi a captura de dados de formulários em Laravel. O começo foi  explicando como acessar as informações enviadas ao enviar um formulário, observando que, em Laravel, esses dados são encapsulados em um objeto de request. Com uma função, é demonstrado uma visualização do conteúdo do request, que permite ver detalhes como headers e atributos. Isso ajuda na depuração do código. A função é a **dd( )** ou  'dump and die'.

Em seguida, extrai os dados específicos do request utilizando o método '**input()**'. Onde passamos como parâmetro o **name** do input especifico no formulário, para obtermos seu request. Como exemplificado acessando o 'username' e a 'password' submetidos pelo formulário de maneira simples, enfatizando a importância dessa abordagem para capturar e tratar as informações.

```php
    public function loginSubmit(Request $request)
    {
        echo 'login submit sucess';
        echo '<br>';
        echo $request->input('text_username');
        echo '<br>';
        echo $request->input('text_password');
    }
```