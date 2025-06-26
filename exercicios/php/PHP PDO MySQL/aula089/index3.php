<?php 
/*
Por exemplo, podemos definir uma classe Produtos, cujas propriedades são as mesmas das colunas das tebelas. O resultado pode ser algo do tipo:
*/

class Produto {
    public $id;
    public $produto;
    public $preco_unidade;
}

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

$resultados = $ligacao->query('SELECT * FROM produtos')->fetchAll(PDO::FETCH_CLASS, 'Produto');

$ligacao = null;

echo "<pre>";
print_r($resultados);

/*
Repare que agora os resultados vêm em forma de Produto Object. O carregamento dos dados para a classe é feito com a instanciação implícita de um objeto. Sabemos que uma instanciação permite a execução automática do método __construct. 
Vejamos o prócimo exemplo.
*/
?>