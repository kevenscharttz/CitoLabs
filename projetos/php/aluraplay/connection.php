<?php 

$host = 'localhost';
$port = '5432';
$dbname = 'aluraplay';

$user = 'postgres';
$password = '12345';

$pdo = new PDO("pgsql:host=$host; port=$port; dbname=$dbname", $user, $password);

?>