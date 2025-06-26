<?php 
    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        die ('Acesso inválido');
    }

    $username = isset($_GET['nome']) ? $_GET['nome'] : null;
    $password = isset($_GET['senha']) ? $_GET['senha'] : null;

    $user = [
        "nome" => 'joao',
        "senha" => 'aaa'
    ];

    if ($username == $user['nome'] || $password == $user['senha']) {
        echo "<h1>Login OK</h1>";
    } else {
        echo "<h1>Login inválido</h1>";
    }

    echo '<a href="./index1.php">Voltar</a>';
?>