<?php 
    //A SUPER GLOBAL $_GET

    //Vamos usar o endereço: 
    //http://127.0.0.1/cursosphpudemy/aula051/index2.php?id=100

    //Para capturar um determinado valor da query string, recorremos à chave do array
    //associativo da super global $_GET

    echo $_GET['id'];

    // Mas cuidado, se a variável não existir, vai surgir um erro

    echo $_GET['teste'];

    // Devemos sempre verificar se existe e depois captar esse parâmetro
    $valor = null;
    if (isset($_GET['teste'])){
        $valor = $_GET['teste'];
    }
    echo '<br>';
    echo "Valor: $valor";
?>