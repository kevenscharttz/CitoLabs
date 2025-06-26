<?php 
    // OPERADORES DE COMPARAÇÃO

    // Operadores de comparação são um tipo de operador que permite comparar valores de expressões ou variáveis. O resultado dessas comparações são, tipicamente, valores boleanos. Uma comparação pode ser verdadeira (true) ou falsa (false)

    //-----------------------------
    // Verificar se valores são iguais
    var_dump(10 == 10); // true
    var_dump(10 == 20); // false
    var_dump('String' == 'string'); // false
    var_dump("joao ribeiro" == "joao "."ribeiro"); // true

    // Algo que pode acabar quebrando noss cabeça é o exemplo abaixo
    var_dump(10 == "10"); // true
    
    // Isso acontece porque o PHP tenta converter o valor da string para um número inteiro, e como 10 é igual a 10, o resultado é true
    // Para evitar isso, podemos usar o operador ===, que verifica se os valores são iguais e se os tipos são iguais

    var_dump(10 === "10"); // false

    var_dump(1 == true); // true
    var_dump(1 === true); // false

    //-----------------------------

    // Verificar se valores são diferentes
    var_dump(10 != 20); // true
    var_dump(10 != 10); // false
    var_dump(10 != "10"); // false

    var_dump(10 !== "10"); // true

    var_dump(20 <> 30); // true - é igual ao !=

    //-----------------------------

    var_dump(10 > 20); // false
    var_dump(10 < 20); // true
    var_dump(10 >= 20); // false
    var_dump(10 <= 20); // true

    //------------------------------
    // SpaceShip Operator
    // O operador spaceship é um operador de comparação que retorna -1, 0 ou 1, dependendo se o valor à esquerda é menor, igual ou maior que o valor à direita. Esse operador é útil para simplificar comparações em ordenações e outras operações.

    var_dump(10 <=> 20); // -1
    var_dump(20 <=> 10); // 1
    var_dump(10 <=> 10); // 0

    //------------------------------
    // Operador Ternário

    $valor = "joao";
    echo $valor == "joao" ? "O valor é igual a joao" : "O valor não é igual a joao";
    //------------------------------
    
    // Null Coalescing Operator
    $valor = null;
    $a = $valor ?? "Valor padrão"; // $a = "Valor padrão"

    $valor = 10;
    $a = $valor ?? "Valor padrão"; // $a = 10

?>