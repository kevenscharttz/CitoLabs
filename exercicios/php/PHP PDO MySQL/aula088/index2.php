<?php 
    /* 
    Os métodos fetch() e fetchAll() diferem no seguinte aspecto: fetch() vai buscar o próximo elemento da coleção de dados. fetchAll() vai buscar todos de uma vez.

    Vejamos melgor a diferença abaixo:
    */

    //Configurações
    $database = 'udemy_loja_online';
    $user = 'user_loja_web';
    $password = '123456789Lu';

    //ligação
    $ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $user, $password);

    //utilização do fetch()
    $resultados = $ligacao->query('SELECT * FROM produtos')->fetch();
    echo '<pre>';
    print_r($resultados);

    //Com o fetch fomos apenas buscar o primeiro elemento da coleçao

    $ligacao = null;
?>