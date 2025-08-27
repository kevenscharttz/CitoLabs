
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

## Introdução à Validação de Dados

Nesta aula, foi abordado sobre a introdução à validação de dados em formulários, enfatizando sua importância e os diferentes níveis de validação. O **primeiro** **nível** é a validação do **HTML5**, que utiliza o atributo '**required**' para marcar campos obrigatórios, mas essa abordagem pode ser facilmente contornada. O **segundo** **nível** envolve o uso de **JavaScript** para validação no lado do cliente, que também pode ser desativado, tornando-a menos confiável. Portanto, o **terceiro** **nível**, que é a validação do lado do servidor, se torna o mais crucial, pois garante que todos os dados sejam verificados antes de serem processados, aumentando a segurança do sistema.

A implementação da validação no Laravel foi feita utilizando o método '**validate()**' para definir regras para campos como '**username**' e '**password**'. Vi como usar arrays ou pipes para definir múltiplas regras e a importância de retornar erros de validação para o usuário. Quando um erro é detectado, o Laravel armazena esses erros na sessão e os apresenta na página do formulário, permitindo que o usuário saiba quais campos precisam ser corrigidos.

```php
    public function loginSubmit(Request $request)
    {
        //form validation
        $request->validate(
            [
                'text_username' => ['required', 'min:3', 'max:25'],
                'text_password' => ['required', 'min:6', 'max:25'],
            ]
        );

        //get user input
        $username = $request->input('text_username');
        $password = $request->input('text_password');
        echo 'OK!';
    }
```

Com acesso aos erros, podemos apresentá-lós em uma view, que pode ser feita utilizando a sintaxe do Blade. Fiz um **if** para caso exista qualquer erro, seja criado uma div com uma lista não ordenada, dentro dessa lista fiz um **foreach**, para que seja colocado cada erro: 

```php
{{-- Errors --}}

@if ($errors->any())
    <div class="class alert alert-danger mt-3">
        <ul class="class m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
 @endif
```

## Mostrar Erros nos Inputs e Manter os Dados

Nesta aula, foi discutido sobre como aprimorar a apresentação de erros em formulários no Laravel. A abordagem principal é exibir os erros diretamente abaixo dos campos específicos, em vez de colocá-los em uma caixa grande no final da página. Para implementar essa lógica, podemos usar condições que verificam se há erros associados a cada campo de entrada, como nome de usuário e senha, exibindo a mensagem de erro correspondente quando necessário:

```php
<label for="text_username" class="form-label">Username</label>
<input type="text" class="form-control bg-dark text-info" name="text_username">

{{-- Show Error --}}
@error('text_username')
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
```

Adicionalmente, é vi a importância de manter os dados que o usuário já preencheu, mesmo em caso de erros. Para isso, usei a função '**old()**' do Laravel, onde passo por parâmetro o name da input correspondente, ela é utilizada para reter os valores nos campos, evitando que o usuário perca informações ao tentar enviar o formulário novamente:

```php
value="{{ old('text_username') }}">
```

## Definir textos personalizados para os erros de validação

 O foco da aula foi na personalização de mensagens de erro para validações em formulários, especificamente para os campos de **username** e password. É importante substituir as mensagens de erro padrão em inglês por mensagens personalizadas em português, além disso,  vi como implementar regras de validação para os campos. Comecei definindo um array com as regras de validação, como assegurar que o **username** seja um **email** e que a password tenha entre seis e dezesseis caracteres. Depois, adicionei regras extras, como usar um pipe para validar o formato do email, e é mencionado a possibilidade de ignorar as validações padrão do HTML5.

```php
public function loginSubmit(Request $request)
{
        //form validation
    $request->validate(

            // rules
        [
            'text_username' => ['required', 'min:6', 'email'],
            'text_password' => ['required', 'min:6', 'max:25'],
        ],
            // errors messages
        [
            'text_username.required' => 'O username é obrigatório',
            'text_username.email' => 'Insira um e-mail válido',
            'text_username.min' => 'O username deve possuir ao menos 6 caracteres',

            'text_password.required' => 'A sennha é obrigatório',
            'text_password.max' => 'A senha pode ter no máximo :max caracteres',
            'text_password.min' => 'A senha deve possuir ao menos :min caracteres',
        ]
    );

        //get user input
    $username = $request->input('text_username');
    $password = $request->input('text_password');
    echo 'OK!';
}
```


