<?php 
    if (!file_exists("origem")){
        mkdir(__DIR__ . "/origem");
    }

    if (!file_exists("destino")){
        mkdir(__DIR__ . "/destino");
    }

    $caminho = __DIR__;
    
    file_put_contents($caminho.'/file_to_delete.nfo', '');

?>