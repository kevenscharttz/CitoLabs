<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">n
    <title>Anatomia de uma Divisão</title>
</head>

<body>
    <main>
        <h1>Anatomia de uma DIvisão</h1>
        <?php 
            $dividendo = $_GET['dividendo'] ?? 0;
            $divisor = $_GET['divisor'] ?? 1;
            $resto = $dividendo % $divisor;
            $resultado = ceil($dividendo / $divisor);
        ?>

        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get">
            <label for="dividendo">Dividendo: </label>
            <input type="number" name="dividendo" id="dividendo" value="<?=$dividendo?>">

            <label for="divisor">Divisor: </label>
            <input type="number" name="divisor" id="divisor" value="<?=$divisor?>">

            <input type="submit" value="Analisar">
        </form>
    </main>

    <section>
        <table class="divisao">
            <tr>
                <td><?=$dividendo?></td>
                <td><?=$divisor?></td>
            </tr>
            <tr>
                <td><?=$resto?></td>
                <td><?=$resultado?></td>
            </tr>
        </table>
    </section>
</body>

</html>