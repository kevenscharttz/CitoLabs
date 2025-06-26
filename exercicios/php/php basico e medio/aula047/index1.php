<?php 
/*
CSV significa Comma Separated Values (valores separados por vírgula). É um ficheiro com uma estrutura particular que permite ser usado entre aplicações para transporte de dados. Excel, LibreOffice, Google Sheets, ...
*/

// Criar um ficheiro CSV
$file = fopen('dados.csv', 'w');

// Header das colunas
$header = ['Coluna A', 'Coluna B', 'Coluna C'];
fputcsv($file, $header);

// Linhas

for ($i = 1; $i <= 100; $i++){
    $linha = [rand(100, 999), rand(100, 999), rand(100, 999)];
    fputcsv($file, $linha);
}

fclose($file);
?>