<?php 
/*
Pegando no exemplo anterior, a interface Animal declara a função vocalizar. Cada animal tem uma forma diferente de vocalizar. Então podemos ter o seguinte: 
*/

interface Animal {
    public function vocalizar();
}

class Cao implements Animal{
    public function vocalizar()
    {
        echo ("ladrar . . .");
    }
}

class Felino implements Animal{
    public function vocalizar()
    {
        echo ("Miar . . .");
    }
}

class Lobo implements Animal{
    public function vocalizar()
    {
        echo ("Uivar . . .");
    }
}

$cachorro = new Cao();
$cachorro->vocalizar();
echo '<br>';

$gato = new Felino();
$gato->vocalizar();
echo '<br>';

$lobo = new Lobo();
$lobo->vocalizar();
echo '<br>';

/*
Em forma de conclusão, enquanto as classes são modelos para a criação de objetos, as interfaces podem ser usadas como modelos para a criação de classes. FUncionam como um contrato no qual o programador, para implementar uma determinada classe, compromete-se a desenvolver essa classe a partir de uma interface, logo, mantendo a estrutura de métodos que essa interface declara, independentemente da implementação de código que esses métodos depois vão ter dentro da classe.

IMPORTANTE: Estes conceitos são centrais no âmbito da programação orientada a objeto, mais isso não quer dizer que tem que os aplicar em todos os seus projetos.
Aliás, na maior parte dos casos, estes conceitos são aplicados no desenvolvimento de frameworks que depois tu vai aproveitar para construir suas aplicações
*/
?>