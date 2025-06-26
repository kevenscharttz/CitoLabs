<?php 
    /*
    Neste caso, a variável $nome terá duas versões:
    Uma global que existe ao longo do script, e outra local que é criada e terminada dentro do bloco da função
    */

    $nome = 'joao';

    function dados () {
    $nome = 'Keven'."<br>";
    }
    
    dados();
    echo $nome;
?>