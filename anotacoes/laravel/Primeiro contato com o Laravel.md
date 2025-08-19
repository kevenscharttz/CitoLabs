
O que é o **Laravel**? É um framework do PHP, um framework é basicamente uma caixa de ferramentas que nos auxilia com determinadas coisas do nosso código. Ela foi criado por **Taylor Otwell** e lançada em junho de 2011, sendo um projeto **Open Source**, com atualizações constantes sistemáticas. Atualmente com uma grande equipe que contribui para o desenvolvimento do framework.

Ela serve para o desenvolvimento WEB, sendo baseada no padrão **MVC**. Permite criar paginas web, aplicações básicas e complexas, APIs, etc. Contém um vasto conjunto de **packages** para acelerar o desenvolvimento: 

- utiliza o **Artisan** com CLI para agilizar operações;
- Recorre ao **Composer** para gerir dependências;
- Usa o Blade como template engine;
- Usa o **Eloquent ORM** para bases de dados.

O Laravel possui um ecossistema muito vasto, com uma comunidade muito ativa, com uma ótima documentação, isso tudo faz dela o framework PHP mais popular no mercado de trabalho.


## Entendendo o Ciclo de Vida de uma Requisição Web

Vamos entender o ciclo de vida de um **request** e o que é uma **response**. Vamos imaginar que quero acessar alguma aplicação web, vou ao navegador e pesquiso, nesse momento estou fazendo um **request** para a internet, a internet vai localizar o servidor web onde está a nossa pesquisa, a seguir esse servidor vai processar o pedido, o request, depois dependendo do que está sendo pedido, e como resultado desse processamento ele vai pegar um conjunto de scripts, executar todo o código dos scripts, ele pode recorrer a uma base de dados, ir a uma API buscar mais informações, e gerará uma resposta normalmente utilizando HTML, CSS, JavaScript, imagens etc. Que nós consideramos como sendo arquivos mais ou menos estáticos, isto é, o PHP vai construir uma resposta, vai preparar uma resposta do lado do servidor que tradicionalmente vem nas linguagens ou nas tecnologias que o browser consegue interpretar.

O browser só consegue interpretar o que é o HTML, o que é código CSS, o que é o JavaScript, o que é a visualização de uma imagem, Ver um vídeo ou ouvir um som? O browser não consegue interpretar PHP, então essa é a responsabilidade que acontece do lado do servidor de internet. Então o servidor prepara com o PHP a resposta e esta resposta depois vai ser entregue ao nosso browser. É aquilo que nós chamamos de response response.

## Como Funciona o Padrão MVC

O padrão MVC é constituído de **MODEL**, **VIEW** e **CONTROLLER**. 

- MODELS - São scripts PHP responsáveis pela camada de dados. São classes de PHP especificas para fazer as comunicações com a base de dados;

- VIEWS - São scripts PHP responsáveis pela camada de visualização da informação. É a parte que será apresentada no browser.

- CONTROLLERS - São scripts PHP responsáveis pelas regras de negócio entre views e models, ou seja, quando é feito um request, essa requisição chegará em um controller, que também é uma classe do PHP. Ele vai receber o pedido, verifica-ló o que espera de resposta, vai executar as operações necessárias e depois apresentar uma view para apresentar as informações.

## Vamos Criar o Nosso Primeiro Projeto Laravel

Para a instalação do novo primeiro projeto **Laravel**, temos algumas formas de fazer isso, mas a que optaremos será através do **Composer**, com o comando: ```composer global require laravel/installer```.

## Testando o Projeto Laravel com o Servidor de Desenvolvimento

No nosso projeto, um dos elementos desse projeto é o **Artisan**, ele é basicamente um tipo de operário do nosso framework, para executar um conjunto de operações, ele é o **CLI**, o **Command Line Interface** é uma linha de comandos através do qual podemos dar instruções para a criação de um controlador, criação de models, listagem de rotas, criação de migrations, etc.

