<?php

    $erro = '';
    $sucesso = '';

    $textoRecebido = $_POST['texto'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($textoRecebido)){
            $erro = 'campo de texto vazio';
        } else {
            if (is_numeric($textoRecebido)){
                $file = fopen('dados_numericos.txt', 'a');
                fputs($file, $textoRecebido . PHP_EOL);
                fclose($file);
                $sucesso = "Valor numérico guardado com sucesso";
            } else if (is_string($textoRecebido)){
                $file = fopen('dados_string.txt', 'a');
                fputs($file, $textoRecebido . PHP_EOL);
                fclose($file);
                $sucesso = "Valor textual guardado com sucesso";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Nível 1 - Exercício 04</title>
</head>
<body>
    
    <form action="index.php" method="post">
    <label for="text">Texto:</label>    
    <input type="text" name="texto" id="texto">
    <input type="submit" value="Enviar">
    </form>
    <div>
        <?= !empty($erro) ? $erro: $sucesso?>
    </div>
</body>
</html>