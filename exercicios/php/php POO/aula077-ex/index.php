<?php 
require_once('class_numero.php');

$numero1 = new Numero(5);
$numero2 = new Numero(7);
$numero3 = new Numero(16);
$numero4 = new Numero(123);
echo '<pre>';
echo $numero1->get_numero() . '<br>';
echo $numero1->par_ou_impar() . '<br>';
print_r($numero1->tabuada()) . '<br>';
echo $numero1->raiz_quadrada() . '<br>';

echo '<hr>';

echo $numero2->get_numero() . '<br>';
echo $numero2->par_ou_impar() . '<br>';
print_r($numero2->tabuada()) . '<br>';
echo $numero2->raiz_quadrada() . '<br>';


echo '<hr>';

echo $numero3->get_numero() . '<br>';
echo $numero3->par_ou_impar() . '<br>';
print_r($numero3->tabuada()) . '<br>';
echo $numero3->raiz_quadrada() . '<br>';

echo '<hr>';

echo $numero4->get_numero() . '<br>';
echo $numero4->par_ou_impar() . '<br>';
print_r($numero4->tabuada()) . '<br>';
echo $numero4->raiz_quadrada() . '<br>';
?>