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

```php
return to_route(route:’series.index’);
```

Dessa forma estou criando uma resposta de redirecionamento para a rota com o nome `’series.index’`.

Voltando para as rotas, como nós nomeamos tudo de forma padronizada, podemos usar ao invés daquele grupo de rotas, o resource, que já contem em si algumas regras sobre ligações quando usamos os **resource controllers**:

```php
Route::resource('/series', SeriesController::class);
```

## Excluindo uma série

Agora vamos nos aprofundar um pouco mais já vimos várias coisas interessantes, então agora vamos partir para uma nova funcionalidade, a de deletar uma série. Mas antes disso, é interessante falarmos sobre um pequeno detalhe. Nas nossas rotas está sendo usando o **Rute::resource**, que basicamente trás todas as todas que estamos usando caso seja seguindo o padrão dos **Resource Controllers**, mas além dos que estamos usando, ele trás também os que não estamos usando, como a rota para deletar ou atualizar uma série, então é interessante especificar quais desses estão sendo usados. Para fazer isso, podemos usar alguns métodos que já vimos em outros momentos, o **except (  )** e o **only (  )**, onde especificaremos quais serão utilizadas: 

```php
Route::resource('/series', SeriesController::class)
	->only(['index', 'create', 'store']);
```

Bom, com isso feito, podemos partir para a nossa feature, vamos começar isso acrescentando um botão nas nossas listas se séries, que indique que ao ser clicado, a série será apagada. E por que um botão e não um link? Quando temos uma ação que vai, por exemplo, acessar o nosso banco de dados, ou executar alguma regra de negócios e ter algo que é permanente, que salva no banco, que cria uma mensagem, que envia um e-mail.

Esse tipo de ação não deve ser feito através de uma requisição _get_. Imagina que esse sistema está disponível na web, e o motor do Google vai acessar esse sistema, e ele vai seguir nossos links. Então, ele vai seguir esse link de remover, e vai acabar removendo as séries, por exemplo.

Então, sempre que temos alguma ação que é permanente, ou no caso, destrutiva, que é de remover uma série, vamos utilizar o verbo _post_. Mas você pode ter ficado sabendo, que em HTTP temos um verbo específico para remover detalhes, que no caso seria o verbo _delete_. Exatamente, e esse é o ideal de se utilizar quando podemos, só que o HTML só funciona com os verbos _get_ e _post_. Como estamos trabalhando com HTML, precisamos trabalhar com um desses dois.

Sabendo disso agora, podemos partir para a criação da nossa nova rota:

```php
Route::post('/series/destroy', [SeriesController::class, 'destroy']);
```

Porém apenas isso não será o bastante, vamos imaginar o seguinte, como poderemos saber qual série exatamente desejamos excluir, precisamos de um dado para isso, como o **id**, mas como podemos passar esse id? Podemos passar o id da série pela **URI** da série, passando-a como parâmetro, já que o Laravel nos ajuda com isso:

```php
Route::post('/series/destroy/{serie}', [SeriesController::class, 'destroy']);
```

Agora, no nosso controller, vamos criar uma novo método que receberá como parâmetro a variável de request, e nesse método podemos recuperar o id dessa série, mas, como podemos fazer enviar? Essa URL `series/destroy/{serie}`, espera um _post_, eu não posso ter um link, como eu já falei. Então, eu vou criar um formulário que só tem um botão, nesse formulário vamos definir na sua action uma rota nomeada, e depois simplesmente passar o método da variável $serie: 

```php
<x-layout title="Séries">
    <a class="btn btn-primary" href="{{ route('series.create') }}" role="button">Link</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->nome }}
                
                <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                    @csrf
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>

```

Agora o botão está sendo enviado para o local certo e com o id de forma correta, por fim, basta realizarmos de fato a exclusão dessa série escolhida. No nosso controller, dentro do método, vamos simplesmente usar o método de **Serie** chamado **destroy**, onde dentro desse método vamos passar nossa série que veio com o **$request** e redirecionar para página inicial:

```php
public function destroy(Request $request)	
{
	Serie::destroy($request->serie);
	return to_route('series.index');
}
```

Com isso, tudo já vai funcionar corretamente, porém podemos fazer algo para melhorar mais ainda, nas nossas rotas, ao invés de fazer ela ser do tipo **POST**, podemos fazer com que ela seja do tipo **DELETE** o que é mais correto: 
```php
Route::delete('/series/destroy/{serie}', [SeriesController::class, 'destroy'])->name('series.destroy');
```

