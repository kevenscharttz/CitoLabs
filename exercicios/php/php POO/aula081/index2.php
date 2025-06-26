<?php 
    class Usuario {
        public readonly string $usuario;
        public function __construct($u)
        {
            $this->usuario = $u;
        }

        public function alterar(){
            $this->usuario = 'DJFSFSDF';
        }
    }

$usuario = new Usuario('joão');
echo $usuario->usuario;

// Vamos agora tentar alterar o valor depois da variável
//no construtor

// Vamos primeiro chamar o método alterar()
// Fatal error: Uncaught Error: Cannot modify readonly property
$usuario->alterar();


//IMPORTANTE: as propriedades readonly podem ser public, private e protected mas têm sempre que ter um data typee
?>

