<?php 
// CONSTANTES DENTRO DE UMA CLASSE

/*
Por vezes podes ter necessidade de definir uma constante que é para ser usada apenas dentro da classe. Bom, na realidade, isto é possível, mas as constantes são, por natureza, públicas.

Vejamos como funcionam
*/

class Matematica {
    const VALOR_FIXO = 10;

    public function calcular($numero) {
        return $numero * SELF::VALOR_FIXO;
    }
}

$multiplica = new Matematica();
echo $multiplica->calcular(10).'<br>';
echo $multiplica::VALOR_FIXO;
?>