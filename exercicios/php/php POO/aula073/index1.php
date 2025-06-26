<?php 
// O QUE SÃO TRAITS E COMO UTILIZAR

/*
O PHP apenas suporta heranças únicas: uma classe só pode herdar de uma outra classe.

Imagina que quer que a classe seja derivada de outra e, ao mesmo tempo, possa "herdar" outras funcionalidades a partir de outras estruturas

É neste contexto que os traits surgem.

Basicamente, traits permitem declarar métodos que podem ser usados em múltiplas classes.
Na sua vertente mais avançada, os traits podem conter métodos abstratos que podem ser usados em múltiplas classes, e esses métodos podem ter qualquer tipo de access modifier

Vamos perceber o conceito através de exemplos simples.
*/

trait funcoes_matematicas {
    public function adicionar($a, $b) {
        return $a + $b;
    }

    public function subtrair($a, $b) {
        return $a - $b;
    }

    public function multiplicar($a, $b) {
        return $a * $b;
    }

    public function dividir($a, $b) {
        return $a / $b;
    }
}

class Matematica {
    use funcoes_matematicas;
}

$calculadora = new Matematica();
echo $calculadora->adicionar(100, 10);
echo '<br>';
echo $calculadora->subtrair(100, 10);
echo '<br>';
echo $calculadora->multiplicar(100, 10);
echo '<br>';
echo $calculadora->dividir(100, 10);
echo '<br>';    

/*
O que aconteceu aqui?
Como pode facilmente concluir pelo exemplo, foi possivel incoporar dentro da classe Matematica, um conjunto de funções pertencentes ao Trait
*/
?>