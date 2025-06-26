<?php 
    //OPERADORES

    //Um operador é algo que recebe um ou mais valores (expressões) e que devolve outro valor

    //OPERADORES MATEMATICOS

    $x = 10;
    $y = 5;
    echo "<pre>";
    var_dump($x + $y); //soma
    var_dump($x - $y); //subtração
    var_dump($x * $y); //multiplicação
    var_dump($x / $y); //divisão
    var_dump($x % $y); //resto da divisão
    var_dump($x ** $y); //potenciação

    var_dump(-10);
    var_dump("10");
    var_dump(+"10"); //sinal de mais na frente do número faz com que ao invés de string, o PHP interprete como número

    //var_dump(10 / 0); //divisão por zero, é um erro.
    
    echo "</pre>";
?>