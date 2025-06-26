<?php
    // RETURN

    /*
    A instrução 'return' quando usada no interior de uma função, permite devolver um resultado de execução do código dessa função
    */

    function mensagem (){
        return "Está é uma mensagem usando o return";
    }


    //Se a função for apenas chamada, não acontecerá nada
    mensagem();

    //Podemos então atribuir o valor de retorno, por exemplo a uma variável
    $texto = mensagem();

    echo $texto;
    echo "<hr>";
    //----------------------------------

    //Podemos executar qualquer tipo de operação dentro de uma função e devolver seu resultado

    function construir_resultado() {
        $valor1 = 10;
        $valor2 = 20;

        return $valor1 * $valor2;
    }

    $resultado = construir_resultado();
    echo $resultado;
    echo "<hr>";

    // Nesse contexto, o ideal será passar os valores para dentro da função e usar esses valores para devolver resultados.
    // Vamos falar sobre PARÂMETROS de uma função
?>