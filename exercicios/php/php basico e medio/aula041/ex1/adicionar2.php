<?php 
    session_name("minha-sessão");
    session_set_cookie_params(240);
    session_start();

    $_SESSION['nickname'] = "Japa";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once ("nav.php")?>
    <hr>
    <h2>O apelido foi adicionar</h2>
</body>
</html>