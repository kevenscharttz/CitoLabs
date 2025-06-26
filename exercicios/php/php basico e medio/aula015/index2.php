<?php
$cliente = [
    'nome' => 'Keven Willians Scharttz de Melo',
    'apelido' => 'Flá flá',
    'idade' => '21',
    'email' => 'kevenscha@gmail.com'
];

//apresentar um valor de um array associativo
echo $cliente['apelido'];

//verificar se determinada chave existe no array
var_dump(key_exists('idade', $cliente));

//array para string, dividindo-os
$resultado = implode(", ", $cliente);
var_dump($resultado);

//criar um novo array a partir de uma porção de outro array
$nomes = ["Keven", "Pelé", "Rodrigo Faro", "Cezar"];
$nomes_parte = array_slice($nomes, 2);

echo "<pre>";
print_r($nomes);
echo "</pre>";


echo "<pre>";
print_r($nomes_parte);
echo "</pre>";
