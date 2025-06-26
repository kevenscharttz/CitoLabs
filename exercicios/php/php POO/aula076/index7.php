<?php 
require_once('index6.php');

use Estruturas_principais\Loja;
use Estruturas_principais\Armazem;

$loja = new Loja();
$armazem = new Armazem();

//Sempre que quiser criar novos objetos dentro deste script, já não tem a necessidade de fazer da seguinte forma:

$loja_1 = new Estruturas_principais\Loja();
$loja_2 = new Estruturas_principais\Loja();
$loja_3 = new Estruturas_principais\Loja();

//podemos simplesmente escrever

$loja_1 = new Loja();
$loja_2 = new Loja();
$loja_3 = new Loja();
?>