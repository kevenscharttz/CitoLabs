<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reajustador de Preços</title>
</head>

<body>
    <?php 
        $preco = $_GET['preco'] ?? 50;
        $percentual = $_GET['percentual'] ?? 0;
        $precoFinal = $preco + (( $percentual / 100) * $preco);

    ?>
    <main>
        <h1>Reajustador de Preços</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>">

            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="preco" step="0.01" value="50">

            <label for="percentual">Qual será o percentual de reajuste? (<strong><span id="p">?</span>%</strong>)<?php 
            

            
            ?></label>
            <input type="range" id="percentual" name="percentual" step="1" min="0" max="100" value="<?=$percentual?>"
                oninput="mudaPorcentagem()">

            <input type="submit" value="Reajustar">
        </form>
    </main>

    <section>
        <?php 
            $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
            
           // echo "<p>O procuto custava ".." com $percentual% de aumento vai passar a custar ".numfmt_format_currency($formatter, $precoFinal, "BRL")." a partir de agora.</p>";
        ?>
        <h2>Resultado do Reajuste</h2>
        <p>O procuto custava <?= numfmt_format_currency($formatter, $preco, "BRL")?>, com um percentual de
            <?= $percentual?>% de aumento vai passar a custar
            <?= numfmt_format_currency($formatter, $precoFinal, "BRL")?> a partir de agora.</p>
    </section>
    <script>
    //declaração automatica
    mudaPorcentagem();

    function mudaPorcentagem() {
        p.innerText = percentual.value;
    }
    </script>
</body>

</html>