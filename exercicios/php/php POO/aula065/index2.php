<?php 
// ACESS MODIFIERS

// Vejamos o que aocntece com os métodos

class Mulher {
    public $nome;
    public $apelido;
    public $corCabelo;

    public function metodo_01 () {
        echo 'Método I';
    }

    protected function metodo_02 () {
        echo 'Método II';
    }

    private function metodo_03 () {
        echo 'Método III';
    }
}

$femea = new Mulher();

echo $femea -> metodo_01(); // OK
echo $femea -> metodo_02(); // ERRO
echo $femea -> metodo_03(); // ERRO
?>