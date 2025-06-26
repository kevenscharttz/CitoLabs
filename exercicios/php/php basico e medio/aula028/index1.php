<?php 
    // OPERADOR TERNÁRIO

    // O operador ternário é uma forma reduzida de escrever um if/else, basicamente
    // ele é uma forma de simplificar a escrita de condicionais, mas não é tão legível
    // e não é tão utilizado assim, mas é bom saber que existe

    $idade = 15;
    echo "Eu sou " . ($idade >= 18 ? "Maior de idade" : "Menor de idade");

    echo "<br>";

    $erro = true;
    echo 'Resultado: ' . ($erro ? "Aconteceu um erro" : "Sucesso");
?>