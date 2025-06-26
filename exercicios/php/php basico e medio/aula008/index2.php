<?php 
    //Os valores podem ser definidos como hexadecimais, octais ou binários também

    $valor = 0x1A; // hexadecimal
    echo $valor."<br>";
    $valor2 = 012; // octal
    echo $valor2."<br>";
    $valor3 = 0b101010;  // binário
    echo $valor3."<br>";

    // Caso o valor seja maior que o limite do sistema, ele será convertido para float
    $valor4 = PHP_INT_MAX + 1;
    echo $valor4."<br>";
    var_dump($valor4);
?>