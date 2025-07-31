<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de séries</title>
</head>
<body>
    <h1>Séries favoritas:</h1>
    <ul>
        <?php foreach ($series as $serie): ?>
            <li><?= $serie?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>