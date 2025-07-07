<?php

    require_once('./src/conexao.php');

    $sqlCommand = "SELECT * FROM produtos WHERE tipo = 'café';";
    $sqlCommand2 = "SELECT * FROM produtos WHERE tipo = 'almoço';";
    $statement = $dbConnection -> query($sqlCommand);
    $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

    $statement2 = $dbConnection -> query($sqlCommand2);
    $produtosAlmoco = $statement2->fetchAll(PDO::FETCH_ASSOC)

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php
                    foreach ($produtosCafe as $produtoCafe):
                ?>    
                    
                    <div class="container-produto">
                    <div class="container-foto">
                        <img src="./img/<?=$produtoCafe['imagem']?>">
                    </div>
                    <p><?=$produtoCafe['nome']?></p>
                    <p><?=$produtoCafe['descricao']?></p>
                    <p><?='R$ '. number_format($produtoCafe['preco'], 2, ',', '.')?></p>
                </div>
                <?php endforeach;?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php foreach($produtosAlmoco as $produtoAlmoco): ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="./img/<?=$produtoAlmoco['imagem']?>">
                    </div>
                    <p><?=$produtoAlmoco['nome']?></p>
                    <p><?=$produtoAlmoco['descricao']?></p>
                    <p><?='R$ ' . number_format($produtoAlmoco['preco'], 2, ',', '.')?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>