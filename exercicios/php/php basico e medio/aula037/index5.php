<?php 
    /* Imagine o cenário onde tens um conjunto de dados consideravel e querer definir isso dentro de um script á parte. Também é possivel seguindo o seguinte exemplo: */

    $nomes = require_once('dados.php');

    echo "<pre>";
    print_r($nomes);
    echo "</pre>"
?>