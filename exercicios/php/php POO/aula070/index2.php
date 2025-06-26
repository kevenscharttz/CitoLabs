<?php 
    // A mesma regra vale para os métodos

    class Pessoa {
        public function falar() {
            echo "1";
        }

        final public function cochichar() {
            echo "2";
        }
    }

    class Novo extends Pessoa {
        public function falar()
        {
            echo '4';
        }

        /*
        public function cochichar(){
            echo '4';

            //fatal error: cannot override final method
        }
        */
    }
?>