Porém como já foi dito o **HTML** não suporta outros métodos além do GET e do POST. Porém, existe uma magica que o Laravel trás para gente, informando que o método por baixo dos panos vai ser do tipo **DELETE**, apenas usando esse outro parâmetro após o nosso **@csrf** por exemplo, parâmetro esse sendo **@method("DELETE")**.

E agora de fato por fim, como estamos usando corretamente o método, podemos incluir a rota dentro de resource, e especificando que o destroy também pode ser usado:

```php
Route::resource('/series', SeriesController::class)
	->only(['index', 'create', 'store', 'destroy']);
```

Porém,  para de fato isso funcionar, temos que lembrar de uma detalhezinho muito chato, que é o fato de que quando usamos o resource **controllers**, os parâmetros dessas URL's precisam ser no singular, por exemplo, ao invés de **serie**, eu devo usar **series**:

```php
Serie::destroy($request->series);
```

## Session e Flash Messages

Bom, seria interessante que existisse uma mensagem de sucesso ao excluirmos uma série, podemos fazer isso utilizando dados de sessão, mas como posso pegar os dados de uma sessão? Através do request, eu posso utilizar o método **session(  )**. 

Então, quando eu remover uma série, posso adicionar uma mensagem à sessão usando o método **put**:

```php
$request->session()->put('mensagem.sucesso', 'Série removida com sucesso');
```

A primeira parte é a chave e a segunda é de fato a mensagem. Com essa mensagem feita, basta ir até o método do index, onde podemos recuperar essa mensagem e armazena-lá em uma variável através do método **get(  )** e depois retornar essa mensagem na view com o **with(  )**:

```php
$mensagemSucesso = $request->session()->get('mensagem.sucesso');

return view('series.index')
	->with('series', $series)
	->with('mensagemSucesso', $mensagemSucesso);
```

É preciso usar isso na **view** agora, criando uma div que apresentasse essa mensagem, e envolver isso com um **isset**, para que caso exista essa mensagem ela ser mostrada:

```php
    @isset ( $mensagemSucesso )
        <div class="alert alert-success">
            {{ $mensagemSucesso }};
        </div>
    @endisset
```

Porém quando atualizamos a página, essa mensagem continua aparecendo, porque ela continua salva na sessão, para que ela seja apagada após ser mostrada e a página ser atualizada, precisamos utilizar um outro métodos chamado **forget(  )** do nosso **request**:

```php
$request->session()->forget('mensagem.sucesso');
```

Esse método que utilizamos para essa tarefa não é o único que existe, e apesar de ser bem tranquilo, existe uma forma ainda mais fácil de se executar essa tarefas de mostrar a mensagem e depois remove-lá, que utilizando o **flash** no lugar do **put**. Mas, como que eu faço uso de **flash messages**? Basta adiciona-ló como qualquer outro dado de sessão, só que agora eu não preciso mais usar o **forget( )**, porque ela já é esquecida automaticamente. uma _flash message_ é uma mensagem que adiciono na sessão, um dado que adiciono na minha sessão, que só dura um _request_:

```php
$request->session()->flash('mensagem.sucesso', 'Série removida com sucesso');
```

Seguindo o mesmo esquema explicado, podemos adicionar uma nova mensagem para quando o usuário conseguir adicionar uma série:

```php
$request->session()->flash('mensagem.sucesso', 'Série adiciona com sucesso');
```

## Mais dados de requisição

Continuando dentro desse tema da mensagem de sucesso, seria interessante mostrar na mensagem o nome da série que estou adicionando ou excluindo. Primeiro na mensagem de inclusão no banco, como puxar o nome de qual série foi adicionada?  Ao criar uma série, preciso pegar o nome essa série que foi criada para adicionar na mensagem. E esse método `::create`, ou seja, o método estático _create_, já nos retorna a _model_ que foi criada, no caso uma série nossa. Então, se eu já tenho a série em mãos, basta adicionar o nome dela na nossa mensagem:

```php
$nomeSerie = Serie::create($request->all());
$request->session()->flash('mensagem.sucesso', "{$nomeSerie -> nome} adiciona com sucesso");
return to_route('series.index');
```

