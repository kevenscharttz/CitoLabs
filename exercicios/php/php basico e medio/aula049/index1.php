<?php 
// CONSTANTES MÁGICAS

/*
Existem nove constantes mágicas no PHP. São designadas por constantes mágicas, porque o seu valor é definido dependendo do local onde estão a ser usadas. Por exemplo, o valor de __LINE__ depende da linha de código dentro do script onde a constante mágica está a ser usada. São constantes case-insensitive, e permitem solucionar vários desafios. Vamos ver como funcionam.
*/

// -----------------------------------------------
// __LINE__
// Indica a linha atual do códgio onde a constante se encontra
echo "Número da linha em index1.php: ".__LINE__."<hr>";

require_once('script1.php');

// ---------------------------------------------
//__FILE__
// O caminho completo do ficheiro, independentemente de envolverem symbolic links. Se for usada dentro de um include ou require, será indicado o nome do script que está a ser incluído.

echo '(index_1): ' . __FILE__ . '<hr>';

require('script2.php');
include('script2.php')
?>