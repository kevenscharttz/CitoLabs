<?php 
/*
Se usármos o método fetchAll ( )...
*/

$database = 'udemy_loja_online';
$user = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $user, $password);

$resultados = $ligacao->query("SELECT * FROM produtos")->fetchAll();

foreach ($resultados as $linha){
    echo "Produtos: <strong>" . $linha['produto']. "</strong><br>";
}

// A query devolve um conjunto de resultados. O ciclo foreache percorreu cada uma das linhas do resultado, presentando apenas o nome.
?>