<?php 
    // CONSTANTES MÁGICAS
    // -----------------------------------------
    // __ DIR __

    /*
    A pasta à qual pertence o script atual.
    Se usada dentro de um include, será devolvida a pasta do ficheiro que está a ser incluído.
    Tem o mesmo output que dirname(__FILE__).
    Não tem barra no final do valor, a não ser que estejamos na raiz.
    */

    echo '(index2.php): ' . __DIR__ . '<br>';

    include 'outros/script3.php';
    echo '<hr>';
    //------------------------------------------
    // __ FUNCTION __

    /*
    Nome da função onde o código está sendo executado
    */

    adicionar(10, 20);

    function adicionar ($a, $b) {
        echo $a + $b;
        echo '<br>';
        echo __FUNCTION__;
    }
?>