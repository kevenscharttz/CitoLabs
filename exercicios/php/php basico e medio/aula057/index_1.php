<?php 
// A SIMPLES E COMPLEXA VALIDAÇÃO DE DADOS

/* 
Como vimos nos cídeos anteriores, a validação de formulários é de extrema importância para impedir problemas no fluxo do nosso código. No entanto, a validação de formulários não é o único processo em que é necessário validar dados.

Por exemplo, podemos estar carregando uma informação a partir de um arquivo de dados, ou de uma base de dados, e podemos ter a necessidade de analisar, por exemplo, se um email é válido, ou se uma determinada string é um valor numérico.

A validação de um determinado dado pode ser mais simples, usando as funções existentes no PHP para essa validação, ou com necessidade de recorrermos as expressões regulares.

Vejamos apenas alguns exemplos a titulo de curiosidade
*/

// Validar se um valor é uma string
$valor = 12;
$texto = "blá blá blá, blé blé blé";
var_dump(is_string($valor)); echo "<br>";
var_dump(is_string($texto)); echo '<hr>' ;

// Validar se é um valor númerico;
$valor1 = 1;
$valor2 = 1.5;
$valor3 = "69";
$valor4 = 'quarenta e dois';
$valor5 = true;

var_dump(is_numeric($valor1)); echo "<br>";
var_dump(is_numeric($valor2)); echo "<br>";
var_dump(is_numeric($valor3)); echo "<br>";
var_dump(is_numeric($valor5)); echo "<br>";
var_dump(is_numeric($valor4)); echo "<hr>";


//Validar se é um valor booleano
/*$var1 = true;
$var2 = "true";
$var3 = 1;
$var4 = 0;

var_dump(is_bool($var1)); echo "<br>";
var_dump(is_bool($var2)); echo "<br>";
var_dump(is_bool($var3)); echo "<br>";
var_dump(is_bool($var4)); echo "<hr>";*/

//Validar se uma variável está vazia

$var1;
$var2 = "";
$var3 = " ";
$var4 = 0;
$var5 = null;
$var6 = [];

var_dump(empty($var1)); echo "<br>";
var_dump(empty($var2)); echo "<br>";
var_dump(empty($var3)); echo "<br>";
var_dump(empty($var4)); echo "<br>";
var_dump(empty($var5)); echo "<br>";
var_dump(empty($var6)); echo "<hr>";
?>