<?php

// importar a class Database e configurações
use sys4soft\Database;
require_once('./Database.php');

$config = [
    'host' => '127.0.0.1',
    'database' => 'os_meus_clientes',
    'username' => 'user_meus_clientes',
    'password' => '123456789Lu'
];
// instanciação de objeto Database
$database = new Database($config);

// resultados
// // ver os dados
$results = $database->execute_query("SELECT * FROM clientes");

echo '<pre>';
$results = $results->results;
print_r($results);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PDO - Apresentar dados</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            padding: 20px;
        }
        .caixa-cliente{
            border: 1px solid gray;
            margin: 5px;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <h3>DADOS DOS MEUS CLIENTES</h3>
        <?php if(count($results) == 0):?>
            <p>Não há registros no banco</p>
        <?php else:?>
            <?php foreach($results as $result):?>
                <h3><?=$result->nome?></h3>
                <p>Email: <?=$result->email?></p>
                <p>Data de criação: <?=$result->created_at?></p>
            <?php endforeach;?>
        <?php endif;?>

        <h3>Total de registros</h3>
        <p><?=count($results)?></p>
</body>

</html>