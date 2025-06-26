<?php 
    /*
    O PDO contém mecanismos que nos permitem identificar e tratar os erros de conexão, para a eventualidade de acontecerem
    */


    // definir as ligações

    $database = 'udemy_loja_oDSAnline';
    $user = 'user_loja_web';
    $password = '123456789Lu';

    try {
        $conexao = new PDO("mysql:host=127.0.0.1;dbname=$database", $user, $password);

        echo $status = $conexao->getAttribute(PDO::ATTR_CONNECTION_STATUS);

        $conexao = null;

    } catch (PDOException $e){
        echo "ERRO: " . $e->getMessage();
    }

    /*
        O bloco catch apanhou uma PDOException. Esta exceção contém informações precisas sobre o erro. Já não é uma mensagem gigante. ELa contém um código e uma mensagem
    */
?>