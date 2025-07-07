<?php

$username = 'serenattoUser';
$password = '123456789Lu';

try {
    $dbConnection = new PDO ("mysql:host=localhost;dbname=serenatto", $username, $password);
} catch (PDOException $e) {
    echo "Falha ao tentar conectar no banco: " . $e->getMessage();
}

?>