<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Resultado do processamento</h1>
    </header>
    <main>
        <div>
            <?php 
            //SUPER GLOBAL
            //var_dump($_REQUEST); //$_GET, $_POST, $_COOKIE

            //o nome dentro do GET se refere ao nome do name, lá do input

            $nome = $_GET["nome"] ?? "undefined";
            $sobrenome = $_GET["sobrenome"] ?? "undefined";

            echo "<p>Bem vindo, <strong><mark>$nome $sobrenome</strong></mark>, é um prazer te conhecer!</p>";
            
        ?>
            <a href="javascript:history.go(-1)">Voltar para a página anterior</a>
        </div>
    </main>
</body>

</html>