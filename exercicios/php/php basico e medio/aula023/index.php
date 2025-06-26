<?php 
    // OPERADORES LÓGICOS

    // Esses operadores servem para combinar várias condições na análise de valores. Podemos usá-los para criar um conjunto de condições mais complexas.

    //---------------------------------------

    // OPERADOR LÓGICO E (AND) - &&
    // Vai devolver true se todas as condições forem verdadeiras

    $x = true;
    $y = true;
    var_dump($x && $y); // true

    $x = 20;
    $y = 10;

    var_dump($x > 10 && $y < 20); // true
    var_dump($x > 10 && $y > 20); // false

    //----------------------------------------

    // OPERADOR LÓGICO OU (OR) - ||
    // Vai devolver true se pelo menos uma das condições for verdadeira

    $x = true;
    $y = false;
    var_dump($x || $y); // true

    var_dump(10 > 1 || 10 > 200); // true
    var_dump(2 < 1 || 3 < 2); // false

    //----------------------------------------
    // OPERADOR LÓGICO NÃO (NOT) - !
    // Inverte o valor lógico da condição

    $nome = 'Pedro';
    var_dump(!is_string('Pedro')); // true
?>