Posteriormente, é abordado a definição de mensagens de erro personalizadas, permitindo que o desenvolvedor especifique os textos que serão exibidos para cada tipo de erro, como quando o username está vazio ou não é válido, e a requirementos da password. No final da aula, é feita uma demonstração prática das validações e mensagens personalizadas em funcionamento, enfatizando a importância de manter a consistência nas mensagens e como isso melhora a experiência do usuário ao interagir com os formulários.

## Vamos criar uma base de dados

Nesta aula, meu foco foi na criação de um banco de dados para o projeto. Primeiro comecei configurando um ambiente de desenvolvimento local, criando um banco de dados chamado **Laravel_Notes**, e um usuário especifico para acessá-la, garantindo permissões necessárias. Em seguida, detalhou o processo de configuração do arquivo de ambiente (.env) para conectar o Laravel à base de dados **MySQL**:

```json
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_notes
DB_USERNAME=user_laravel_notes
DB_PASSWORD=@cito2025
```

Após configurar essas credenciais, fiz um teste de conexão utilizando a **facade DB** do Laravel usando um bloco try-catch para lidar com possíveis erros. O instrutor mencionou que, embora a conexão tenha sido estabelecida, a base de dados ainda estava vazia, sendo necessário criar tabelas e inserir dados para que o sistema funcione corretamente.


## Introdução as Migrations

Nesta aula foi abordados o conceito de migrations no Laravel, que são essenciais para gerenciar a estrutura de tabelas do banco de dados. A aplicação já está conectada a uma database, porém não tinha ainda tabelas criadas. Para o nosso sistema de notas, são necessárias duas tabelas: uma para os usuários e uma outra para as notas. A **migration** é um arquivo PHP que define a estrutura de uma tabela, e para cada tabela que desejamos criar, precisamos de uma migration correspondente.

Como nós criamos uma migration? Bom, rodando o comando **```php artisan make:migration```** nós criamos essa migration, posteriormente a isso incluimos o nome dessa migration, o que não é importante apenas para o nome e pronto, isso ajuda o Laravel a criar de maneira mais adequada essa migration, dessa forma podemos definir o tipo do schema e o nome da tabela:

```
php artisan make:migration create_notes_table
```

Após isso o Laravel cria um arquivo na pasta Database/Migrations, contendo os métodos **up** (para criar a tabela) e down (**para** reverter a migração).

Para a tabela de usuários, a sua estrutura é composta por: username, password, last login, created at, updated at e deleat at.  O ID é um inteiro e é a chave primária, com o método **autoIncrement()**, fazemos ele aumentar sozinho seu valor conforme mais dados são colocados no banco, username e password são do tipo varchar, ou no caso do código, string. Já os campos de data são do tipo datetime ou timestamps.  Por fim, um detalhe importante é que o **created_at** e o **update_at** são criados automaticamente utilizando o método **timestamps( )**, e que estamos usando um outro método para não apagar de fato um dado do sistema, e sim mandar ele para outro local separado, nós chamamos isso de **soft delete**:

```php
public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id()->autoIncrement();

            // nullable = can be null
            $table->string('username', 50)->nullable();
            $table->string('password', 200)->nullable();
            $table->datetime('last_login')->nullable();

            // created_at, updated_at
            $table->timestamps();

            $table->softDeletes();
        });
    }
```

Recapitulando executei o comando `php artisan migrate` para criar as tabelas na base de dados, e o Laravel mantém um histórico de migrações em uma tabela chamada migrations. Se uma coluna foi esquecida, podemos usar o comando abaixo para reverter a última migração.

```
php artisan migrate:rollback
```


## Introdução às Seeders

Está aula foi sobre o conceito de **seeders** no Laravel, que são utilizados para preencher tabelas com dados de teste após a realização de uma migração. O processo de criação de uma seed foi demonstrada passo a passo, começando pela execução do comando PHP Artisan para gerar um arquivo **seeding**, que deve ser nomeado de forma adequada, como no caso das **migrations**:

```
php artisan make:seeder UsersTableSeeders
```

Dando foco apenas para uma coisa, foquei em fazer as inserções na tabela de usuários. Como explicado, o método **DB::table()** permite espeficarmos a tabela, e o método **inser()** para adicionar os registros. FOi mostrado como criar um array associativo para definir os valores a serem inseridos, incluindo o nome de usuário e a senha, que é encriptada usando a função **password_hash**, posteriormente substituída por **bcrypt()**, e por quê? Porque tradicionalmente o tipo de encriptação que é pedida no password_hash é o bcrypt, então podemos usa-ló direto:

