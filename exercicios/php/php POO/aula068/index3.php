<?php 
    class Cliente {

        protected $nome;
        protected $email;
    

        public function __construct($nome, $email)
        {
            $this->nome = $nome;
            $this->email = $email;
        }

        protected function apresentar () {
            echo "O email do cliente {$this->nome} é {$this->email}";
        }
    }

    $clientes = [
        new Cliente ('Keven', 'keven@gmail.com'),
        new Cliente ('Marcos', 'marcos@gmail.com'),
        new Cliente ('Pedro', 'pedro@gmail.com')
    ];

    //foreach ($clientes as $cliente){
    //    $cliente->apresentar();
    //}

    echo '<pre>';
    print_r($clientes);
    echo '</pre>';
?>