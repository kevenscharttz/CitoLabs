<?php 
    // PARÂMETROS DE UMA FUNÇÃO

    /*
    O PHP 8 veio introduzie a possibilidade de alterar a ordem dos argumentos quando chamamos uma função.

    É um conceito designado por named arguments
    */

    function apresentar($a, $b, $c = 100) {
        return "$a | $b | $c";
    }

    echo apresentar(10, 20) . "<br>";
    echo apresentar(10, 20, 30) . "<br>";
    echo apresentar(a: 1, b: 2, c: 3) . "<br>";

    //Se quisermos misturar conceitos, os valores não nomeados devem vir sempre primeiro.

    echo apresentar(10, c: 1, b: 1000);
?>