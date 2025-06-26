<?php 
    // PARÂMETROS DE UMA FUNÇÃO

    /* 
    Podemos definir parâmetros opcionais dentro de uma função. São parâmetros que já têm um valor padrão atribuído. Se passarmos um argumento para esse parâmetro, o valor passado será usado.
    */

    function multiplicacao($a, $b = 5) {
        return $a * $b;
    }

    echo multiplicacao(100);
    echo "<hr>";
    echo multiplicacao(100, 3);

    // IMPORTANTE: Os parâmetros opcionasi devem sempre ser definidosdepois do parâmetros não opcionais.
?>