<?php

require_once "./connection.php";
$pdo->exec('CREATE TABLE videos (id INTEGER PRIMARY KEY, url TEXT, title TEXT);');
