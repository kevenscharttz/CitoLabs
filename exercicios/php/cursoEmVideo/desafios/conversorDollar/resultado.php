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
        <h1>Conversor de Moedas v1.0</h1>
        <pre>
        <?php 
            $numero = $_GET["numero"];
            $padrao = numfmt_create("pt-BR", NumberFormatter::CURRENCY);
            $cotacao = 5.22;
            $numeroConvertido = $numero / $cotacao;

            echo "<p>Seus " . numfmt_format_currency($padrao, $numero, "BRL")." equivalem a " .numfmt_format_currency($padrao, $numeroConvertido, "USD"). "</p>";

            echo "<p>Cotação fixa de " .numfmt_format_currency($padrao, $cotacao, "BRL").", informada diretamente no código";
            
        ?>
        </pre>
        <button onclick="javascript:window.location.href='index.html'">Voltar</button>
    </section>
</body>

</html>