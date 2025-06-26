<?php 
    //Podemos também analisar múltiplas condições de comparação

    $valor = 100;

    $resultado = match(true) {
        $valor > 100 => "O valor é maior que 100",
        $valor == 100 => "O valor é igual a 100",
        $valor < 100 => "O valor é menor que 100"
    };

    echo $resultado;
?>