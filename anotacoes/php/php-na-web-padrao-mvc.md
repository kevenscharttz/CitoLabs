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

O tipo de banco escolhido foi o **sqlite**, um banco que é gerado nos próprios arquivos do código. Onde nos passamos o local onde ele ficará, juntamente com seu nome, criamos um novo objeto do tipo **PDO** com esse caminho, e depois executamos um script **sql**:

``` php
<?php
	$dbPath = __DIR__ . '/banco.sqlite';
	$pdo = new PDO("sqlite:$dbPath");
	$pdo->exec('CREATE TABLE videos (id INTEGER PRIMARY KEY, url TEXT, title TEXT);');
?>
```

## Inserindo um vídeo

Para inserirmos um vídeo de fato no site via PHP, primeiro precisamos refinar o nosso arquivo **enviar-video.php**, na tag **form**, onde nós temos o nosso formulário, vamos passar dois parâmetros, um chamado **action** que serve para definir o local para onde estamos enviando nossos dados preenchidos no formulário, e o segundo é o **method**, onde definimos o método que estamos usando, sendo o **POST**, pois quando usamos o **GET**, estamos enviando os dados via URL, o que é menos seguro. Porém deixando claro que, no **POST** os dados também ficam visíveis, porém o método para visualizarmos é mais complicado: 

```php
<form class="container__formulario" action="./novo-video.php" method="post">
```