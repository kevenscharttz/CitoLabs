<?php 
    //strings
    //-------------------------------------------------
    //Outras duas formas de definir strings, apesar de não usuais são: 

    //heredoc

    $texto = <<<TEXT
    Olá, meu nome é Keven.
    Estou aprendendo PHP.
    Estou gostando muito.
    TEXT;

    echo $texto . '<br>'; // as linhas vão aparecer sem quebras

    echo nl2br($texto) . '<br>'; // as linhas vão aparecer com quebras

    //Nowdoc

    $texto2 = <<<'TEXT2'
    Olá, meu nome é Keven.
    Estou aprendendo PHP.
    Estou gostando muito.
    TEXT2;
    echo $texto2 . '<br>'; // as linhas vão aparecer sem quebras

    echo nl2br($texto2) . '<br>';
?>