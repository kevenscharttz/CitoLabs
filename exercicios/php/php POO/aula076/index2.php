<?php 
/*Como vamos usar a classe que criamos no script anterior? */

//1. Vamos importar a classe;

require_once('index1.php');
use classes_principais\Matematica;
//2. Para podermos instanciar a classe do script index_1.php, temos que ter em atenção o seu namespace

$matematica = new Matematica();

$matematica = new classes_principais\Matematica();
echo $matematica->adicionar(10, 20);

//vamos ver então o que os namespaces permitem fazer
?>