```php 
 public function run(): void
    {
        // create multiple users
        DB::table('users')->insert([
            [
                'username' => 'user1@gmail.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'user2@gmail.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'user3@gmail.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'user4@gmail.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
```

Ademais, para adicionar múltiplos usuários, foi feito um array de arrays associativos. 

## Introdução aos Models

Nesta aula,  vi a introdução aos Models no Laravel, focando no padrão **MVC** (Model View Controller). Revisando conceitos como rotas, controllers, views, Blade, migrations e a conexão com bancos de dados, destacando a importância dos models na comunicação com as bases de dados. Explorei o Eloquent ORM do Laravel, que facilita a interação com o banco de dados através de objetos PHP, e vi como criar models usando o comando:

```php
php artisan make:model
```

Foi destacado que o nome do model deve ser singular, pois o Laravel associa automaticamente a tabela no plural (exemplo: '**User**' se relaciona com a tabela '**users**').

Foi mostrado também como verificar o funcionamento do model através do **Auth Controller**, utilizando o método '**all( )**' para buscar todos os usuários da base de dados. Ao final, discutimos a criação de objetos do model e a execução de métodos para acessar os dados, reforçando a facilidade que o Laravel oferece na manipulação de dados em aplicações web.

```php
    // get all users from the database
    
    /**
    * pegar todos os dados da tabela de users, e passar para um array
    */
    $users = User::all()->toArray();

    //as an object instance of the model's class
    $userModel = new User();
    $users = $userModel->all()->toArray();
        
    dd($users);
```

A diferença entre as duas abordagens é principalmente a forma como você instancia e interage com o modelo `User`, mas ambas têm o mesmo resultado final.  Aqui,  no primeiro caso, estou chamando o método ```all()``` diretamente na classe `User`. Isso retorna uma `Collection` de objetos `User`. Depois chamando o método `toArray()`, essa coleção é convertida em um array simples.

Nesta segunda versão, é criado uma instância do modelo `User` e depois chama o método `all()`. O comportamento é o mesmo, e o resultado é uma `Collection` que depois é convertida em array pelo `toArray`.

## Autenticação Básica de Users

Nesta aula, abordei a autenticação básica de usuários em um sistema. Iniciei revisando como recuperar informações da tabela de usuários e, em seguida, foquei na lógica necessária para validar os dados inseridos no formulário de login.

Primeiro, verifiquei se o nome de usuário existe. Se não existir, consideramos o login incorreto. Caso não exista, é dado como retorno o redirecionamento para a página anterior, sem perder os dados dos inputs e com uma mensagem de erro que criei:

```php
if (!$user){

    /**
    * Redireciona para a página anterior com os inputs e com uma mensagem de erro, que temos acesso com a chave.
    */
     return redirect()
        ->back()
        ->withInput()
        ->with('loginError', 'Username ou Password incorreto');
}
```

E como fazemos a mensagem de erro aparecer? Vamos até a view e fazemos uma condicional. Caso exista a chave de erro na sessão, será criado uma div com o texto do erro: 

```php
@if (@session('loginError'))
    <div class="alert alert-danger text-center">
        {{ session('loginError') }}
    </div>
@endsession
```

Agora, caso o usuário esteja correto, será necessário verificarmos se a senha desse usuário está correta também para a validação da senha com a função '**password_verify( )**' do PHP. Se a validação falhar, redirecionamos novamente com uma mensagem de erro:

```php
if (!password_verify($password, $user->password)){
	return redirect()
		->back()
		->withInput()
		->with('loginError', 'Username ou Password incorreto');
}
```

Se ambos os testes forem bem-sucedidos, atualizamos a coluna '**last_login**' do usuário e armazenamos os dados na sessão, confirmando que o usuário está logado: 

```php
$user->last_login = date('Y-m-d H:i:s');
$user->save();
```

## Efetuando o Logout

