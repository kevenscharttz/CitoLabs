<?php 
    // CICLOS 

    /* 
        Os ciclos permitem a repetição de blocos de código até que uma determinada condição interrompa a sua execução. São estruturas muito presentes em qualquer script de PHP
    */

    // ------------------------------
    // WHILE

    // Enquanto a condição for verdadeiro, o código é repetido

    $valor = 1;
    while ($valor <= 10) {
        echo "O valor é: $valor <br>";
        $valor++;
    }

    // Devemos ter cuidado com ciclos infinitoszo não alterar a variável de controle, o ciclo nunca vai parar.

    //outro exemplo

    echo "<hr>";
    $valor = 1;
    while ($valor <= 10) {
        echo "3 x $valor = " . $valor * 3 . "<br>";
        $valor++;
    }
?>