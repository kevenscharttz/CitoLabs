<?php 
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        die ('Acesso inválido');
    }

    $username = isset($_POST['nome']) ? $_POST['nome'] : null;
    $password = isset($_POST['senha']) ? $_POST['senha'] : null;

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