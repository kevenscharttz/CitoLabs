<?php 
    // OPERADORES DE STRINGS

    // São operadores específicos para efetuar operações com strings. Estamos falando especificamente de operadores de concatenação

    $nome = "Keven";
    $nome = $nome . " Willians";
    $apresentacao = "Bom dia, ".$nome;

    // É possível também simplificar uma parte do códigoacima da seguinte forma

    $nome = "Keven";
    $nome .= " Willians";

    // Portanto...
    $cliente = "Marcos Ribeiro";
    $telefone = "99999999";
    $email = "marcos.ribeiro@gmail.com";

    $completo = $cliente . " - " . $telefone . " - " . $email;
    echo $completo;
?>