<?php 
    //INSTRUÇÃO CONDICIONAL

    // A instrução condicional é uma estrutura de controle que permite executar um bloco de código com base em uma condição específica.
    // Ela é amplamente utilizada em programação para tomar decisões e controlar o fluxo de execução do programa.

    $valor = 10;
    if ($valor === 10) {
        echo "OK!";
    }
    echo "<br>";
    // Caso a condição falhar (é falsa), o código do bloco não vai ser executado.
    // Podemos usar o else para criar uma alternativa

    $valor > 10;
    if ($valor === 10) {
        echo "O valor é maior que 10";
    } else {
        echo "O valor é menor ou igual a 10";
    }
    echo "<br>";
    // Podemos usar o else if para criar várias alternativas

    if ($valor > 100){
        echo "O valor é maior que 100";
    } elseif ($valor > 50) {
        echo "O valor é maior que 50";
    } elseif ($valor > 10) {
        echo "O valor é maior que 10";
    } else {
        echo "O valor é menor ou igual a 10";
    }
    
?>