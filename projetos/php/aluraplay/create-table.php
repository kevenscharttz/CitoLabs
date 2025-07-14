<?php

require "./conexao.php";

$sql = "CREATE TABLE videos(id SERIAL PRIMARY KEY, url VARCHAR(100), title VARCHAR(50))";
$pdo->exec($sql);

?>