<?php 
    // Como podemos adicionar e remover elementos de um array?
    // Podemos adicionar elementos a um array usando o índice
    // ou usando a função array_push() para adicionar elementos no final do array.

    $nomes = ["Keven", "Pedro", "Marcelo"];

    // Adicionar (push)
    $nomes[] = "João";

    //ou

    array_push($nomes, "Maria");
    array_push($nomes, "José");

    echo "<pre>";
    print_r ($nomes);
    echo "</pre>";

    // Remover (unset)

    unset($nomes[4]);
    echo "<pre>";
    print_r ($nomes);
    echo "</pre>";
?>