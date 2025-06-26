<?php 
// DESTRUCTOR

/*
Tal como acontece com o __construct, existe um método especial que só vai ser executado quand um objeto é destruido ou o script termina a sua execução
*/

class Cliente {
    
    private $nome;
    function __construct($n) {
        $this->nome = $n;
        echo 'Foi criado um novo objeto com o nome: ' . $this->nome . '<br>';
    }

    function __destruct()
    {
        echo 'O objeto foi destruído. Tinha o seguinte nome ' . $this->nome . '<br>';
    }
}

// vAMOS CRIAR UM OBJETO A PARTIR DA CLASSE

$cliente = new Cliente('Carlos');

// Vamos executar um bloco de código.
for ($i = 0; $i <= 10; $i++){
    echo "Valor de i: $i<br>";
}

// agora vamos deliberadamente destruir o objeto
unset ($cliente);

echo "Fim do Script";

/*
IMPORTANTE: Estamos nesta fase inicial a conhecer os conceitos de forma simples: access modifiers, public, protect, private, o __construct e o __destruct.
esses conceitos serão explorados em vários exemplos ao longo do módulo e irei acrescentar mais informação e detalhe à importância e às consequências da sua utilização. 
*/
?>