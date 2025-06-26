<?php 

     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     error_reporting(E_ALL);
/*
    Agora não temos qualquer erro na conexão, deixámos de ter o bloco try... catch.
*/

    $database = 'udemy_loja_online';
    $username = 'user_loja_web';
    $password = '123456789Lu';

$ligacao = new PDO("mysql:host=127.0.0.1; dbname=$database");

    $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Temos um erro na query. Esta instrução não está completa
$reusltados = $ligacao->query("SELECT");
$ligacao = null;


/*
PDO::ERRMODE_SILENT - NÃO APRESENTA OS ERROS
PDO::ERRMODE_WARNING - APRESENTA AVISOS
PDO::ERRMODE_EXCEPTION - DISPARA EXCEPÇÕES QUE PODEM SER CAPTADAS NO CATCH

*/
?>