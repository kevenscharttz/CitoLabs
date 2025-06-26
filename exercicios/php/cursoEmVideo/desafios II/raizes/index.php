<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora Raizes</title>
</head>

<body>
    <main>
        <h1>Informe um número</h1>

        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get">
            <label for="salario">Número: </label>
            <input type="number" name="number" id="number" step="0.01" value="64">
            <input type="submit" value="Calcular Raízes" required>
        </form>
    </main>

    <section>
        <h2>Resultado final</h2>
        <?php 
            $numero = $_GET["number"] ?? 0;
            echo "<p>Analisando o <strong>número $numero</strong>, temos: </p>";  

            $raizQuadrada = sqrt($numero);
            $raizCubica = $numero ** (1/3);

            echo "<ul>
            <li>
                A sua raiz quadrada é ".number_format( $raizQuadrada, 2, ",",".")."
            </li>
            <li>
                A sua raiz cúbica é ".number_format( $raizCubica, 2, ",",".")."
            </li>
            </ul>"

        ?>
    </section>
</body>

</html>