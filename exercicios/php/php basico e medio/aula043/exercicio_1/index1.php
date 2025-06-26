<pre>

<?php 
//listagem de ficheiros
echo __DIR__. '<br>';
$files = scandir(__DIR__); //constante mágica __DIR__
print_r($files);

/*
O . e o .. estão sempre presentes em cada pasta. São identificadores como a pasta atual (.) e a pasta anterior (..)
*/

echo '<hr>';

$files2 = scandir ('./'); // lista a pasta atual
print_r($files2);

echo '<hr>';

$files3 = scandir ('../'); // lista a pasta anterior
print_r($files3);

echo "<hr>";

// Podemos questionar se cada elemento encontrado é um ficheiro ou uma pasta

foreach($files as $item) {
    echo is_file($item) ? 'Ficheiro' : 'Pasta'; //is_dir () identifica se é pasta
    echo '<br>';
}

echo "<hr>";

//------------------------------------------
// Se quisermos mostrar apenas os ficheiros...
$files = scandir(__DIR__);
foreach($files as $item) {
    if (is_file($item)){
        echo $item . '<br>';
    }
}

?>
</pre>