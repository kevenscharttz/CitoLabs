<?php 
    //SUPER GLOBAL $_GET

    /* 
    Com muita frequência vês na barra de endereções do navegador algo parecido com: 
    https://www.lojaonline.com/index.php?id=1&prd=25

    O endereço web que vês acima tem uma url:
    https://www.lojaonline.com/index.php

    Seguida de um sinal de interrogação que da início à query string, que é o conjunto de parâmetros que vamos poder captar dentro do nosso script.

    Cada parâmetro está definido por um nome e um vlaor. Nocaso da URL acima, temos um id=1

    Logo depois aparece um & que permite separar parâmetros de uma query string.
    Como conseguimos chegar a estes parâmetros.

    Logo depois aparece um & que permite separar parâmetros de uma query string. Como conseguimos chegar a ester parâmetros.

    Vamos ver a super global $_GET. É Um array onde são automaticamente colocados os parâmetros de uma quey string.
    */

    // vamos usar o endereço:
    // https://localhost/aula_061/index_1.php

    // Podemos verificar se existe algum parâmetro na query string

    if (!empty($_GET)){
        echo "Existem parâmetros na query string";
    } else {
        echo "Não existem parâmetros na quey string";
    }
?>