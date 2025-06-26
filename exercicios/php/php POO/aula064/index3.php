<?php 
/*
As classes potem ter PROPRIEDADES e MÉTODOS

PROPRIEDADES são variáveis da classe
MÉTODOS são funções da classe

A palavra-chave $this refere-se ao objeto atual
e só está disponível dentro dos métodos (funções da classe)
*/

class Fruta {
    public $nome;
    public $cor;
    public $peso;

    // Criação de um método
    public function apresentar_fruto(){
        return "O nome da fruta é {$this->nome}, sua cor é {$this->cor} e pesa {$this->peso}";
    }
}

$banana = new Fruta();
$banana -> nome = 'Banana';
$banana -> cor = 'Amarelo';
$banana -> peso = '20g';

$maca = new Fruta();
$maca -> nome = 'Maca';
$maca -> cor = 'Vermelho';
$maca -> peso = '30g';

$melancia = new Fruta();
$melancia -> nome = 'Melancia';
$melancia -> cor = 'Verde';
$melancia -> peso = '300g';

echo $banana -> apresentar_fruto();
echo '<br>';
echo $maca -> apresentar_fruto();
echo '<br>';
echo $melancia -> apresentar_fruto();

?>