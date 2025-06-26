<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Login</title>
        <style>
            body {
                width: 100%;
                height: 96vh;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            form {
                display: flex;
                flex-direction: column;
            }

            label{
                margin-bottom: 5px;
            }

            input {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
        <h3>LOGIN</h3>
        <form action="submissao1.php" method="get">
            <label for="">Username</label>
            <input type="text" name="nome" id="nome">

            <label for="">Password</label>
            <input type="password" name="senha" id="senha">

            <input type="submit" value="Entrar">
        </form>
        </div>
    </body>
</html>