Seu comando base para utilização é, começar com o PHP, incluir o **artisan** e em seguida o comando que eu desejar ```php artisan```. E caso enviemos apenas isso, será retornado uma lista com os comandos que podemos usar. Caso usemos o comando **serve**, dessa forma: ```php artisan serve```, vamos executar um servidor local no **ip** e **porta** padrões do framework.

## Laravel Installer

O comando de criação de um projeto Laravel feito através do Composer é totalmente funcional e não há nenhum problema nisso, mas se vamos criar muitas aplicações Laravel, é melhor seguirmos a seguinte filosofia: 

```
composer global require laravel/installer
```

Com esse comando executado ocorrerá algumas instalações de dependências, para criarmos um novo projeto laravel podemos usar apenas esse comando:

```
laravel new [nome do programa]
```

Ao criar o projeto dessa forma, ocorrerá um tipo de formulário de configurações que podemos escolher para o projeto, ao invés dele apenas ser criado, a primeira pergunta é se gostaríamos de instalar um **starter kit**, que se trata de um conjunto de peças e ferramentas adicionais para a evolução do nosso projeto. Depois nos é perguntado que tipo de framework de teste nos preferimos, e depois se gostaríamos de iniciar um repositório git. Enfim, com tudo isso respondido, é iniciado a instalação dos arquivos.

Depois podemos escolher o tipo de banco de dados podemos usar.

## Estruturas de Pastas do Laravel

Precisamos entender como funciona e se organizam as pastas presentes no nosso projeto Laravel, mesmo que forma breve:

### Pasta App
A pasta **App** possui outras 3 pastas, cada uma chamada respectivamente Http, Models e Providers. Já nessas primeiras pastas podemos ver o uso do padrão **MVC**, com a pasta de **Controllers** dentro da pasta **Http**, que por padrão já vem com um controller, e também a pasta **Models**, com um model já criado automaticamente pelo Laravel. Já os **Providers** vai ter os providers do Laravel, que são responsáveis por registrar eventos, configurar serviços, middlewares... Quando por exemplo criarmos middlewares, que são pequenos partes de código que funcionam entre o Request e o Response, e teremos que criar uma pasta própria para esses elementos.

### Pasta Bootstrap
Tem o arquivo app.php, e é o arquivo que inicia o Laravel, nessa pasta também temos os providers.php onde temos várias informações que serão mais falados em outro momento. Também temos a pasta cache, onde o laravel guarda arquivos cache para melhorar a performance.

### Pasta Config
Nessa pasta temos um conjunto de scripts PHP associados a mecanismos de configuração, existem muitos então vou anotar apenas sobre alguns:

- **app.php**: É onde estão as informações principais da aplicação, vamos mexer as vezes para indicar uma outra configuração especifica para a aplicação.

- **auth.php**: É o arquivo responsável pelas configurações de autenticação da aplicação, muitas vezes não será necessário mexer nele, mas depende do tipo de aplicação que queremos fazer.

- **cache.php**: É o arquivo que oferece configurações de cache da aplicação.

- **database.php**: É onde temos as configurações de acesso e definição de ligações aos bancos de dados que vamos utilizar na aplicação.

- **filesystems.php**: É o arquivo de configurações do sistema de arquivos da aplicação.

- **logging.php**: Este serve para as configurações do sistema de registro de logs.

- **mail.php**: Serve para configurarmos o nosso endereço de e-mail.

- **queue.php**: Se trata de uma funcionalidade que está dentro do Laravel e que permite fazer a gestão de filas da aplicação.

### Pasta Database
Essa é uma pasta importante pois praticamente todas as aplicações que criaremos vão ter que acessar ao menos um banco de dados. Ela possui a pasta **Factory**, que dentro possui os arquivos que permitem criar dados fictícios para testar a aplicação. A outra pasta são as **Migrations**, que contem arquivos que permitem criar estruturas para o banco de dados, mas claro, podemos criar uma database completamente fora do Laravel e administrar suas tabelas, colunas, etc. Mas caso seja da vontade fazer isso através do código, coisa que será muito comum, podemos usar as migrations. Por fim temos a pasta **Seeders**, essa pasta vai conter os arquivos que permitem popular um banco de dados com dados fictícios, quando temos uma base de dados para testes, podemos usar as migrations para criar a estrutura e a base de dados e seeders para alimentar esse banco.

