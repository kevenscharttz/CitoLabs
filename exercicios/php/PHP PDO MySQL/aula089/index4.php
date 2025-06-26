<?php 
/*
Podemos acrescentar propriedades e métodos na classe e executar operações quando os dados são guardados.

Neste caso adicionei uma propriedade que não existe na base de dados. Preço por uma dúzia. Como sei o valos de cada unidade, o construtor vai multiplicar esse valor por doze
*/

class Produto {
    public $id;
    public $produto;
    public $preco_unidade;
    public $preco_duzia;

    public function __construct() {
        $this->preco_duzia = $this->preco_unidade * 12;
    }
}

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

$resultados = $ligacao->query('SELECT * FROM produtos')->fetchAll(PDO::FETCH_CLASS, 'Produto');

$ligacao = null;

echo "<pre>";
print_r($resultados);
?>