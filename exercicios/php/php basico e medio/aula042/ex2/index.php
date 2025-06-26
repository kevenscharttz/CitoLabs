<?php 
    // Neste exemplo muito simples, vamos usar um cookie para definir o tema claro ou escuro do nosso site.

    //Verifica se existe um cookie com o tema
    $theme = !empty($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .light {
            background-color: white;
            color: black;
        }

        .dark {
            background-color: black;
            color: white;
        }
        
        a {
            color: red;
        }
    </style>
</head>
<body class="<?= $theme ?>">
        <a href="theme_dark.php">Dark Mode</a> | <a href="theme_light.php">Light Mode</a>
        <h1>MUDAR COR DA PÁGINA</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit magnam aspernatur hic quia blanditiis quam vel quo provident recusandae repellat dicta modi expedita molestiae natus ratione, eaque officia! Quibusdam, dolore!</p>
</body>
</html>