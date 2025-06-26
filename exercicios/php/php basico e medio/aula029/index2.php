<?php 

    // DO WHILE

    //A diferenças para o ciclo WHILE é que, neste caso, o bloco é executado pelo menos uma vez, e só depois é avaliada a condição

    $valor = 11;
    
    do {
        echo "3 x $valor = ". $valor * 3 . "<br>";
        $valor++;
    } while ($valor <= 10);

    //Se o valor for 11, ainda assim, o bloco será executado uma vez, e só depois é avaliada a condição.
?>