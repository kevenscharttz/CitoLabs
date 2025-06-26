<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Entendendo o pré-processamento</title>
</head>

<body>
    <h1>Exemplo PHP</h1>
    <?php 

        date_default_timezone_set("America/Sao_Paulo");
        //O d mínusculo mostra o dia em número, o M maiúculo mostra o mês escrito e o Y minúsculo o ano
        echo "Hoje é dia ".date("d/M/Y");

        //O g representa a hora, i minuto e s segundo e o T a timezone
        echo " e a hora atual é: ".date("g:i:s T");
    ?>
</body>

</html>