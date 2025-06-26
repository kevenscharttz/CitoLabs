<?php 

$database = 'udemy_loja_online';
$user = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $user, $password);

$resultados = $ligacao->query("SELECT * FROM produtos");

while ($linha = $resultados->fetch()){
    echo 'Produto: <strong>' . $linha['produto'] . '</strong><br>'; 
}

$ligacao = null;

// A query devolveu um conjunto de resultados. O ciclo while percorreu cada uma das linhas do resultado usando o método fetch( ). Em cada volta do ciclo, o método vai buscar o registro seguinte.
?>