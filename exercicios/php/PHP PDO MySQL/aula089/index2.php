<?php 
/*

Em vez do método fetchAll sem qualquer parâmetro, podemos especificar de que forma queremos os dados.

NOTA: Esta parametrização também vale para o método fetch( ).

PDO::FETCH_BOTH - É a opção padrão. Retorna um array com chaves numéricas e alfanuméricas (associativas).

PDO::FETCH_NUM - Apenas o array com chaves numéticas com índice 0. É atribuida uma chave numérica a cada coluna.

PDO::FETCH_ASSOC - Apenas o array com chaves alfanuméricas (associativas). As chaves são os nomes das colunas da tabela.

PDO::FETCH_OBJ - Retorna os valores organizados num objeto anonimo em que cada elemento contém as propriedades com os nomes das colunas da tabela.

essas são as mais comuns, porém existem outras opções.

*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

$resultados = $ligacao->query('SELECT * FROM produtos')->fetchAll(PDO::FETCH_BOTH);

$ligacao = null;

echo "<pre>";
print_r($resultados);

?>