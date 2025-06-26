<?php

use sys4soft\Database;

define('MYSQL_CONFIG', [
    'host' => '127.0.0.1',
    'database' => 'bd_stock',
    'username' => 'root',
    'password' => '@cito2024',
]);

require_once('Database.php');

$db = new Database(MYSQL_CONFIG);

// SELECT
$results = $db->execute_query("SELECT * FROM stock limit 100");


// INSERT
$params = [
    ':produto' => 'produto cinco',
    ':quantidade' => 100
];
$results = $db->execute_non_query("INSERT INTO stock(produto, quantidade) VALUES(:produto, :quantidade)", $params);

// UPDATE
$params = [
    ':id' => 5,
    ':produto' => 'produto atualizado'
];
$results = $db->execute_non_query("UPDATE stock SET produto = :produto WHERE id = :id", $params);


// DELETE
$params = [
    ':id' => 5
];
$results = $db->execute_non_query("DELETE FROM stock WHERE id = 5");

echo '<pre>';
print_r($results);
echo 'OK';

