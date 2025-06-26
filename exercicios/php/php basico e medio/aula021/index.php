<?php 
    // OPERADORES DE CONTROLE DE ERRO

    // Existem várias formas de contornar erros no PHP. Este operador, quando aplicado a uma expressão que vai gerar um erro, permite que esse erro seja ignorado

    //$ficheiro = file('teste123.txt');

    //Este código vai ferar um aviso. Se adicionarmos o operador de controle do erro, a mensagem do aviso vai desaparecer, sendo a instrução ignorada

    $ficheiro = @file('teste123.txt');
    echo 'fim';

    //Não é aconselhável isar este péradpr, excepto em situalçoes muito específicas, uma vez que a supressão da mensagem de erro pode impedir que escontremos um erro no nosso código.

?>