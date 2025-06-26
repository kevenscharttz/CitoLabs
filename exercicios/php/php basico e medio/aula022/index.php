<?php 
    // OPERADORES DE INCREMENTO E DECREMENTO

    // Permite incrementar ou decrementar um valor em uma unidade, pode ser usado como pré-incremento ou pós-incremento.

    $x = 10;
    $y = 20;
    // Pré-incremento e pré-decremento
    echo ++$x; // 11
    echo --$y; // 19

    // Pós-incremento e pós-decremento
    echo $x++; // 11
    echo $y--; // 19
    // O valor de $x e $y agora é 12 e 18, respectivamente

    //Como funcionam os resultados

    $x = 100;

    echo $x; // 100
    echo '<br>';
    echo $x++; // vai mostrar o valor 100 e depois incrementar 1
    echo '<br>';
    echo $x--; // vai mostrar o valor 101 e depois decrementar 1
    echo '<br>';

    echo ++$x; // vai incrementar 1 e depois mostrar o valor 101
    echo '<br>';
    echo --$x; // vai decrementar 1 e depois mostrar o valor 100
?>  