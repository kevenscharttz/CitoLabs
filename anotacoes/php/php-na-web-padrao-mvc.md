## Papel do PHP na WEB

A WEB utiliza um protocolo HTTP, que funciona com clientes e servidores, no nosso caso, o nosso próprio navegador web é o cliente que faz uma requisição o servidor embutido do PHP, que está rodando na nossa máquina também.

A infraestrutura do servidor pode ser muito diferente de sistema para sistema. Existem cenários em que temos apenas o PHP, como o nosso caso, mas existem infraestruturas mais robustas com servidor web (como o Nginx, Apache ou Caddy), com servidor de aplicação (como PHP-FPM), com servidor de banco de dados (como MySQL ou PostgresSQL), com ambientes de cache, entre outros.

Portanto, nosso navegador faz um pedido para nosso servidor que está rodando o PHP. Por exemplo, ao acessar a página inicial do AluraPlay:

```
http://localhost:8080/index.html
```

O navegador (cliente) está fazendo um requisição para o servidor que está rodando em **localhost** na porta **8080**, pedindo um recurso ao acessar o caminho **index.html**.

O servidor embutido do PHP buscará um arquivo com o nome `index.html` e tentará interpretá-lo como um arquivo PHP. Todo conteúdo que não estiver entre as _tags_ do PHP, será interpretado como texto.

## Recapitulando


O navegador faz uma requisição (_request_) para o servidor, então o servidor executa uma lógica que configuramos e devolve uma resposta (_response_) para o cliente. Uma vez que o navegador consegue interpretar HTML, o resultado é uma página pronta. Ou seja, o PHP não está gerando um HTML. Ele está simplesmente interpretando o código PHP e devolvendo como texto tudo que não for PHP, independentemente do formato do arquivo. Como o navegador entende HTML, ele projeta essa interface na nossa tela.

## Criando um banco

O tipo de banco escolhido foi o **PostgreSQL**, um sistema de banco de dados **relacional** robusto que funciona em um servidor separado. Para utilizá-lo, informamos o **endereço** do servidor, a **porta**, o **nome do banco**, **usuário** e **senha** na criação do objeto **PDO**, e depois executamos um script **SQL** para criar as tabelas e manipular os dados:

```php
<?php

$host = 'localhost';
$port = '5432';
$dbname = 'aluraplay';

$user = 'postgres';
$password = '12345';

$pdo = new PDO("pgsql:host=$host; port=$port; dbname=$dbname", $user, $password);

$sql = "CREATE TABLE videos(id SERIAL PRIMARY KEY, url VARCHAR(100), title VARCHAR(50))";
$pdo->exec($sql);

?>
```

## Inserindo um vídeo

Para inserirmos um vídeo de fato no site via PHP, primeiro precisamos refinar o nosso arquivo **enviar-video.html**, na tag **form**, onde nós temos o nosso formulário, vamos passar dois parâmetros, um chamado **action** que serve para definir o local para onde estamos enviando nossos dados preenchidos no formulário, e o segundo é o **method**, onde definimos o método que estamos usando, sendo o **POST**, pois quando usamos o **GET**, estamos enviando os dados via URL, o que é pode ser considerado menos seguro e menos eficiente, pois existe um limite de caracteres em uma URL. Porém deixando claro que, no **POST** os dados também ficam visíveis, porém o método para visualizarmos é mais complicado: 

```php
<form class="container__formulario" action="./new-video.php" method="post">
```

Agora, por escolha antecipada minha, decidi criar uma classe separada para a **conexão com o banco de dados**, para evitar copiar e colar a conexão em **múltiplos arquivos**. Assim, sem a necessidade de repetir a ligação com o banco, criei o script **PHP _new-video_**, onde importei a conexão com o banco, armazenei os dados enviados pelo formulário em variáveis via método **POST**, defini uma variável com o comando **SQL** de inserção, preparei esse comando através do **statement**, fiz os respectivos **bindValue()** dos dados e, finalmente, executei o comando com **execute()**.

```php
<?php

require "./connection.php";

$url = $_POST['url'];
$title = $_POST['titulo'];

$sql = "INSERT INTO videos (url, title) VALUES (?, ?)";

$statement = $pdo->prepare($sql);

$statement->bindValue(1, $url);
$statement->bindValue(2, $title);

$statement->execute();
```

## Realizando a busca

Antes de mais nada, existe um problema no nosso código que é o fato do usuário atualizar a página, e o dado ser enviado mais uma vez para o banco, gerando duplicidade de dados. Como solução para desse problema bastante comum na web, usaremos o **padrão Post\Redirect\Get**.

### **Padrão Post\Redirect\Get**

Ao receber uma requisição com o verbo **POST**, após executar a ação, vamos redirecionar a pessoa usuária para outra página, utilizando o método **GET**. Dessa forma, ela poderá atualizar quantas vezes quiser e o comportamento não mudará.
Há um cabeçalho HTTP chamado **LOCATION**, quando o servidor o envia, o navegador sabe que deve redirecionar a pessoa. Como o **PHP** foi feito para web, esse processo também será bem simples - basta chamar a função **header( )**.

```php
<?php

require_once "./connection.php";

$title = $_POST['title'];
$url = $_POST['url'];

$sql = "INSERT INTO videos (url, title) VALUES (:url, :title)";

$statement = $pdo->prepare($sql);
$statement->bindValue(":url", $url);
$statement->bindValue(":title", $title);


if ($statement->execute() === false) {
    header('Location: ./index.php?sucesso=0');
    exit;
} else {
    header('Location: ./index.php?sucesso=1');
    exit;
}

```

## Realizando a exclusão

Para a exclusão dos dados, é necessário modificarmos o nosso form um pouco. No botão de excluir, vamos alterar o caminho de envio, para que seja enviado para o novo arquivo php de exclusão, com o id do vídeo na **URL**:

```php
<a href="./remove-video.php?id=<?= $video['id'] ?>">Excluir</a>
```

No remove-video podemos coletar o id que foi passado pelo método **GET**, criamos o comando **SQL** de exclusão e depois podemos começar a preparar esse comando, usando a função **ValueBind( )** para incluir o id no comando e depois executar:

```php
<?php 

require_once("./connection.php");

$id = $_GET['id'];
$sql = 'DELETE FROM videos WHERE id = :id';

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);

if ($statement->execute() === false) {
    header('Location: ./index.php?sucesso=0');
} else {
    header('Location: ./index.php?sucesso=1');
}
?>
```

## Filter_input ( )

Ao invés de acessar diretamente o POST, no **new_video**, agora iremos usar uma função chamada **filter_input**, ela traz um dado de um input, de algo que veio por uma requisicação, e logo em seguida será filtrado/validado por alguma regra:

```php
$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

if ('url' === false) {
    header('Location: /index.php?sucesso=0');
    exit;
}

$title = filter_input(INPUT_POST, 'title');
```
