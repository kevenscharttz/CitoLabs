<?php 
// CRIAÇÃO DE CLASSES A PARTIR DE INTERFACES

/*
Em programação orientada a objetos, o conceito de INterfaces é semelhante ao de uma classe abstrata. Vamos ver as diferenças.

Interfaces permitem especificar métodos que as clases vão ter que implementar nas suas estruturas.

Quando várias classes têm que implementar um conjunto de métodos semelhantes, estamos a entrar num conceito muito importante da programação orientada a objetos que é o Polimorfismo.

Vejamos um exemplo de uma interface
*/

interface Animal {
    public function vocalizar($vezes);
    public function identificar();
    public function executarMovimento($direcao);
}

/* 
    Principais diferenças:

    > As interfaces não podem conter propriedades. As classes abstratas podem;

    > Todos os métodos das interfaces são public. Nas classes abstratas, são public ou protected;

    > Todos os métodos das interfaces são abstratos por natureza. Não podem ter implementação dentro da interface;

    > As classes podem implementar uma interface e herdar de outra classe ao mesmo tempo
*/

class Cao implements Animal {
    public function vocalizar($vezes){
        echo "Foi vocalizado $vezes";
    }
    public function identificar(){
        echo "Foi identificado";
    }
    public function executarMovimento($direcao){
        echo "Foi executado o movimento $direcao vezes";
    }
}

$cachorro = new Cao();

$cachorro->vocalizar(5);
echo '<br>';
$cachorro->identificar();
echo '<br>';
$cachorro->executarMovimento(324);
?>