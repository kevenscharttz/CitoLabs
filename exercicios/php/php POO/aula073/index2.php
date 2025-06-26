<?php 


trait movimentos {
    public function iniciar() {
        echo "Movimento iniciado";
    }

    public function saltar() {
        echo "Salto realizado";
    }

    public function parar() {
        echo "Movimento finalizado";
    }
}

trait movimentos_de_voo {
    public function levantar() {

    }
}

class SerVivo {
    private $nome;
    private $especie;
    private $peso;

    public function __construct($nome, $especie, $peso)
    {
        $this->nome = $nome;
        $this->especie = $especie;
        $this->peso = $peso;
    }
}

class Homem extends SerVivo {
    use movimentos;
}

class Leao extends SerVivo {
    use movimentos;
}

class Passaro extends SerVivo {
    use movimentos, movimentos_de_voo;
}

$homem = new Homem('Marcelo', 'Homo-Sapiens-Sapiens', 80);
$leao = new Leao('Leozinho', 'Panthera leo', 100);
$passaro = new Passaro('Águia', 'Accipitridae', 30);

$passaro->iniciar();
echo '<br>';
$passro->levantar();
?>