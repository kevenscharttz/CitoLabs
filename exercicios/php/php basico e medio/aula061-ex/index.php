<?php

    $numeros_positivos = [];
    $numeros_negativos = [];
    $textos = [];
    $textos_teste = [];

    $file = fopen('dados.dat', 'r');
    while (!feof($file)){ 
        $linha = trim(fgets($file));
        if (is_numeric($linha)){
            if ($linha > 0){
                array_push($numeros_positivos, $linha);
            } else if ($linha < 0) {
                array_push($numeros_negativos, $linha);
            }
        } else if (is_string($linha)){
            if (str_contains($linha, "TESTE")){
                array_push($textos_teste, $linha);
            }
            else {
                array_push($textos, $linha);
            }
        }
    }
    fclose ($file);
    
    //apresentação arrays
    echo '<pre>';
    print_r($numeros_positivos);
    echo '<hr>';
    print_r($numeros_negativos);
    echo '<hr>';
    print_r($textos);
    echo '<hr>';
    print_r($textos_teste);
    echo '<hr>';
    echo '</pre>'
?>