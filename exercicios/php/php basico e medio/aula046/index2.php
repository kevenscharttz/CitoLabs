<?php 

/*
Em muitas circunstâncias será necessário um modo difernte de leitura dos dados. Ler uma linha de cada vez, por exemplo.
*/

$file = fopen("dados.txt", 'r');
while (!feof($file)){
    echo fgets($file) . '<br>';
}
fclose($file);

echo '<hr>'; //ou

$file = fopen("dados.txt", 'r');
while (($linha = fgets($file)) !== false){
    echo $linha . '<br>';
}
fclose($file);
?>