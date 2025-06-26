<?php 
    //Array
    //-------------------------------------------------
    //É uma variável que funciona como um coleção de dados, ou seja, uma variável que pode armazenar vários valores.
    //Os arrays são delimitados por colchetes [ ] ou pela função array().

    $nome = "Keven";
    $nome2 = "Pedro";
    $nome3 = "Marcelo";

    $nomes = array($nome, $nome2, $nome3);
    //ou
    $nomes = [$nome, $nome2, $nome3];

    echo $nomes[0] . '<br>';
    echo $nomes[1] .'<br>';

    //Nos casos acima, os indices são colocados automaticamente, começando do 0.
    //Caso você queira colocar os indices manualmente, basta fazer assim:

    $nomes = [
        10 => $nome,
        20=> $nome2,
        30=> $nome3
    ];

    echo $nomes[10] . '<br>';
    echo $nomes[40] . '<br>';

    // Para verificar o aviso, podemos verificar se o item existe
    var_dump(isset($nomes[200]));
?>