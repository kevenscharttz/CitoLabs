<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de tempo</title>
</head>

<body>
    <?php 
            $total = $_GET['segundo'] ?? 0;
            $sobra = $total;
            
            $semanas = (int) ($sobra / 604800);
            $sobra = ($sobra % 604800); 

            $dias = (int) ($sobra / 86400);
            $sobra = ($sobra % 86400); 

            $horas = (int) ($sobra / 3600); 
            $sobra = ($sobra % 3600); 

            $minutos = (int) ($sobra / 60); 
            $sobra = ($sobra % 60); 
            
            $segundos = $sobra; 
            
        ?>
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="" method="get">
            <label for="segundo">Qual é o total de segundos?</label>
            <input type="number" name="segundo" id="segundo">

            <input type="submit" value="Calcular">
        </form>
    </main>
    <section>
        <h2>Totalizando tudo</h2>
        <p>Analisando o valor que você digitou, <strong><?=$total?> segundos</strong> equivalem a um total de:
        </p>
        <ul>
            <li>Semanas: <?=$semanas?></li>
            <li>Dias: <?=$dias?></li>
            <li>Horas: <?=$horas?> </li>
            <li>Minutos: <?=$minutos?></li>
            <li>Segundos: <?=$segundos?></li>
        </ul>
    </section>
</body>

</html>