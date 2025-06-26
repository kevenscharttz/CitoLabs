<?php 

$database = 'nova_base_dados';
$username = 'root';
$password = '@cito2024';

$ligacao = new PDO("mysql:host=127.0.0.1", $username, $password);

$ligacao->exec("DROP DATABASE IF EXISTS`$database`");

$ligacao->exec("CREATE DATABASE IF NOT EXISTS `$database`");

$ligacao->exec("USE `$database`");

$ligacao->exec(
    "CREATE TABLE usuarios (" .
    "`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
    "`usuario` VARCHAR(30) NULL DEFAULT NULL, " . 
    "`senha` VARCHAR(100) NULL DEFAULT NULL, " .
    "`created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP" .  
    ")"
);

// destruir a ligação
$ligacao = null;

echo 'Terminado';
?>