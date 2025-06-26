<?php 
    // CONSTRUTOR

    /*
    O construtor é um conceito da programação orientada a objetos que está relacionado com a existência de um método especial dentro da classe que vai ser executada automaticamente sempre que um novo objeto é criado a partir dessa classe.
    */

    class Mulher {
        private $nome;
        private $apelido;

        function __construct($nome, $apelido)
        {
            $this->nome = $nome;
            $this->apelido = $apelido;
        }

        function get_nome () {
            return $this->nome;
        }

        function get_apelido () {
            return $this->apelido;
        }

        function get_nome_completo () {
            return $this->nome.' '.$this->apelido;
        }
    }
    /*
    Quando vamos fazer a instanciação da classe num objeto,
    essa instanciação vai obrigar a que tenhamos que definir
    os argumentos que o método especial __construct no está a pedir
    */
    $m = new Mulher('Jessica', 'Pereira');
    echo $m->get_nome();
    echo '<br>';
    echo $m->get_apelido();
    echo '<br>';
    echo $m->get_nome_completo();
?>