<?php 
    /*
    O PHP vai sempre tentar determinar o data type dos parâmetros e do return. POdemos reforçar o tipo de valores que vão ser retornados da seguinte forma:
    */

    function adicionar ($a, $b): int {
        return $a + $b;
    }

    echo var_dump(adicionar(10, 20));
    echo "<hr>";

    //Se for alterado o data type para string

        function multiplicar ($a, $b): string {
        return $a * $b;
    }

    echo var_dump(multiplicar(20, 30)); // Vai apresentar o resultado normalmente. Porquê?

    //Existe um mecanismo no PHP designado por strict types. Se esse mecanismo não estiver ativo, o PHP vai tentar sempre fazer a conversão implícita dos valores.
?>