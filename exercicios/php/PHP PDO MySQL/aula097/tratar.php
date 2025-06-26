<?php 

use sys4soft\Database;

//importar a class DATABASE e configurações
require_once('Database.php');

$config = [
    'host' => '127.0.0.1',
    'database' => 'os_meus_clientes',
    'username' => 'user_meus_clientes',
    'password' => '123456789Lu'
];


//instanciação do objeto Database
$database = new Database($config);

//Parametros
$params =  [
    ':nome' => $_POST['text_nome'],
    ':email' => $_POST['text_email']
];

//inserir os dados do cliente

$results = $database->execute_non_query("INSERT INTO clientes(nome, email, created_at) VALUES(:nome, :email, NOW())", $params);

//voltar ao formulario
header('Location: formulario.php');

?>