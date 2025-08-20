
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