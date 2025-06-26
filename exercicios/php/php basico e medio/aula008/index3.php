<?php 
    // Podemos transformar variáveis fazendo um cast para inteiros

    $numero = "100";
    $teste = "25teste";
    $teste2 = "teste";
    $teste3 = false;
    $teste4 = true;

    $numero= (int) $numero;
    echo "<br>";
    echo (int) $teste;
    echo "<br>";
    echo (int) $teste2;
    echo "<br>";
    echo (int) $teste3;
    echo "<br>";
    echo (int) $teste4;
    echo "<br>";

    var_dump(is_int($numero));
?>