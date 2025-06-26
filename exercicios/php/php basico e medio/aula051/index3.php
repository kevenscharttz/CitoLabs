<?php 
// Agora usando o endereço:
//http://127.0.0.1/cursosphpudemy/aula051/index3.php?id=100&produto=bicicleta

$id = isset($_GET['id']) ? $_GET['id'] : null;
$produto = isset($_GET['produto']) ? $_GET['produto'] : null;

echo "ID = " . $id . "<br>";
echo "Produto = " . $produto;
?>