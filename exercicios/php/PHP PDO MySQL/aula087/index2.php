<?php

     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     error_reporting(E_ALL);
     
    // CONECTAR VIA PDO E CONTROLE DE ERROS

    /*
    Vamos colocar propositalmente um erro nas configurações, devemos ter sempre em conta a possibilidade de ter erros na execução.

    Definir as propriedades da ligação
    */
    $database = 'udemy_loja_onlineeee';
    $username = 'user_loja_web';
    $password = '123456789Lu';

    // efetuar a ligação
    $conexao = new PDO ("mysql:host=127.0.0.1;dbname=$database", $username, $password);

    echo $estado = $conexao->getAttribute(PDO::ATTR_CONNECTION_STATUS);

    $conexao = null;
?>