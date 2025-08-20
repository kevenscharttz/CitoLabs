
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