<?php 
// COMO CHAMAR O CONSTRUTOR DE UMA CLASSE PAI

/* 
    Vejamos o cenário, há uma classe de onde deriva outra classe
*/

class Human {
    public $nome;
    public $perfil;
    public function __construct($nome){
        $this->nome = $nome;
    }
}

class Funcionario extends Humano {
    public function __construct()
    {
        $this->perfil = 'Administrador';
    }
}
?>