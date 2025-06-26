<?php 
    /* 
    Podemos criar um script que contém funções , importar esse script e chamar essas funções
    */


    echo adicionar(10, 10);
    echo "<hr>";
    echo subtrair(10, 10);
    echo "<hr>";
    echo multiplicar(10, 10);
    echo "<hr>";
    echo dividir(10, 10);

    require_once('functions.php');
?>