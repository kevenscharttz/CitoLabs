<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos Primitivos em PHP</title>
</head>

<body>
    <h1>Teste de Tipos Primitivos</h1>
    <?php 
        // 0x = hexadecimal, 0b = binário e 0 = octal
        //$numero = 010;
        //echo "O valor da variável é $numero";

        //$variável = "Keven";
        //var_dump($variável);

        //$calculo = 3e2;
        //echo "O valor dá variável é: $calculo ";

        //$numero = (integer) 3e2;
        //var_dump($numero);

        //$casado = false;
        //var_dump($casado);
        //echo "O valor para casado é $casado";

        $vetor = [1, "2", 3.5, false, true];
        var_dump($vetor);

        class Pessoa {
            private string $nome;
            private string $idade;
        }
        echo "       ";
        $pessoa = new Pessoa;
        var_dump($pessoa);
    ?>
</body>

</html>