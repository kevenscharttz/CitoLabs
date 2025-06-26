<?php 
    // CICLO FOR

    /* 
        É uma das estruturas de ciclo mais usadas.
        Permite executar blocos de código enquanto uma condição for verdadeira

        Ao contrário do ciclo WHILE e o DO WHILE, o ciclo FOR já inclui lógica para atualizar o valor da condição

        A sintaxe é a seguinte:
        for (inicialização; condição; incremento ou decremento) {
            // bloco de código
        }
        A inicialização é executada apenas uma vez, antes do bloco de código ser executado.
        A condição é avaliada antes de cada execução do bloco de código, e o incremento/decremento é executado após cada execução do bloco de código.
        tudo isso é dividido por ponto e vírgula.
    */

    for ($indice = 1; $indice <= 10; $indice++) {
        echo "Índice: $indice <br>";
    }

    echo "<hr>";

    // Podemos também incluir dentro do for uma impressão de um valor, como por exemplo o valor do índice, porém separado por uma virgula, e não ponto e virgula 
    for ($i = 1; $i <= 10; print $i, $i++) {}
    echo "<br>";
    echo "<hr>";

    // Podemos também usar o ciclo for para fazer uma iteração pelos dados de um array, da seguinte forma:

    $nomes = ["Lucas", "João", "Maria", "José", "Ana"];
    for ($i = 0; $i < count($nomes); $i++) {
        echo "Nome: $nomes[$i] <br>";
    }

    // Podemos também iterar uma string
    $mensagem = "Skibiri TOilet";
    for ($i = 0; $i < strlen($mensagem); $i++) {
        echo "Letra: $mensagem[$i] <br>";
    }

    //IMPORTANTE: Sobre questões de performance, se usarmos uma função na expressão de acaliação da condição podemos comfpometer a performance, no cao. Então:

    $valores = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    // em vez de 
    echo "<hr>";
    for ($i = 0; $i < count($valores); $i++) {
        echo "Valor: $valores[$i] <br>";
    }
    echo "<hr>";
    //Podemos escrever: 

    for ($i = 0, $totalValores = count($valores); $i < $totalValores; $i++){
        echo "Valor: $valores[$i] <br>";
    }
?>