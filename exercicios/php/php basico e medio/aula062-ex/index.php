<?php

    function divide ($a, $b){
        try {
            return $a / $b;
        } catch (Throwable $th) {
            return null;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Nível 1 - Exercício 02</title>
</head>

<body>

    <?php for ($i = 0; $i <= 20; $i++) : ?>

        <?php 
            $valor1 = rand(0,10);
            $valor2 = rand(0,10);
            $resultado = divide($valor1, $valor2);
        ?>

        <h3>Divisão <?=$i?>:</h3>
        <?= 
            "$valor1 : $valor2 = ". ($resultado === null ? "Divisão por zero" : $resultado);
        ?>

    <?php endfor; ?>


</body>

</html>