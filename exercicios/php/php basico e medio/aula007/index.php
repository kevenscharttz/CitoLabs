<?php 
    //Boolean

    //Variáveis com dois valores possíveis: true ou false
    $apresentarNome = true;
    $apresentarIdade = false;

    //Os valores são case sensitive, ou seja, não importa se você escreve true ou True, o valor será o mesmo.
    $mostrar = TRUE;
    $numero = 10;
    //Usada majoritariamente para condições, como ciclos, loops e condicionais

    //podemos ainda determinar se uma variável é booleana ou não
    var_dump( is_bool($apresentarNome));
    var_dump( is_bool($numero));
?>