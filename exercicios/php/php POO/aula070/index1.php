<?php 
//IMPEDIR HERANÇA DE CLASSE OU MÉTODO

/*
Imagine que irá criar um bloco de código uqe vai ser usado por outro programador. Vai querer que a estrutura da sua classe contenha mecanismos que impessam determinado tipo de açoes. Por exemplo, pode querer que uma determinada classe nçao possa ser herdada por outro. Ou simplemente, um determinado método dessa classe não deverá poder ser sobreposto (override) por outro dentro da classe 'filha'

vejamos como alcançar esse resultado
*/


final class Classe_unica {

    // basta utilizar a palavra chave 'final' no começo, assim, essa classe não poderá ser herdada

}

class Nova extends Classe_unica {

    // Será gerado um fatal error, já que a classe Classe_unica não pode ser herdada

}
?>