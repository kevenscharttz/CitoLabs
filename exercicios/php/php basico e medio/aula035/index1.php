<?php 
    // PARÂMETROS DE UMA FUNÇÃO

    /*
    Podemos passar valores (argumentos) para o interior de uma função se essa função aceitar parâmetros.

    Parâmetros são variáveis indicadas dentro do parêntisis da função e que vão estar disponiveis para serem usadasdentro da função.

    Argumentos são os valores que passamos para o interior dessa função. Vejamos um exemplo simples.
    */

    function adicionar ($a, $b) {
        return $a + $b;
    }

    echo adicionar(100, 50);

    /* 
    Adicionar - nome da função
    $a e $b são parâmetros da função. Os parâmetros são separados por vírgulas. Ao chamar a função, o vlor 100 e o valor 50 são designados por argumentos. O 100 irá ser atribuído ao parâmetro $a e o 50 ao parâmetro $b da função
    */
?>