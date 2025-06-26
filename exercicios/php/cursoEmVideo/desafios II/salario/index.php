<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de sálarios minimos</title>
</head>

<body>
    <main>
        <h1>Informe seu salário</h1>
        <?php 
            $salarioMinimo = 1380.60;
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get">
            <label for="salario">Salário (R$):</label>
            <input type="number" name="salario" id="salario" step="0.01" value="<?=$salarioMinimo?>">
            <p>Considerando o salário minimo de <strong>R$<?=number_format($salarioMinimo, 2, ",", ".")?></strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Resultado final</h2>
        <?php 
            $salario = $_GET["salario"] ?? 0;
            $salario = str_replace(",", ".", $salario);

            $salariosQuantidade = (int)($salario / $salarioMinimo);
            
            $salarioInteiro = floor($salario);
            $restoDecimal = $salario - $salarioInteiro;
            $salarioResto = (($salario % $salarioMinimo)+$restoDecimal);

            
            $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);

            echo "<p>Quem recebe um salário de ".numfmt_format_currency($formatter, $salario, "BRL")." ganha <strong>$salariosQuantidade salários mínimos</strong> + ".numfmt_format_currency($formatter, $salarioResto, "BRL")."</p>"
        ?>
    </section>
</body>

</html>