Agora para a mensagem de exclusão dá série, é um pouco mais complicado, o nosso método que está sendo usado, o **destroy**, não nos devolve qual foi a série removida. Para que eu possa recuperar os dados necessários, existem algumas formas. Primeiro, podemos usar o método **find(  )** , ele encontra uma série baseada no id:

```php
$serie = Serie::find($request->series);
```

 Essa é uma forma. Só que tem uma outra forma um pouco mais interessante. O Laravel consegue nos ajudar em alguns cenários quando tenho parâmetros na rota.

lembra que esse _destroy_ a rota é `/series/destroy/{series}`?. Então, consigo ter um parâmetro chamado `series`, e ele nos traz alguma informação. Qual informação? Depende do tipo que eu definir esse parâmetro. Vou te explicar o que isso quer dizer.

 Eu vou ter um parâmetro chamado `series` e o tipo dele vai ser inteiro, por exemplo. Com isso, eu vou ter acesso ao ID da minha série. Então isso já deixa um pouco mais interessante o código. Então vamos atualizar e garantir que tudo continua funcionando.

 Agora, se ao invés de um inteiro, eu disser que é uma _model_ do tipo série, o que o Laravel vai fazer por baixo dos panos é exatamente a parte do código que está dentro das chaves.

Como ele já vai fazer isso, eu não preciso dessa linha `$serie = Serie::find($series);`. Então, repara que eu consegui buscar a série sem nem precisar adicionar código no meu _controller_, só de informar o parâmetro que eu estou utilizando `public function destroy (Serie $series)`, isso é bastante interessante.

Mas vamos lá, continuando,  agora eu não preciso mais chamar esse método estático _destroy_, passando, por exemplo, dessa minha `series` o ID. Eu posso fazer isso sem problema nenhum, mas posso também, direto da minha instância, chamar o método _delete_, então `$series->delete()`.

 Só que agora temos um erro, antes utilizávamos o _request_, como fazemos agora? E a boa notícia é que eu posso, sem problema nenhum, ter mais de um parâmetro nas minhas _actions_. Então, basta eu adicionar um _request_, `public function destroy (Serie $series, Resquest $request)`.

E agora, um detalhe. Eu comentei que como tem um parâmetro na minha rota, o nome desse parâmetro importa, porque o Laravel vai pegar de `/series/destroy/{series}` o nome entre chaves e com isso ele vai saber que esse parâmetro da _action_ é para ser mapeado por esse parâmetro da rota, de alguma forma. Então, o Laravel utiliza esse nome para se achar.

Agora, quando estamos falando do _request_, não precisamos, o nome pode ser qualquer coisa, pode ser requisição, por exemplo, que não vai ter problema. Ele vai ver que o tipo desse parâmetro é um _request_ e vai saber criar para nós. Então, dessa forma, tenho minha série sendo removida, e posso adicionar o nome dela. `“ Série ‘ {$series ->nome} removida com sucesso”´)`:

```php
    public function destroy(Serie $series, Request $request)
    {

        $series->delete();
        $request->session()->flash('mensagem.sucesso', 'Série removida com sucesso');

        return to_route('series.index');
    }
```

## Processo de validações

Ao tentarmos enviar uma série vazia, sem passar um nome, acabamos por gerar um errro justamente pelo envio vazio desse input.  Por que isso acontece? Quando mandamos um _input_ com valor vazio, o Laravel não preenche isso. Então, é como se aquele valor, se aquele nome fosse nulo. Então eu estou tentando mandar um nulo para o banco de dados. E isso é um problema, porque o nome de uma série não pode ser nulo.

Como podemos resolver isso? Pensando no envio do formulário para o banco de dados, no **$request** existe um método chamado **validade( )**, onde podemos especificar quais tipos de validação para serem executados no elemento que queremos validar, nesse caso o nome. Caso essas condições não seja atendidas, é redirecionado para a página anterior(ou no caso, a que ocorreu a validação):

```php
public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'min:3']
        ]);
        $nomeSerie = Serie::create($request->all());

        $request->session()->flash('mensagem.sucesso', "{$nomeSerie -> nome} adiciona com sucesso");
        return to_route('series.index');
        
    }
```

vale lembrar que o método **`validate()`** não apenas redireciona o usuário de volta em caso de falha na validação, mas também disponibiliza as mensagens de erro e os dados antigos na sessão, facilitando a exibição das mensagens e o repopulamento dos campos no formulário.

## Exibindo erros

