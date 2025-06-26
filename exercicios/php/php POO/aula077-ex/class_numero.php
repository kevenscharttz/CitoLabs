<?php 
class Numero {
    private $numero;
    
    public function __construct($numero)
    {
        $this->numero = $numero;
    }

    public function get_numero()
    {
        return $this->numero;
    }

    public function par_ou_impar(){
        return $this->numero % 2 === 0 ? 'O número é par!' : 'O número é ímpar!';
    }

    public function tabuada(){
        $tabuada = [];
        for ($i = 1; $i <= 10; $i++){
            $tabuada[] = "{$this->numero} x $i = " . ($this->numero * $i);
        }
        return $tabuada;
    }

    public function raiz_quadrada() {
        return number_format(sqrt($this->numero), 2, ',', '.');
    }
}
?>