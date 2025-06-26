<?php

require_once('operacoes.php');

$dados = [
    ['m', 'João Ribeiro'],
    ['f', 'Ana Silva'],
    ['M', 'Carlos Martins'],
    ['m', 'Joaquim Santos'],
    ['f', 'Marta Rodrigues'],
    ['M', 'Rui Fernandes'],
    ['F', 'Márcia Antunes'],
    ['g', 'Pantufa'],
    ['f', 'Carla Maria'],
    ['M', 'Fernando Joaquim'],
    ['m', 'Ricardo Moita'],
    ['c', 'Lassie'],
    ['F', 'Daniela Cardoso'],
    ['F', 'Susana Dinis'],
];

$humano = new Humanos();

foreach ($dados as $dado) {
    $humano->definir($dado[0], $dado[1]);
}

$masculinos = $humano->get_masculino();
$femininos = $humano->get_feminino();
$desconhecidos = $humano->get_desconhecido();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Masculino</h1>
    <ul>
        <?php foreach ($masculinos as $masculino):?>
            <li><?=$masculino?></li>
        <?php endforeach;?>
    </ul>

    <h1>Feminino</h1>
    <ul>
        <?php foreach ($femininos as $feminino):?>
            <li><?=$feminino?></li>
        <?php endforeach;?>
    </ul>

    <h1>Desconhecido</h1>
    <ul>
        <?php foreach ($desconhecidos as $desconhecido):?>
            <li><?=$desconhecido?></li>
        <?php endforeach;?>
    </ul>
</body>
</html>