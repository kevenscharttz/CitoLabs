<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Trabalhando com números aleatórios</h1>
        <p>Gerado um número aleatório entre 0 e 100...</p>
        <?php 
            $numeroMin = 1;
            $numeroMax = 100;
            $numeroAleatorio = mt_rand($numeroMin, $numeroMax);
            echo "<p>O valor gerado foi de: $numeroAleatorio";
        ?>
        <button onclick="javascript:document.location.reload()">🔄 Gerar outro</button>
    </div>
</body>

</html>