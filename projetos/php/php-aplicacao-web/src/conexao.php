<?php

$username = 'serenatto.user';
$password = '123456789Lu';
$database = 'serenatto';

try {
    $dbConnection = new PDO ("mysql:host=localhost;dbname=$database", $username, $password);
} catch (PDOException $e) {
    echo "Falha ao tentar conectar no banco: " . $e->getMessage();
}

echo "Banco conectado";
?>