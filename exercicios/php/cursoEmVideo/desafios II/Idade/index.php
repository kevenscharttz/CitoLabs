<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de idade</title>
</head>

<body>
    <?php      
        $anoAtual = Date("Y");
        $anoNascimento = $_GET['idade'] ?? 2000;
        $anoIdade = $_GET['ano'] ?? $anoAtual;
    ?>
    <main>
        <h1>Calculando a sua idade</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get">
            <label for="idade">Em que ano você nasceu?</label>
            <input type="number" name="idade" id="idade" min="1900" max="<?=$anoAtual?>" value="<?=$anoNascimento?>">

            <label for="ano">Quer saber sua idade em que ano? (atualmente estamos em <?=$anoAtual?>)</label>
            <input type="number" name="ano" id="ano" min="1900" value="<?=$anoAtual?>">

            <input type="submit" value="Qual será a minha idade?">
        </form>
    </main>
    <section>

        <?php 
            $idade = $anoIdade - $anoNascimento;
        ?>

        <h2>Resultado</h2>
        <p>Quem nasceu em <?=$anoNascimento?> vai ter <?=$idade?> anos em <?=$anoIdade?></p>

    </section>
</body>

</html>