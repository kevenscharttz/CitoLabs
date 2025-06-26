<?php 
/*
Vê como é simples controlar eventuais erros num processo de comunicação. Foi adicionado 
um beginTransaction() antes de iniciar as comunicações. Depois as comunicações.
No final, não existindo nenhum erro, surge o commit(). O commit() vai consolidar na base
de dados todas as comunicações definidas.

No caso de acontecer algum erro, como é o caso, as 3 primeiras inserções não vão ser
aplicadas, porque vai ser disparada a exceção e, dentro do bloco do catch, temos um
rollBack().

O rollBack() indica que tudo o que foi inserido com sucesso, dentro da transação, deve ficar retido.
*/

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

try {
    $ligacao->beginTransaction();
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Keven', 'aaaaaaa')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Pedro', 'bbbbbbb')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0, 'Marcelo', 'ccccccc')");
    // erro proposital
    $ligacao->exec("INSERT INTO users VALUES(0, 'Victor', 'aabbccd')");
    $ligacao->commit();
} catch (PDOException $err) {
    $ligacao->rollBack();
    echo 'Aconteceu um erro no SQL';
} finally {
    $resultados = $ligacao->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_OBJ);

    foreach ($resultados as $resultado){
        echo "<br>Nome: $resultado->username<br>";
    }
}
?>