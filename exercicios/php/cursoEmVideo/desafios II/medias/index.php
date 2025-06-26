<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Médias Aritméticas</title>
</head>

<body>
    <main>
        <h1>Médias Aritméticas</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get">
            <label for="valor1">1º Valor: </label>
            <input type="number" name="valor1" id="valor1" step="0.01">

            <label for="">1º Peso: </label>
            <input type="number" name="peso1" id="peso1" step="0.01">

            <label for="valor2">2º Valor: </label>
            <input type="number" name="valor2" id="valor2" step="0.01">

            <label for="peso2">2º Peso: </label>
            <input type="number" name="peso2" id="peso2" step="0.01">

            <input type="submit" value="Calcular Médias">
        </form>
    </main>

    <section>
        <h2>Cálculo de Médias</h2>
        <?php 
         $valor1 = $_GET['valor1'] ?? 1;
         $valor2 = $_GET['valor2'] ?? 1;
        
         $peso1 = $_GET['peso1'] ?? 1;
         $peso2 = $_GET['peso2'] ?? 1;

         echo "<p>Analisando os valores $valor1 e $valor2: </p>";

         $mediaSimples = (($valor1+$valor2) / 2) ?? 1;

        $mediaPonderada = (((($valor1 * $peso1) + ($valor2 * $peso2)) /($peso1 + $peso2))) ?? 1;

        echo "<ul>
        <li>
        A <strong>Média Aritmética Simples</strong> entre os valores é igual a ".number_format($mediaSimples, 2, ",", ".")."
        </li>
        <li>
        A <strong>Média Aritmética Ponderada</strong> com pesos $peso1 e $peso2 é igual a ".number_format($mediaPonderada, 2, ",", ".")."
        </li>
        </ul>";
        ?>
    </section>
</body>

</html>