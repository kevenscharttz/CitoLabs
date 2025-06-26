<?php

require_once('operacoes.php');

$veiculos = [];

$file = fopen('dados.csv', 'r');
while (!feof($file)) {
    $linha = fgetcsv($file);
    switch ($linha[0]) {
        case 'automovel':
            $veiculos[] = new Automovel($linha);
            break;
        case 'aviao':
            $veiculos[] = new Aviao($linha);
            break;
        case 'barco':
            $veiculos[] = new Barco($linha);
            break;
        default:
            break;
    }
}
fclose($file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Automoveis</h1>    
    <ul>
        <?php foreach($veiculos as $veiculo): ?>
            <?php if($veiculo->get_tipo() == 'automovel' && $veiculo->get_ano() < 2015):?>
            <?=$veiculo->apresentar()?>
            <br>
            <?php endif;?>
        <?php endforeach;?>
    </ul>

    <h1>Aviões</h1>    
    <ul>
        <?php foreach($veiculos as $veiculo): ?>
            <?php if($veiculo->get_tipo() == 'aviao' && $veiculo->get_ano() < 2015):?>
            <?=$veiculo->apresentar()?>
            <br>
            <?php endif;?>
        <?php endforeach;?>
    </ul>

    <h1>Barcos</h1>    
    <ul>
        <?php foreach($veiculos as $veiculo): ?>
            <?php if($veiculo->get_tipo() == 'barco' && $veiculo->get_ano() < 2015):?>
            <?=$veiculo->apresentar()?>
            <br>
            <?php endif;?>
        <?php endforeach;?>
    </ul>
</body>
</html>
