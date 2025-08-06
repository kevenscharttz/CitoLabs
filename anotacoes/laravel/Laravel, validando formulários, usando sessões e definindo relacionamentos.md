Nesse curso, vou melhorar o projeto Laravel que começou a ser feito no outro curso, ou seja, além de aprender mais, o projeto em si será melhorado.

## Criando Séries

Nessa parte vamos atingir o mesmo resultado que termos até agora, de inserir uma série, por exemplo, mas com um código um pouco mais sucinto. No **SeriesController**, no método store, a variável **$nomeSerie** está recebendo um **request**, especificamente a propriedade de nome, mas, existe uma dica que não foi comentada no curso anterior, de que podemos acessar diretamente uma propriedade do meu **request**, caso exista um campo com o mesmo nome, que está vindo da requisição:

```php
$nomeSerie = $request->nome;
```

Prosseguindo, falando sobre formas de buscar dados da requisição, vamos ver um outro formato interessante também. Eu vou fazer um `dd()`, que é um _dump and die_, que é um `var_dump` bonito e encerra a execução, ou seja, essa parte do código não continua executando. Eu vou buscar do meu _request_ todos os dados, então eu tenho um método chamado _all_, ele busca tudo que vem da requisição. Então, quando eu adicionar no navegador uma série chamada “Teste”, ele nos exibe o campo “nome” com o seu valor teste. Além disso, também vem o nosso _token_ que adicionamos para a proteção de CSRF

Com isso podemos obter um array associativo com todos os dados da requisição. Imagine, obtermos além do nome da série sua sinopse também, ou uma descrição, enfim.

Só que o _eloquent_, que é o ORM do Laravel, já fornece uma forma de termos o que é chamado de **_mass assignment_**, ou atribuição em massa. Ou seja, preencher vários campos ao mesmo tempo. E isso podemos fazer através de `Serie::create():`. Então toda model do _eloquent_ possui esse método estático chamado **_create_**. E ele recebe por parâmetro um _array_ associativo com todas as propriedades que eu quero armazenar, com todas as colunas de banco de dados que eu quero armazenar. Então, no caso, por exemplo, eu poderia passar `Serie::crete:([‘nome’ => ‘Teste’]):`. Isso já vai inserir no banco de dados uma nova série com o nome “Teste”.

Então estamos recebendo um array associativo, e com isso, podemos passar diretamente esse array pro método **create**. Então, pensando logicamente já que queremos guardar todas as informações, podemos passar o request diretamente para esse método **create**: 

```php
    public function store(Request $request)
    {
        Serie::create($request->all);

       return redirect('/series');
        
    }
```

Porém apenas isso não funcionará, pois ao executar ocorrerá um erro, pois está sendo pedido que eu adicione esse _token_. Só que eu não quero informar o _token_, só um nome. Então, isso é exatamente o propósito dessa propriedade **_fillable_**. Imagina que ao invés de série, eu esteja criando um usuário ou algo do tipo. A pessoa que mandou os dados do formulário, pode enviar um campo chamado “**admin**”, com valor marcado, com valor 1, alguma coisa assim.

 Então, como estou pegando tudo que vem do usuário, eu estou fazendo alterações que eu não queria, eu queria, por exemplo, só alterar o e-mail desse meu usuário, ou criar um novo usuário só com nome e e-mail, sem esses dados de “**admin**”. Então, por isso ser perigoso, o Laravel obriga que informemos um detalhe.

Ou seja, sempre que for utilizado **mass assignment**, eu preciso informar na minha model quais campos podem ser atribuídos dessa forma. Então, eu posso utilizar a propriedade **fillable** para isso. Então será criada uma variável protegida chamada **$fillable** com um array como valor, especificando quais campos podem ser atribuídos em massa: 

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable=['nome'];
}

```

Voltando para alguns detalhes, caso existissem mais campos nessa tabela, e eu quisesse somente o nome e sinopse por exemplo, bastaria eu alterar o o código de **all(  )** para **only (  )**, como no exemplo abaixo:

```php
    public function store(Request $request)
    {
        $nomeSerie = $request->only(['nome', 'sinopse']);
        Serie::create($nomeSerie);

       return redirect('/series');
        
    }
```

Mas se eu quiser o inverso, pegar todos os elementos com exceção de algo, usamos o **except (  )**:

```php
    public function store(Request $request)
    {
        $nomeSerie = $request->except(['_token']);
        Serie::create($nomeSerie);

       return redirect('/series');
        
    }
```

## Agrupando Actions

Bom, como estamos focados em melhorar nosso projeto, algo que pode ser refeito para maior qualidade de código é referente as rotas, se for notado, elas estão sendo uma repetição quanto ao **controller**, e existe uma forma de fazer com que todas essas rotas utilizem o mesmo **controller**. 

Podemos utilizar o **Route::controler( )**, dentro dela vou informar qual o **controller** que estamos utilizando, o **controller** que vai controlar esse grupo de rotas. Como essas rotas serão adicionas a um grupo, utilizamos o método **group( )**, com uma função anônima dentro, e dentro dessa função vão nossas rotas.

Detalhe, com isso feito, podemos apagar os controller que estão dentro das rotas:

```php
<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
});


Route::controller(Seriescontroller::class)->group(function(){
    Route::get('/series', ['index']);

    Route::get('/series/criar', ['create']);

    Route::post('/series/salvar', ['store']);
});

```

Além disso, caso tenha esquecido, existe um padrão chamado **Resource Controller**, se o controller e as rotas seguem esse padrão, existe uma forma mais simples ainda de definir isso, usando:

```php
Route::resource('/series', SeriesController::class);
```

Dessa forma, uma rota no verbo **GET**, com **URI** padrão, vai executar um método **index**, uma **URI** com /create vai executar o método **create**, enfim.
## Nomeando Rotas

Um problema que veio a tona com as ultimas mudanças foi a possibilidade de eu querer alterar as **URL's**, e ter que ficar alterando em todas as nossas views, o que não seria prático. Para resolver esse problema, podemos utilizar um conceito chamado **rotas nomeadas**.

Toda rota pode ter um nome, e podemos informar esse nome utilizando o método **name( )**:

```php
Route::controller(Seriescontroller::class)->group(function(){
	Route::get('/series', 'index')->name('series.index');
	Route::get('/series/criar', 'create')->name('series.create');
	Route::post('/series/salvar','store')->name('series.store');
});
```

Isso não altera a **URL**, ela continua sendo a mesma. Então agora, onde eu utilizava a **URL** diretamente na view, será alterado para uma diretiva do **blade**: 
```{{ route('series.create')}}```. Então, com rotas nomeados podemos nos eximir da responsabilidade de lembrar o nome das URLs, o caminho das URLs, e permite que mudemos as URLs.

Além disso, agora nossos redirecionamentos podem ser alterados para funções mais interessantes, como a: 

```
`return to_route(route:’series.index’);`
```

Dessa forma estou criando uma resposta de redirecionamento para a rota com o nome `’series.index’`.