Como dito anteriormente, caso a validação não passe, o Laravel retorna uma resposta de redirecionamento para a página anterior. E além disso, na _flash message_, ele adiciona todas as informações do _request_ que não foi válido. Então conseguimos acessar o _request_. E quando ocorre essa falha, além de adicionar todos os campos, todo o _input_, todo o _request_ no _flash_, ele também adiciona todos os erros, as mensagens de erro. E existe um detalhe do Laravel que transforma todos esses erros em uma variável já utilizavel, chamada **errors**. Na documentação já existe um HTML pronto para exibição dessas mensagens: 

```php
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

Copiando isso para nossa **view** de layout. E o que está ocorrendo exatamente? Estou verificando se existe algum erro. Essa variável `errors` sempre vai existir. Então, eu tenho acesso a esse método que verifica se tem algum dado na minha variável `errors`. E se existir, eu vou exibir todos os erros. Só isso.

Então, com isso, já começamos a brincar com as validações, só que eu comentei que, de novo, além das mensagens de erro, o Laravel também coloca na _flash_ toda a requisição. Então, se eu quiser preencher esse campo, eu posso fazer da seguinte forma, eu vou para a _view_ de _create_, e lembra que posso informar o nome de alguma forma? Esse nome vai vir da minha sessão, vai vir da minha requisição anterior.

E para isso, o Laravel nos fornece uma função chamada _old_. Essa função pega da _flash session_, daquela sessão que dura uma vez só, a requisição anterior, que foi adicionada pela validação. Assim, como eu tenho toda essa minha requisição, posso pegar o campo chamado “nome”:

```php
<x-layout title="Nova Série">
	{{-- Essa função pega da flash session, daquela sessão que dura uma vez só, a requisição anterior, que foi adicionada pela validação. --}}
	<x-series.form :action="route('series.store')" :nome="old('nome')" :update="false" />
</x-layout>
```

Então, com isso, se eu adicionar somente um “A” no nome da série no navegador, ele volta e já preenche para nós. Só que então entra um outro detalhe, quando eu inspeciono a página, estou tentando mandar esse novo formulário com o valor do método como _put_. Ou seja, como se eu estivesse atualizando uma série existente. Então, preciso mudar aquela nossa lógica. No _form_, ao invés de verificar se o nome existe, vou simplesmente fazer um _if_, se o _update_ existe e é verdadeiro:

```php
<form action="{{ $action }}" method="POST">
    @csrf
    @if ($update)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control"
            @isset($nome) value="{{ $nome }}@endisset">
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
```

Dessa forma, no edit irei definir que o update é **true**, e no create que é **false**.

## Extraindo um FormRequest

Ainda trabalhando com as mensagens de erros, existem alguns probleminhas que precisam ser corrigidos, o primeiro é a necessidade de copiar o código de validação em outros métodos, e repetição de código não é algo legal, e que a mensagens de erros estão todas em inglês, o que não é tão interessante no nosso caso.

Para resolver o primeiro problema, podemos fazer isso de uma forma até que simples, vamos pensar, e se eu precisasse adicionar uma outra regra, precisaria alterar em dois lugares. Como podemos fazer isso? Posso, ao invés de utilizar o _request_ genérico do Laravel, criar o meu próprio _request_ e já informar todas as regras necessárias.

Para isso, vamos utilizar o Artisan, **php artisan make:request SeriesFormRequest**. Isso cria uma classe de _request_ para nós. E eu informo o nome dessa classe, ou seja, uma requisição de um formulário de série, que tem as informações de uma série:

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

    }
}
```

 Então já temos todas as funcionalidades de uma requisição normal. Então, esse primeiro método, não estamos trabalhando com detalhes de segurança, autenticação, autorização, então todo mundo vai estar autorizado a fazer esse _request_. Então vou simplesmente retornar um _true_, `return true:`. E entra o que realmente precisamos, que são as regras de validação. Então vamos pegar aquela nossa regra para o nome e copiar e adicionar.  Informando que o nome é obrigatório e precisa de pelo menos 3 caracteres:

```php
    public function rules(): array
    {
        return [
           'nome' => ['required', 'min:3', 'max:45'],
        ];
    }
```

Dessa forma, eu tenho uma classe específica para as minhas validações, para representar a minha requisição, então com isso, no formulário, ao invés de utilizar essa a classe de Request, vou utilizar o `SeriesFormRequest`. E além disso não será mais necessário o método validate.

