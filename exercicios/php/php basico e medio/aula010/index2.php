<?php 
    $valor = null;

    if (is_null($valor)) {
        echo "A variável é nula";
    } else {
        echo "A variável não é nula";
    }
    echo "<br>";

    //empty é a mesma coisa que dizer se está vazia
    if (empty($valor)) {
        echo "A variável está vazia";
    } else {
        echo "A variável não está vazia";
    }

?>