<?php 
    session_start();

    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        die("Erro: Acesso inválido");
    }

    //verificar se os valores existem
    if (empty($_POST['text_valor_1']) || empty($_POST['text_valor_2'])) {
        $_SESSION['erro'] = "Os dois valores são de preenchimento obrigatório";
        header('Location: index.php');
        return;
    }

    // Verifica se os campos são númericos e positivos
    $numero1 = $_POST['text_valor_1'];
    $numero2 = $_POST['text_valor_2'];
    if (!is_numeric($numero1) || $numero1 < 0 || !is_numeric($numero2) || $numero2 < 0) {
        $_SESSION['erro'] = "Os campos devem conter valores númericos positivos";
        header('Location: index.php');
        return;
    }
    
    $resultado = $numero1 * $numero2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>RESULTADO: </h1>
    <?php echo "<h3>O resultado de $numero1 x $numero2 é igual a $resultado</h3>"?>
</body>
</html>