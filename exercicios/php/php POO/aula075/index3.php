<?php
/*
* E tal como acontece com os métodos, as propriedades estáticas também podem ser acedidas a partir de classes derivadas usando a expressão PARENT 
*/

class Humano {
    public static $valor = "Valor principal";
}

class Homem extends Humano {
    public function executar() {
        return parent::$valor;
    }
}

$homem = new Homem();
echo $homem->executar();
?>