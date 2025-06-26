<?php 
    //Strings 
    //-------------------------------------------------
    //Uma string é um conjunto de caracteres, que podem ser letras, números, símbolos e espaços em branco.
    //As strings são delimitadas por aspas simples (' ') ou aspas duplas (" ").
    //As aspas simples são mais rápidas, pois não interpretam variáveis dentro da string.
    //As aspas duplas interpretam variáveis dentro da string, ou seja, se você colocar uma variável dentro de aspas duplas, o PHP vai interpretar o valor da variável.

    $nome = "Pedro";
    $apelido = 'Silva';

    $apresentacao = "Meu nome é $nome, mas pode me chamar de $apelido";
    echo $apresentacao . '<br>';

    //Concatenação de strings
    //------------------------------------------------

    $nomeCompleto = $nome . " " . $apelido;
    echo $nomeCompleto . '<br>';

    //Como obter a primeira letra do nome?
    //------------------------------------------------
    echo $nome[0] . '<br>';

    //Obter a terceira letra
    echo $nome[2] . '<br>';

    //Para obter a letra da direita para a esquerda, basta usar o índice negativo.
?>