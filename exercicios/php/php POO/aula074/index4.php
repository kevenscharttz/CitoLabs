<?php 
    /*
    Podemos ainda ter uma classe mãe, com um método estático, e numa classe filha chamar esse método usando a expressão PARENT
    */

    class Operacoes {
        protected static function operacao1(){
            return 'operacao1';
        }
    }

    class Matematica extends Operacoes {
        public function executar() {
            return parent::operacao1();
        }
    }

    $operacao = new Matematica();
    echo $operacao->executar();
?>