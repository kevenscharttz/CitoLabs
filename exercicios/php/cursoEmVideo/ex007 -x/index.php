<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exercício PHP</title>
</head>

<body>
    <main>
        <h1>Somador de valore</h1>
        <?php 
            //Capturando os dados do formulário Retroalimentado
            $valor1 = $_GET['v1'] ?? 0;
            $valor2 = $_GET['v2'] ?? 0;
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
            <label for="v1">Valor 1: </label>
            <input type="number" name="v1" id="v1" value="<?=$valor1?>">

            <label for="v2">Valor 2: </label>
            <input type="number" name="v2" id="v2" value="<?=$valor2?>">

            <input type="submit" value="Somar">
        </form>

        <section>
            <h2>Resultado da soma</h2>
            <?php 
                $soma = $valor1 + $valor2;

                echo "<p>A soma dos valores $valor1 e $valor2 é: $soma</p>"
            ?>
        </section>
    </main>
</body>

</html>