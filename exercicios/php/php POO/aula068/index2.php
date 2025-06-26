<?php 
    // Vejamos os conceitos num exemplo mais prático

    class Animal_de_estimação {
        protected $nome;
        protected $raca;
        protected $especie;

        function __construct($nome, $raca, $especie) {
            $this->nome = $nome;
            $this->raca = $raca;
            $this->especie = $especie;
        }

       
    }

    class Cao extends Animal_de_estimação {
        public function Latir ($vezes) {
            echo "O {$this->nome} latiu $vezes vezes<br>";
        }
    }

    class Felino extends Animal_de_estimação {
        public function Miar ($vezes) {
            echo "O {$this->nome} miou $vezes vezes";
        }
    }

    $cachorro = new Cao('Toby', 'Shitszu', 'canina');
    $gato = new Felino('Sr.Bola de Neve', 'Persa', 'Laranja');

    //Não só cada objeto tem as propriedades da classe base, como também tem as funcionalidades que cada classe implementa
    //Portanto:

    $cachorro->Latir(17);
    $gato->Miar(3);

    /*
        Observa que, na classe Animal_de_estimação, as propriedades foram definidas com o Acess Modifier PROTECTED.
        Já tinha referido que no caso do PROTECTED, a propriedade ou método pode ser acedida dentro da classe e dentro de classes derivadas dela.
    */

?>