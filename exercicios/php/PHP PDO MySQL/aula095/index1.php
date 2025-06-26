<?php 
/*
Esta foi a estrutura que usamos durante os primeiros vídeos desse módulo
*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';
$i = 1;
$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

$resultados = $ligacao->query("SELECT * FROM clientes LIMIT 20")->fetchAll(PDO::FETCH_OBJ);
$ligacao = null;

/*
Imagine que vai ter que conectar várias vezes à base de dados! Vamos melhorar o nosso código.
Vamos torná-lo mais modular. Vamos fazer ainda melhor: Vamos criar uma classe que pode ser
usada em qualquer projeto.

Queremos: 

- uma classe que possa ser usada em qualquer projeto;
- que permite efetuar todas as operações CRUD SQL;
- Que permita fazer queries básicas ou parametrizadas;
- Que permita configurar a ligação e a forma como os dados são devolvidos;
- Que controle os erros e nos devolva essa informação;
- Que nos possa devolver outras informações relevantes.

IMPORTANTE: Este exercicio é um bom ponto de partida para criares a tua própria classe.
Podes usar este código como ponto inicial. Vai ficar completamente funcional mas não deve
ser usado em produção!
*/
?>