<?php 
    /*
    Ao herdar de uma classe abstrata, o método da classe filha
    deve ser definido com o mesmo nome, e um aceess modifier com restrição igual ou menor.

    Por exemplo, se o método abstrato for definido como protected, o método da classe filha
    deve ser definido como protected ou public. Não pode ser privado.

    Além disso, o tipo e o número de argumentos exigidos devem ser os mesmos. No entanto, as classes filhas podem ter argumentos opcionais.

    Assim, quando uma classe filha é herdada de uma classe abstrata, temos as seguintes regras:

    > o método da classe filha deve ser definido com o mesmo nome;
    > o método da classe filha deve ser definido com o mesmo access moddifier ou outro menos restrito;
    > o número de argumentos necessários deve ser o mesmo. No entanto, a classe filha
    pode ter argumentos opcionais adicionais
    */

    abstract class Pessoa {
        abstract public function falar($mensagem);
    }

    class Cliente extends Pessoa {
        public function falar($mensagem, $autor = 'joao'){
            echo "$mensagem - $autor";
        }
    }

    $cliente = new Cliente();
    $cliente->falar('djskdsfds');

    //IMPORTANTE: a assinatura do método em Cliente, tem que ser igual à assinatura do método na classe abstrata. Contudo, ao adicionar um parametro opcional, podemos passar informação adicional para o interior da função.
?>