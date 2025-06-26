<?php 
/*
Uma nota final sobre esta matéria. Existem outras formas de indicar ao PDO como deve devolver os resultados.
*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

$resultados = $ligacao->query('SELECT * FROM produtos');
$resultados->setFetchMode(PDO::FETCH_ASSOC);

$ligacao = null;

while ($linha = $resultados->fetch()) {
    echo "Produto: <strong>" . $linha['produto'] . "</strong> - " . "Preço: <strong>" . $linha['preco_unidade'] . "</strong><br>";
}
?>