<?php 
    //INCLUDE E REQUIRE

    /*
    Tradicionalmente uma aplicação PHP pode conter dezenas de scripts que, combinados entre si permitem executar as operações desejadas.
    Até agora vimos scripts isolados.

    Podemos separar o código entre vparios scripts e, no momento da execução, "importar" o código para o interior da nossa aplicação.

    Existem 4 formas de executar essa tarefa:
        include
        include_once
        require
        require_once
    */
    //-----------------------------------------
    //INCLUDE

    include 'script.php';
    include 'outro.php'; // Não existe, aparecerá um aviso
    echo "<hr>";
    include 'script.php';

    /*
    Principal diferença entre o include e o require:
    include - Mostra aviso de o script não existe e permite continuar a execução.
    require - Mostra um erro se o script não existe e interrompe a execução.
    */        
?>