Nesta aula, foi discutido sobre o processo de logout em uma aplicação web. Começamos revisando o que ocorre após um login bem-sucedido, quando um **cookie** de sessão é criado no navegador. O foco principal foi a implementação do método de logout no controlador de autenticação (**AuthController**). O primeiro passo para efetuar o logout é remover o usuário da sessão com o comando '**session()->forget('user')**', especificando a chave do usuário que desejamos esquecer. Isso garante que a sessão será limpa ao executar o logout, removendo qualquer informação do usuário logado

Após a remoção do usuário da sessão, redirecionamos o usuário de volta para a página de login utilizando '**return redirect()**', apontando para a rota de login definida nas rotas da aplicação, usando o método **to()**:

```php
public function logout()
    {
        // logout from the application
        session()->forget('user');
        return redirect()->to('/login');
    }
```

##  Fluxo Normal de Um Sistema com Autenticação

Nesta aula, foi discutido sobre o fluxo normal de um sistema de autenticação, com foco nos processos de login e logout, especialmente no contexto do Laravel. O fluxo começa quando um usuário tenta acessar páginas protegidas que exigem autenticação. Se o usuário não estiver logado, ele será redirecionado para um formulário de login. Com um login bem-sucedido, o usuário ganha acesso à aplicação.

Além disso, abordamos a importância do logout, que destrói a sessão do usuário, retornando-o ao estado não autenticado e reiniciando o ciclo. Um conceito fundamental discutido foi o **middleware**, um pedaço de código executado em rotas específicas que verifica se o usuário está autenticado antes de permitir o acesso a determinadas áreas da aplicação. Isso centraliza a lógica de verificação em um único ponto e ajuda a garantir segurança, redirecionando usuários não autenticados para a página de login.

## Introdução ao Middleware

Nesta aula, vi sobre o conceito de middleware e sua implementação em uma aplicação Laravel. Iniciou com a importância do middleware na gestão de rotas, especialmente no controle de acesso de usuários logados. A aula começa com a criação de uma rota base que redireciona o usuário para a página principal após um login bem-sucedido. Em seguida, introduzimos métodos no controlador, como o método '**Index**' e um método temporário para criar uma nova nota:

```php
class MainController extends Controller
{
    function index()
    {
        echo "I'm inside the app !";
    }

    function newNote()
    {
        echo "I'm creating a new note";
    }
}

```

Um ponto crucial tratado foi a separação das rotas que exigem autenticação e aquelas que não. Por exemplo, rotas de login não devem ser acessíveis a um usuário já autenticado, enquanto rotas como logout devem ser restritas a usuários logados. Para gerenciar isso, criamos um middleware que verifica se o usuário está logado antes de permitir o acesso a determinadas rotas. O **middleware** é criado usando o comando `PHP Artisan`, recebendo um nome descritivo para fácil identificação. Sua função principal é verificar a sessão do usuário; se não estiver logado, o usuário é redirecionado para a página de login. Demonstramos como aplicar o middleware a grupos de rotas, garantindo que apenas usuários autenticados possam acessá-las:

```php
public function handle(Request $request, Closure $next): Response
    {
        // check if user is logged
        if (!session('user')){
            return redirect('/login');
        }
        return $next($request);
    }
}
```

Por fim, foi enfatizado sobre a importância de testar o **middleware**, mostrando como ele impede o acesso a rotas restritas quando um usuário não está logado. Também mencionamos a necessidade de um segundo middleware para certificar que usuários logados não consigam acessar a página de login novamente.

## Middleware adicional

Nesta aula, vi  sobre a criação de um middleware adicional para gerenciar o acesso a rotas em nossa aplicação. O objetivo principal foi garantir que usuários logados não possam acessar a página de login.

Iniciamos revisando o estado da aplicação, onde foi confirmado que um usuário estava logado. Depois, realizamos o logout, assegurando que não havia usuários ativos. Em seguida, desenvolvemos o middleware chamado **'CheckNotLogged'**, que verifica se um usuário está logado antes de permitir o acesso à página de login. Caso um usuário logado tente acessar essa página, o sistema o redireciona automaticamente para a página inicial.

```php
    {
        // check if user is not logged
        if (session('user')){
            return redirect('/');
        }
        return $next($request);

    }
```

Para implementar isso, utilizamos o comando PHP Artisan Make para criar o middleware e ajustamos o código para verificar a sessão do usuário. Depois, aplicamos essa lógica de verificação nas rotas relevantes, usando a função de middleware para englobar as rotas de login.

```php
Route::middleware([CheckNotLogged::class])->group(function(){
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
});
```

