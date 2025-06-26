<?php 
// OBTER DADOS EM DIFERENTES FORMATOS 

/*
Já vimos que temos vindo a obter resultados em forma de array associativo. Vamo perceber o que isso significa.
*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

$resultados = $ligacao->query('SELECT * FROM produtos')->fetchAll(PDO::FETCH_ASSOC);

$ligacao = null;

/*
Quando chegamos a este ponto do script, a ligação já foi feita, já foi executada a query que foi buscar TODOS os dados da tabela produtos.

Vamos analisar o que foi guardado nos $resultados
*/

echo "<pre>";
print_r($resultados);

/*

[0] => Array
        (
            [id] => 1
            [0] => 1
            [produto] => Abacate
            [1] => Abacate
            [preco_unidade] => 12.55
            [2] => 12.55
        )

O primiro produto da coleção (assim como os restantes), vem em formato de aray que, simultaneamente, têm chaves númericas e chaves alfanméricas - um array associativo.

Não precisamos dessa repetição. Vamos dizer ao PDO, como queremos que os dados venham.

*/
?>