<?php 

// CONTROLAR COMUNICAÇÕES COM TRANSAÇÕES

/*
A transação é um mecanismo processual de comunicação com a base de dados no qual podemos efetuar um conjunto de instruções SQL e, caso aconteça um erro, podemos "voltar atrás" nas execuções que foram efetuadas. No caso de haver sucesso, podemos finalizar essas comunicações todas

Vamos ver com um exemplo.
*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

try {
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Keven', 'aaaaaaa')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Pedro', 'bbbbbbb')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Marcelo', 'ccccccc')");

    // erro proposital
    $ligacao->exec("INSERT INTO users VALUES(0, 'Victor', 'aabbccd')");
} catch (PDOException $err) {
    echo 'Aconteceu um erro no SQL';
} finally {
    $resultados = $ligacao->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_OBJ);

    foreach ($resultados as $resultado){
        echo "<br>Nome: $resultado->username<br>";
    }
}
?>