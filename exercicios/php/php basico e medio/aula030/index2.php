<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
            border: 1px black solid;
            border-radius: 10px;
            padding: 10px;
            margin: 5px;
            background-color: rgb(200, 200, 200);
        }
    </style>
</head>
<body>
    <?php for ($i = 0; $i <= 10; $i++): ?>
        <div class="card">
            <h3>Título <?= $i?></h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum, tempore corporis deserunt ab optio fugiat sint magnam quod similique voluptatibus rerum neque aut tempora earum unde modi, ea tenetur ad?</p>
        </div>
    <?php endfor; ?>
</body>
</html>