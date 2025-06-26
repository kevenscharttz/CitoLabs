<?php 
    // Podemos também fazer chamadas de funções, apesar de ainda não termos visto isso

    $valor = 50;

    $resultado = match(true) {
        $valor > 100 => fn1(),
        $valor == 100 => fn2(),
        $valor < 100 => fn3()
    };

    echo $resultado;

    function fn1() {
        return "O valor é maior que 100";
    }

    function fn2() {
        return "O valor é igual a 100";
    }

    function fn3() {
        return "O valor é menor que 100";
    }
?>