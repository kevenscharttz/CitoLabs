<?php 
    // FUNÇÕES ÚTEIS PARA VERIFICAÇÃO DE CLASSES

    /*
    Podes ter necessidade de verificar se uma determinada classe existe, ou se uma determinada classe tem um determinado método ou propriedade

    Vamos ver três funções do PHP que permitem executar estas operações
    */

    class Humano {
        public $nome;

        public function falar($mensagem){
            // ...
        }
    }

    class Pessoa {
        // ...
    }

    //verificar se uma classe existe
    echo class_exists('Pessoa') ? 'sim' : 'não';
    echo '<br>';

    //verificar se um método existe
    echo method_exists('Humano', 'falar') ? 'sim' : 'não';
    echo '<br>';

    //verificar se uma propriedade existe
    echo property_exists('Humano', 'nome') ? 'sim' : 'não';
    echo '<br>';
?>