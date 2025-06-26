<?php 
    //Podemos alterar o valor de um array usando o índice

    $nomes = ["Keven", "Pedro", "Marcelo"];
    $nomes[0] = "João";

    //Podemos ver o array com o var_dump
    var_dump($nomes);
    echo '<br>';

    //Ou de uma forma mais legível
    echo "<pre>";
    print_r($nomes);
    echo "</pre>";
?>