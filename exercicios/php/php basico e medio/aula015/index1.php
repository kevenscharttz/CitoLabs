<?php
//FUNÇÕES ASSOCIADAS A ARRAYS

//Existem dezenas de funções para arrays
//Array são um tipo de dado muiot importante para o PHP

//Vamos conhecer algumas funções de maior destaque

$nomes = ["Keven", "Marcos", "Paula", "Laura"];

//Para sabermos se uma variável é um array
$resultado = (is_array($nomes));

//Para sabermos quantos elementos tem um array
$resultado = (count($nomes));
echo $resultado;

//----------------------------------------
//Para adicionar valores no final do array
array_push($nomes, "Pedro", "Manuella");

//Para adicionar um valor no inicio do array
array_unshift($nomes, "Skibidi", "Toilet");

echo "<pre>";
print_r($nomes);
echo "</pre>";
//----------------------------------------

//Para removermos um valor do final de um array
array_pop($nomes);

//Para removermos um valor do começo de um array
array_shift($nomes);

//Para removermos um valor especifico pelo índice
unset($nomes[4]);

echo "<pre>";
print_r($nomes);
echo "</pre>";
