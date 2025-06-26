<?php 
    if($_SESSION['REQUEST_METHOD'] != 'POST'){
        exit("Sessão Inválida");
    }

    $users = [

        'Keven' => '52290420-374b-11f0-8196-c50f6e1cbcec',
        'Luciano' => '52292b30-374b-11f0-8196-c50f6e1cbcec',
        'Samuel' => '52292b31-374b-11f0-8196-c50f6e1cbcec'
    ];

    $username = isset($_POST['nome']) ? trim($_POST['nome']) : null;
    $password = isset($_POST['senha']) ? trim($_POST['senha']) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  if(key_exists($username, $users)): ?>
        <?php if(password_verify($password, $users[$username])): ?>
            <h1>login OK</h1>
        <?php else: ?>
            <h1>login OK</h1>
        <?php endif;?>
    <?php else: ?>
        <h1>login OK</h1>
    <?php endif;?>

    <a href="./index1.php">Voltar</a>

</body>
</html>