Podemos nos deparar também com um arquivo database do SQLite, e esse ficheiro é criado automaticamente pelo Laravel, e se trata de uma banco de dados do sistema de **Gestão de Bases de dados SQL** que o Laravel cria automaticamente para nós, mas isso não vem ao caso agora. Se eventualmente não quisermos fazer uma aplicação que não recorre a uma base de dados do tipo MySQL, MariaDB, etc, O SQLite poderá ser muito útil.

### Pasta Public
Essa pasta se trata do local onde ficam nossos arquivos públicos da aplicação, nela temos o arquivo **index.php**. Quando alguém coloca o endereço no browser para acessar nosso site, o primeiro arquivo que vai ser executado vai ser este, e depois disso ocorrerá todas as informações do nosso framework. E não podemos esquecer que estamos trabalhando no ecossistema do PHP, todos os pedidos passam sempre pelo index.php, então ele é a porta de entrada da nossa aplicação.

Também temos o arquivo **htaccess** que tem uma relação própria com o serviço **Apache**, que não importa muito por agora saber para o que ele serve, mas basicamente, ele permite fazer, dentre outras coisas, a criação de URL's que nós vamos ter a oportunidade de ver o que é que são.

Temos também o **robots.txt**, que é o ficheiro que diz aos motores de busca o que é que eles podem ou não indexar. Isso também não vem muito ao caso agora. Por fim o ultimo arquivo é o **favicon.ico**, que é o ícone que aparece nos separadores ou nas tabs dos nossos browsers.

### Pasta Resources
Essa pasta tem outras 3 pastas: **css**, **js** e a pasta **views**. Se notar, dentro de App temos os nossos controllers e Models, e as views, que são o componente visual estão aqui em resources. Dentro dessa pasta de views nós vamos encontrar um arquivo PHP um pouco diferente, o **Welcome.blade.php**. Mas afinal, para que serve essa pasta **Resources**? Ela contém as pastas onde vamos colocar nossos arquivos de estilo e scripts da aplicação, estes seres vão ser depois compilados pelo Laravel mais tarde, mas não é obrigatório que essa funcionalidade seja usada.

De fato a pasta mais importante aqui é a de views, onde teremos nossos arquivos de visualização da nossa aplicação, que vão construir as várias páginas e organização de layouts, views, components e etc. As views são os scripts que vão então gerar o HTML que vai ser visto no browser.

### Pasta Routes
Nessa pasta temos o arquivo **web.php** e o **console.php**. Dentro do web, o Laravel cria por padrão uma rota, as rotas são caminhos que nós definimos dentro da nossa aplicação, para que ela mostre os recursos que o usuário está pedindo. Então neste caso, quando definimos uma rota, estamos definindo um caminho para a aplicação, que pode ter dezenas ou centenas de caminhos, dependendo do grau de complexidade da aplicação.

Já o arquivo **console.php** é onde vamos definir rotas especificas. Se estivermos construindo uma aplicação executada num terminal, o que na maior parte dos casos não vai acontecer.

Pode aparecer também um arquivo de API, caso usemos o Laravel para a criação de uma API.

### Pasta Storage
Basicamente é uma pasta onde o Laravel armazena arquivos temporários. Dentro dela, a pasta mais importante neste momento é a pasta de logs, onde dentro dela podemos ter arquivos com registros de log da aplicação.

### Pasta Tests
A pasta de testes é uma pasta onde nós vamos colocar os testes da aplicação, existem teste unitários que são testes que permitem certificarmos de que nossa aplicação, quando chamada para determinadas funcionalidades, está funcionando corretamente como o previsto.

#### Pasta Vendor
É a pasta onde o composer guarda todas as dependências da aplicação, no nosso caso as do framework e de outros pacotes que nós possamos vir a adicionar.

## Estrutura de arquivos do Laravel

Além das pastas do Laravel, ele também contem alguns arquivos em sua raiz, e é disso que vou falar abaixo:

