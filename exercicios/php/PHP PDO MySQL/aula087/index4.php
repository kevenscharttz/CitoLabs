<?php 
/*
    Por padrão, o PDO vai emitir uma excepção sempre que acontece um erro.
*/

$database = 'udemy_loja_online';
$user = 'user_loja_web';
$password = '123456789Lu';

try {

    $ligacao = new PDO("mysql:host=127.0.0.1;dbname=$user", $user, $password);

    /*
    Define o modo comos os erros serão tratados neste caso, sendo o padrão, indica que o modo de erro é a apresentação de exceções
    */

    $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo $status = $ligacao->getAttribute(PDO::ATTR_CONNECTION_STATUS);

    $ligacao = null;

} catch (PDOException $err) {
    echo "<pre>";
    print_r($err);

    echo "<hr>";
    print_r($err->errorInfo);
}
?>