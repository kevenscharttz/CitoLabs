<?php 
    //Assim como int, floar também tem limites, que dependem do sistema, 32bits ou 64 bits.

    echo PHP_FLOAT_MAX . '<br>';
    echo PHP_FLOAT_MIN . '<br>';

    // Quando o valor é muito grande para ser representado, ele é representado como infinito
    $valor = PHP_FLOAT_MAX * PHP_FLOAT_MAX;
    echo $valor . '<br>';
    var_dump($valor);
    echo '<br>';
    // Converter para float usando o casting

    $numero = "35.23";
    echo (float) $numero ."<br>";
    $numero2 = "35.23teste";
    echo (float) $numero2 ."<br>";
    $numero3 = "teste";
    echo (float) $numero3 ."<br>";
    $numero4 = false;
    echo (float) $numero4 ."<br>";
    $numero5 = true;
    echo (float) $numero5 ."<br>";
?>