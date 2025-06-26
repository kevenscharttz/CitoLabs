<?php 
    /*
    Apresentar a frase 10 vezes, com cada vez menos opacidade
    */

    $frase = "Esta frase vai aparecer com diferentes opacidades";
    $opacity = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php for($i = 0; $i < 10; $i++):?>
        <p style="opacity:<?= $opacity-= 0.10?>"><?= $frase?></p>
        <?php endfor;?>
</body>
</html>