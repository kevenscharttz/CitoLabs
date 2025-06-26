<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando variáveis PHP</title>
    <style>
    .cor-de-texto {
        color: red;
    }
    </style>
</head>

<body>
    <?php 
        $nome = "Keven";
    ?>
    <h1>Usando variáveis PHP em HTML</h1>

    <p>Podemos incluir variáveis PHP de duas formas diferentes dentro de um texto já existente em HTML</p>
    <br><br>
    <p>Meu nome é <?php echo $nome?></p>
    <p>Meu nome é <?= $nome?></p>

    <h2>Criando HTML por PHP</h2>
    <?php 
        echo "<p>Paragrafo feito por php</p>";
        echo '<p class="cor-de-texto">Paragrado feito por php com uma classe';
    ?>
</body>

</html>