<?php 
    // SOBREPOSIÇÃO DE MÉTODOS HERDADOS

    /*
    O conceito de 'sobreposição' é uma tradução simples de um outro conceito mais conhecido como 'override'.
    Na prática significa que podemos ter uma classe 'Mãe' nde um deteminado método é definido e podemos alterar o seu código dentro de uma classe 'filha'.
    */

    class Pessoa {
        public $nome;

        public function __construct($nome)
        {
            $this->nome = $nome;
        }
        
        public function apresentar() {
            echo "O nome é {$this->nome}, e esste é o método mãe";
        }
    }

    class Anao extends Pessoa {
        
        // Sobrescrevendo o método da classe mãe
        public function apresentar()
        {
            echo "O nome é {$this->nome}, e este é o método filho";
        }
    }

    // Instanciando os dois objetos
    $mae = new Pessoa('Creuza');
    $filho = new Anao('Pedrinho Curador');


    // Apresentando o método normal e o sobreescrito
    $mae->apresentar();
    echo '<br><br>';
    $filho->apresentar();
    
?>