### .editorconfig
Esse arquivo nos permite definir as configurações do editor de código.

### .env
Esse é o arquivo de configurações da aplicação, é onde nós vamos definir variáveis de ambiente da nossa aplicação, mas com alguns critérios de segurança, depois veremos que esse arquivo tem uma grande importância particular

### .gitattribute e .gitignore
Estes são arquivos relacionados com o sistema GIt, eles permitem identificar aqui quais são as pastas ou arquivos que não devem ir para um repositório.

### Artisan
Basicamente, é o arquivo que o Laravel usa para executar comandos, dentre outras coisas que veremos ao decorrer do curso.

## composer.json e composer.lock
Esses são arquivos que estão relacionados ao composer, o json sendo onde há uma coleção de todas as dependências da nossa aplicação, enquanto o lock tem um detalhe muito mais alargado de tudo aquilo que foi instalado no framework.

### Package.json
É um arquivo relacionado com o NPM ou Node Package Manager e é usado para gerir as dependências da nossa aplicação no que diz respeito à área do JavaScript. Neste arquivo vamos ter também alguma relação com um sistema chamado Vite.

### phpunit.xml
É um arquivo do PHPUNit, que é um sistema para fazer testes unitários.
### README.md
Este é o arquivo que contém a documentação da aplicação, de uma forma genérica tem aqui uma apresentação sobre o próprio Laravel.
### vite.config.js
Por fim, este é um arquivo de configurações do Git, 

## O Ciclo de Vida de uma Requisição Web no Laravel

Agora que já temos uma noção da estrutura de um projeto Laravel e também já sabemos o que acontece, a grosso modo, com um request feito à web, vamos ver o que é que acontece no ciclo de vida de um request do Laravel.

### O que acontece no Laravel com um Request
Imagine um cenário em que temos um usuário que vai fazer um **request** para o Laravel, o primeiro passo é o arquivo public **index.php**. Basicamente o que vai ocorrer? Será carregado o **autoload** do composer e carregado todas as dependências que são necessárias e vai criar uma instancia da aplicação Laravel a partir do arquivo Bootstrap **app.php**. O Laravel cria uma instância da aplicação e registra todos os serviços necessários para o funcionamento da aplicação. Chamamos isso de **service container**. Todos estes processos acontecem sem que tenhamos que nos preocupar muito com eles, é o Laravel que faz tudo por ti.

Em seguida, o **request** vai para o **http kernel** ou então para o **console kernel**, dependendo do tipo de aplicação que está sendo desenvolvido. Como na maior parte dos casos vamos desenvolver aplicações web, vai ser o **http kernel**. Ora, todos os **requests** http são tratados pelo **http kernel**, enquanto os comandos de console são tratados pelo **console kernel**. Ora, estes **kernels** são responsáveis por receber o **request** e efetuar um conjunto de ações, por exemplo o tratamento de erros, abrir a sessão, verificar se é necessário executar middleware.

O objetivo é transformar uma **request** em uma **response**, um dos componentes principais de todo este processo são os **service providers**. Os **Service Providers** são serviços que providenciam um conjunto de funcionalidades que já estão criadas pelo próprio Laravel e com as quais não tens que preocupar na maior parte dos casos.

O passo seguinte é então o sistema de rotas, o roteamento no Laravel verifica qual é a rota correspondente ao **request**. Isto é, o pedido é feito para um determinado endereço e vai executar a ação correspondente podendo essa estar sujeita, por exemplo, à execução de um **middleware**. As rotas vão apontar para um **controller**. O **controller** é responsável por processar a requisição, preparar toda a informação e retornar uma resposta. Pode ser necessário interagir com o **model**, isto é, ir buscar informação a uma base de dados ou ir buscar a informação.

O que vai acontecer, no entanto, é depois a informação do **model** vai ser devolvida ao **controller**, que tradicionalmente vai construir uma **view**. Ora, tradicionalmente, numa aplicação web, o resultado é uma **view** que é renderizada e devolvida ao cliente através daquilo que nós conhecemos como a **response**.