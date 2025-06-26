<?php 
/* 
Vamos a um pequeno exercício prático onde vamos
implementar várias matérias estudadas até ao momento.
Vamos guardar dentro de um ficheiro de texto
a tabuada dos 3 até á multiplicação por 1000.
3 x 1 = 3 ... 3 x 1000 = 3000
*/
    $pasta = __DIR__."/tabuada";
    $arquivo = $pasta."/"."tabuadaDo3.txt";

    if (!file_exists($pasta)){
        mkdir ($pasta);
    }

    for ($i = 0; $i <= 1000; $i++){
        file_put_contents($arquivo, "3 x $i = ".(3 * $i) . PHP_EOL,  FILE_APPEND);
    }
?>