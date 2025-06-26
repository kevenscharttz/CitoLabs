<?php 
    // Inteiros - int

    // São números inteiros, ou seja, não possuem casas decimais, positivos ou negativos.

    $valor1 = 10;
    $valor2 = 20;
    $valor3 = 20000000;
    $valor4 = -11245; 
    
    //EM sistemas de 32 bits, o valor máximo é 2147483647 e o mínimo -2147483648, em sistemas de 64 bits, o valor máximo é 9223372036854775807 e o mínimo -9223372036854775808.

    //Esses limites podem ser vistos usnado as constantes PHP_INT_MAX e PHP_INT_MIN.

    echo PHP_INT_MAX . '<br>';
    echo PHP_INT_MIN . '<br>';
?>