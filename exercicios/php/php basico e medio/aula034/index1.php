<?php 

    // FUNÇÕES

    /* 
    Neste módulo vamo fazer uma introdução aos principais conceitos relacionados com funções em PHP.

    As funções são blocos de código reutilizáveis que apenas são executados quando são "chamados" pelo nosso código. O PHP contém um vasto conjunto de funções já disponíveis. Nós podemos criar as nossas próprias

    function nome_da_função(parâmetros) {
        # Código    
    }

    Uma função pode ter no seu interior qualquer tipo de código de PHP, inclusive outras funções.
    */

    // Definindo uma função

    function apresentar (){
        echo "Estou dentro de uma função de PHP";
    }

    echo "Estou fora de uma função";
    echo "<br>";
    // Chamando a função
    apresentar();
?>