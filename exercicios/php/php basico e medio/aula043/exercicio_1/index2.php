<?php 
    //------------------------------------------
    //podemos criar e remover pastas
    //mkdir(__DIR__ . '/pasta_teste');

    //Se a pasta existir, vai aparecer um viso.
    //Devemos sempre assegurar se a pasta ou ficheiro existe.
    //Para isso podemos usar a função file_exists().
    //Funciona para ficheiros e pastas.

    if (!file_exists(__DIR__ . '/pasta_testes')){
        mkdir (__DIR__ . '/pasta_teste');
    }   
?>