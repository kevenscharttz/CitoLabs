<?php 
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        die("Erro: Acesso inválido");
    }

    echo '<pre>';
    print_r($_POST);
?>