Agora imagine que eu queira uma mensagem personalizada para o nome de uma série. Então, quando tem qualquer erro com o nome de uma série, quero uma mensagem personalizada. Imagina que eu queira uma mensagem personalizada para o nome de uma série. Então, quando tem qualquer erro com o nome de uma série, quero uma mensagem personalizada:

```php
    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigátorio',
            'nome.min' => 'É obrigatório ao menos :min caracteres',
            'nome.max' => 'O nome não pode ultrapassar :max caracteres',
        ];
    }
```

Mas e se o que eu queira de verdade seja a tradução dessas mensagens? Bom, indo novamente ao terminal, podemos usar o comando ```php artisan lang:publish``` para criarmos uma pasta **lang**. Por enquanto só temos inglês, todo o nosso sistema teoricamente está em inglês e poderíamos trabalhar com traduções. Caso deixemos o sistema em inglês, sem alterar nada das configurações, podemos ir até a mensagem especifica e altera-lá, porém com isso, eu não estou fazendo da melhor forma, o ideal era ter um outro arquivo de idioma, em outra pasta, para ser em português, mas não vamos falar disso agora. Só para vermos que seria possível fazer essa tradução.

## Temporadas e Episódios

Para definirmos um relacionamento com o Eloquent ORM, nós não vamos criar uma propriedade nova, nós vamos criar um método de relacionamento.  que antes de criarmos o relacionamento entre série e uma temporada, por exemplo, preciso ter essa temporada. Então vamos criar as _models_ de temporada e de episódio. E se eu adiciono o parâmetro M, ele já cria uma _migration_ para mim ```php artisan make:model Season -m```.

Eu tenho a _model_ de temporada e a _model_ de episódio. Então vamos voltar para a série, `Serie.php`. Em algum momento que tenha a série, eu quero poder acessar suas temporadas. Mas eu já falei que eu não vou criar essa propriedade, então para acessar, vou criar um método de relacionamento.

Então é criado um método chamado **temporadas**, e o nome desse método é o nome pelo qual eu quero acessar esse relacionamento. Se quando eu tiver uma série, eu quiser acessar temporadas, vou criar um método chamado temporadas. Agora que eu tenho esse método, ele precisa retornar alguma forma de relacionamento, e temos várias. No caso, uma série tem várias temporadas, posso simplesmente escrever isso em inglês, dizendo que essa série _has many_, ou seja, “tem muitas temporadas”, no nosso caso, “season”, `return $this->hasMany(related: Season::class):`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable=['nome'];

    public function temporadas()
    {
        return $this->hasMany(Season::class);
    }
}
```

O que isso está fazendo? Ele está informando que uma série vai ter um relacionamento com a _model_ de temporada do tipo 1 para muitos. Uma série possui várias temporadas. Inclusive, posso fazer o relacionamento inverso também, posso dizer que uma temporada pertence a alguma série, então eu vou criar um método de série.  Essa temporada tem uma série, ela pertence a uma série. Posso retornar informando que `return $this->belongsTo(Serie::class)`:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    
    public function series(){
        return $this->belongsTo(Serie::class);
    }

        public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}

```

 Agora, uma temporada tem também muitos episódios, então vamos lá, `public function episodes()`, e eu posso definir no retorno `return $this->hasMany(Episode::class)`. Mesma coisa na classe de episódio, eu posso mapear a temporada, então `public function season()`, que vai retornar `return $this->belongsTo(Season::class)`.

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function season()
    {
        return $this->belongsTo(Season::class);// pertence a temporadas
    }
}

```

## Migrations

Começamos a mapear os relacionamentos do modelo, série com temporadas, e isso etá quase funcionado, então precisamos ver alguns detalhes. Primeiro, o Eloquent está montando a **query**, utilizando como chave estrangeira uma coluna chamada **serie_id**, só que como estamos usando todo o sistema em inglês, deve ser **series_id**. Podemos resolver de uma forma, no relacionamento de série com temporadas, além de informar com qual classe ela vai se relacionar, posso informar qual nome da chave estrangeira, no caso vai ser **series_id**. Com isso, se eu atualizar, ele já passa a utilizar a coluna **series_id**. Assim, conseguimos personalizar o nosso modelo do banco de dados.  Caso eu precisasse fazer com que essa chave estrangeira referencie uma coluna na minha tabela, que não é a minha chave primária, eu poderia informar o último parâmetro `localKey`.

```php
class Serie extends Model
{
    use HasFactory;
    protected $fillable=['nome'];

