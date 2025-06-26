<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div>
        <?php 
        $numero = $_GET["numero"] ?? 0;
        $numero = str_replace(",", ".", $numero);

        echo "<p>Analisando o número ".number_format($numero, 3, ",", ".")." informado pelo usuário: </p>";

        
        $numeroInteiro = floor($numero);
        $numeroFracionado = $numero - $numeroInteiro;

        echo "<p>A parte inteira do número é: <strong>".number_format($numeroInteiro, 0, ",", ".")."</strong></p>";

        echo "<p>A parte fracionada do número é: <strong>".number_format($numeroFracionado, 3, ",", ".")."</strong></p>";
    ?>
        <button onclick="javascript:window.location.href='index.html'">Voltar</button>
    </div>
</body>

</html>