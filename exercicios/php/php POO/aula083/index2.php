<?php 
// CONSTANTES DENTRO DE UMA CLASSE

/*
A partir do PHP 7.1 passou a ser possível usar public, private e protected como accesse modifier das constantes
*/

class Matematica {
    private const VALOR_FIXO = 10;

    public function calcular($numero) {
        return $numero * SELF::VALOR_FIXO;
    }

    public function get_VALOR_FIXO(){
        return self::VALOR_FIXO;
    }
}

$multiplica = new Matematica();
echo $multiplica->calcular(10).'<br>';
echo $multiplica->get_VALOR_FIXO();
?>