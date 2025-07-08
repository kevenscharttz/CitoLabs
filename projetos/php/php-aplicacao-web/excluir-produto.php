<?php 

require_once("./src/conexao.php");
require_once("./src/Model.php");
require_once("./src/Repository.php");

$id = $_POST['id'];

$delete = new ProdutoRepositorio($dbConnection);
$delete->deletar($id);
header("Location: ./admin.php");
?>