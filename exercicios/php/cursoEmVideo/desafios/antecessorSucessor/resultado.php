<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado</title>
</head>

<body>
    <section>
        <h1>Resultado</h1>
        <?php 
            $numero = $_GET["numero"];
            $antecessor = $numero - 1;
            $sucessor = $numero + 1;

            echo "<p>O numero escolhido foi: $numero <br> 
            O numero antecessor é: $antecessor <br>
            O numero sucessor é: $sucessor</p>";
        ?>
        <button onclick="javascript:window.location.href='index.html'">
            &#x2B05; Voltar</button>
    </section>
</body>

</html>