    public function temporadas()
    {
        return $this->hasMany(Season::class, 'series_id');
    }
}
```

Com isso entendido, vamo só passar os olhos nos relacionamentos possíveis que o Eloquent fornece. Dando uma olhada na documentação nós temos: "one to one", "one to many", "many to many", "has one throught", "has many throught", "One to One (polymorphic)", "one to many (polymorphic)", "many to many (polymorphic)" são os relacionamentos.

1. **One To Many (Um para Muitos)**: Uma série possui várias temporadas (implementado na aula).
2. **Belongs To (Pertence a)**: O inverso de "One To Many". Uma temporada pertence a uma série, um episódio pertence a uma temporada.
3. **One To One (Um para Um)**: Um usuário possui um endereço.
4. **Many To Many (Muitos para Muitos)**: Um aluno pode fazer vários cursos, e um curso pode ter vários alunos matriculados. Requer uma tabela intermediária.
5. **Has One Through / Has Many Through**: Semelhantes aos seus parentes (One To One e One To Many), mas com uma tabela intermediária envolvida no relacionamento. Exemplo: Um mecânico trabalha em um carro, e o carro tem um dono; pode-se acessar o dono do carro através do mecânico.
6. **Relacionamentos Polimórficos**: Permitem que um relacionamento seja feito com mais de uma model. Por exemplo, um autor de blog e um post de blog podem ter imagens relacionadas.

Vamos no nosso código agora, e abrir a _migration_ de temporadas. O que uma temporada tem? Ela já tem o seu ID, ela tem os _timestamps_, quando a temporada foi criada. Agora, vou ter também algum inteiro para fazer o relacionamento com o ID da série. Só que o que acontece, quando eu tenho esse ID, como é o caso da minha série, esse ID cria uma coluna do tipo `bigIncrement`, e ele usa esse tipo `unsignedBigInteger`. O que isso quer dizer? É um tipo inteiro maior e só positivo.

Além disso, tenho a minha coluna de `series_id`, mas eu não tenho aquela minha chave estrangeira. Para eu criar a chave estrangeira de fato, eu posso utilizar o método `foreign`. Então, a minha `series_id` é uma chave estrangeira, que referencia a coluna ID na tabela, ou seja, `on(table: ‘series’)`:
```php
    public function up(): void
    {
        Schema::create('seasons', function (Blueprint $table) {
            
            $table->id();
            $table->foreign('series_id')->references('id')->on('series');
            $table->unsignedBigInteger('series_id');

            $table->unsignedTinyInteger('numero');
            $table->timestamps();
        });
    }
```

Mas isso é extremamente verboso, então para facilitar, o Laravel fornece outra sintaxe: 
```php
$table->foreignId('series')->constrained();
```

E o que isso faz? A parte até antes do **constrained( )**, cria o campo **UnsignedBIgInteger** com o nome de **series**, e o **contrained( )** faz o relacionamento, ele pega o nome do campo e referência uma coluna ID, a chave primária da tabela que estamos nos relacionando.

E um detalhe, eu vou voltar no nosso _controller_. Se ao invés da propriedade, ou seja, com essa sintaxe, eu acessar o método, quando atualizo, tenho o acesso ao relacionamento. E se eu tenho acesso ao relacionamento, consigo modificar a _query_. Recapitulando essa parte de relacionamento, se acessar como se fosse uma propriedade, eu acesso a coleção, já pego as temporadas. Se eu acessar através do método tenho o relacionamento, o _query builder_, ou seja, uma possibilidade de filtrar isso, para depois pegar a coleção.

## Mais sobre Models

 Aprendi como tornar a ordenação por nome padrão ao buscar séries, utilizando um escopo global no _model_ `Serie`. Isso garante que, sempre que você buscar as séries, elas virão ordenadas alfabeticamente, sem precisar especificar a ordenação no _controller_:

```php
protected static function booted(){
	self::addGlobalScope('ordered', function(Builder $queryBuilder){
		$queryBuilder->orderBy('nome');
	});
}
```

Além disso, você também aprendeu como carregar automaticamente os relacionamentos de temporadas junto com as séries, utilizando o atributo `$with` no _model_ ```protected $with = ['temporadas'];```. Isso é útil quando você precisa acessar as temporadas com frequência, evitando consultas adicionais ao banco de dados:

```php
$series = Serie::with('temporadas')
	->get();
```

