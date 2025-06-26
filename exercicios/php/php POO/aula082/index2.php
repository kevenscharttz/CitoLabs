<?php 
// COMO CHAMAR O CONSTRUTOR DE UMA CLASSE PAI

/* 
    Vejamos o cenário, há uma classe de onde deriva outra classe
*/

class Humano {
    public $nome;
    public $perfil;
    public function __construct($nome){
        $this->nome = $nome;
    }
}

class Funcionario extends Humano {
    function __construct($perfil)
    {
        parent::__construct($perfil);
        $this->perfil = 'Administrador';
    }
}

$funcionario = new Funcionario('joao');
echo $funcionario->nome;
echo '<br>';
echo $funcionario->perfil;

?>