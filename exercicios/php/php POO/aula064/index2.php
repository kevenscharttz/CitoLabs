<?php 

// Agora vamos fazer uma pequena implementação

class Fruta {
    // propriedades
    public $nome;
}

//Criando dois objetos do tipo Fruta
$laranja = new Fruta();
$ananas = new Fruta();

//Definindo os valores de cada objeto
$laranja -> nome = "Laranja";
$ananas -> nome = "Ananás";

//Como apresentar as propriedades de um objeto?
echo $laranja -> nome;
echo '<br>';
echo $ananas -> nome;

//Cada objeto criado a partir da mesma classe, contém as suas propriedades
//de forma completamente independente

?>