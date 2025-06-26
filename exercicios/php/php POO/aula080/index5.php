<?php 
declare(strict_types=1);

class Pessoa {
    
    public String $nome;
    public String $apelido;
    public int $altura;
    
    public function falar(String $mensagem): String {
        return "O meu nome é {$this->nome} e a mensagem é: $mensagem";
    }
}

$pessoa = new Pessoa();
$pessoa->nome = "Keven Willians";
echo $pessoa->falar("HELL YEAH!");
?>