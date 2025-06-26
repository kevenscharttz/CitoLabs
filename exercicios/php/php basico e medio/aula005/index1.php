<?php
    //--------------------------- DEFININDO CONSTANTES -------------------------
    define ("TAXA","0.1");
    define ("APRESENTAR_DADOS",false);

    echo TAXA." ";

    $salario = 1500;
    $salarioBonus = $salario + ($salario * TAXA);
    echo $salarioBonus;

    //TAXA = 100;
?>