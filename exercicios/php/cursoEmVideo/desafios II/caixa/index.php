<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
    img {
        height: 80px;
        margin: 5px;
    }

    li {
        list-style: none;
    }
    </style>
</head>

<body>
    <?php 
        $saque = $_GET['saque'] ?? 0;
        $sobra = $saque;

        $cem = (int)($sobra / 100);
        $sobra = $sobra % 100;

        $cinquenta = (int)($sobra / 50);
        $sobra = $sobra % 50;

        $dez = (int)($sobra / 10);
        $sobra = $sobra % 10;

        $cinco = (int)($sobra / 5);
        $sobra = $sobra % 5;
    ?>
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="">
            <label for="saque">Qual valor você deseja sacar? (R$)</label>
            <input type="number" name="saque" id="saque" step="5" required value="<?=$saque?>">
            <p>*Notas deisoníveis: R$100, R$50, R$10 e R$5</p>
            <input type="submit" value="Sacar">
        </form>
    </main>
    <section>
        <h2>Saque de R$ <?=$saque?> realizado</h2>
        <p>O caixa eletrônico vai te entregar as seguintes notas: </p>

        <ul>
            <li><img src="./imagens/100-reais.jpg" alt="nota de 100 reais"> x<?=$cem?></li>

            <li><img src="./imagens/50-reais.jpg" alt="nota de 50 reais"> x<?=$cinquenta?></li>

            <li><img src="./imagens/10-reais.jpg" alt="nota de 10 reias"> x<?=$dez?></li>

            <li> <img src="./imagens/5-reais.jpg" alt="nota de 5 reais"> x<?=$cinco?></li>

        </ul>
    </section>
</body>

</html>