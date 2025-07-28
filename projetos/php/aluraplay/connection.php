<?php 

$host = 'localhost';
$port = '5432';
$dbname = 'aluraplay';

$user = 'postgres';
$password = '@cito2025';

$pdo = new PDO("pgsql:host=$host; port=$port; dbname=$dbname", $user, $password);

?>