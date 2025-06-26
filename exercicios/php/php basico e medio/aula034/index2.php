<?php 
    apresentar();
    executar();

    function apresentar (){
        echo "função apresentar<br>";
    }

    function executar (){
        echo "função executar<br>";
    }
    //--------------------------------

    for ($i = 0; $i < 10; $i++){
        funcao_teste();
    }
    function funcao_teste () {
        echo "Executando teste<br>";
    }

    /*
    Os nomes das funções devem começar com letra mínuscula ou maiúscula, seguindo de letras, algarismos e underscores.

    Nos nomes das funções são case insensitive

    apresentar() é igual a APRESENTAR()

    Não podem existir duas funções com o mesmo nome dentro do namespace

    (será falado sobre em outro módulo)
    */
?>