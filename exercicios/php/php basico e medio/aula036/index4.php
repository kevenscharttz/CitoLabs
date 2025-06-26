<?php 
    /*
    É possível aceder dentro de uma função a variável global. Fazemos da seguinte forma:
    */

    $nome = 'joao';
    echo $nome."<br>";
    function dados() {
        global $nome;
        $nome = 'Keven';
    }

    dados();
    echo $nome;
?>