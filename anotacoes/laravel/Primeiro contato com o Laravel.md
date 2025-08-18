
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