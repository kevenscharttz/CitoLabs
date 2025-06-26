<?php 
    //Funções para strings
    //-------------------------------------------------

    //Um aspecto importante nas strings: o PHP possui um vasto conjunto de funções para efetuar operações com strings.
    
    $frase = "Olá, meu nome é Keven. Estou aprendendo PHP. Estou gostando muito.";

    //Apresentar o número de caracteres da string
    echo strlen($frase) . '<br>';

    //Transformar todas as letras em maiúsculas
    echo strtoupper($frase) . '<br>';

    //Apresentar apenas parte da frase
    echo substr($frase, 0, 10) . '<br>';

    //Verificar se uma string existe dentro de outra
    echo str_contains($frase, "nome");
    
?>