<?php 

declare(strict_types=1);

// a função tabuada recebe um inteiro e devolve um array

function tabuada(int $a):array{
    $resultado = [];
    for ($i = 1; $i <= 10; $i++){
        $resultado[] = $i." x ".$a." = ".$i*$a;
    }
    return $resultado;
}

$resultados = tabuada(2);
foreach($resultados as $resultado){
    echo $resultado.'<br>';
}

?>