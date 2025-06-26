<?php 
    // OBTER RESULTADOS COM EXECUÇÃO DE QUERIES

    /*
    Vamos obter dados a partir da base de dados, e ver como o PHP os pode receber
    */

    //Configurações
    $database = 'udemy_loja_online';
    $user = 'user_loja_web';
    $password = '123456789Lu';

    //ligação
    $ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database", $user, $password);

    //----------------------------
    // Comunicação simples

    //query() é um método do objeto PDO, esse método vai permitir adicionar ums string de ums instrução SQL, para eu dizer ao banco o que pretendo fazer

    $resultados = $ligacao->query('SELECT * FROM produtos');
    echo '<pre>';
    print_r($resultados);
    // O retorno é um objeto PDOStatement. Aparentemente não contém os resultados.
    
    //----------------------------

    //O método fetchAll() também é um método do PDO, e básicamente ele traz todo o conteúdo da nossa query, o que pode parecer ser funcional, mas isso acaba trazendo dados desnecessários.
    $resultados = $ligacao->query('SELECT * FROM produtos')->fetchAll();
    echo '<pre>';
    print_r($resultados);
?>