## Papel do PHP na WEB

A WEB utiliza um protocolo HTTP, que funciona com clientes e servidores, no nosso caso, o nosso próprio navegador web é o cliente que faz uma requisição o servidor embutido do PHP, que está rodando na nossa máquina também.

A infraestrutura do servidor pode ser muito diferente de sistema para sistema. Existem cenarios em que temos apenas o PHP, como o nosso caso, mas existem infraestruturas mais robustas com servidor web (como o Nginx, Apache ou Caddy), com servidor de aplicação (como PHP-FPM), com servidor de banco de dados (como MySQL ou PostgresSQL), com ambientes de cache, entre outros.

Portanto, nosso navegador faz um pedido para nosso servidor que está rodando o PHP. Por exemplo, ao acessar a página inicial do AluraPlay:

```
http://localhost:8080/index.html
```

O navegador (cliente) está fazendo um requisição para o servidor que está rodando em **localhost** na porta **8080**, pedindo um recurso ao acessar o caminho **index.html**.

O servidor embutido do PHP buscará um arquivo com o nome `index.html` e tentará interpretá-lo como um arquivo PHP. Todo conteúdo que não estiver entre as _tags_ do PHP, será interpretado como texto.

## Recapitulando


O navegador faz uma requisição (_request_) para o servidor, então o servidor executa uma lógica que configuramos e devolve uma resposta (_response_) para o cliente. Uma vez que o navegador consegue interpretar HTML, o resultado é uma página pronta. Ou seja, o PHP não está gerando um HTML. Ele está simplesmente interpretando o código PHP e devolvendo como texto tudo que não for PHP, independentemente do formato do arquivo. Como o navegador entende HTML, ele projeta essa interface na nossa tela.