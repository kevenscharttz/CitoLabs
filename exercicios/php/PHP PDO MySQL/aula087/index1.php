<?php 
    // Conexão via PDO e Controle de Erros

    /*
    Vamos começar por aprender como conectar a nossa aplicação á base de dados importada no vídeo anterior
    */

    // 1. Definir as propriedades da ligação
    $database = 'udemy_loja_online';
    $username = 'user_loja_web';
    $password = '123456789Lu';

    //2. Efetuar a ligação
    /*
    Para isso vamos criar uma instância da classe PDO. Necessitamos de 3 parâmetros: 

     - o DNS(Data Source Name), onde vamos especificar, no mínimo, o host e o nome da base de dados; 
     
     - o segundo parâmetro é o nome do úsuario MySQL; 
     
     - e o terceiro a password desse usuário.
    */

    $conexão = new PDO("mysql:host=127.0.0.1;dbname=$database", $username, $password);

    // Podemos verificar se a ligação foi estabelecida corretamente, de uma forma muito simples:

    echo $estado = $conexão->getAttribute(PDO::ATTR_CONNECTION_STATUS); //127.0.0.1 via TCP/IP

    /*
    Como podemos ver, conseguimos fazer a ligação á base de dados e estamos em condições de poder fazer as nossas queries.

    É importante perceber que existem 3 etapas numa comunicação com a base de dados:

    1. Conectar com a base de dados;
    2. Comunicar com a base de dados;
    3. Fechar a ligação para libertar recursos.

    A ligação vai ficar aberta até a destruição do objeto PDO(). Para "desligar" a conexão, bataá destruir o objeto $conexao.
    */

    $conexao = null;

    // Caso isso não seja feito, ele será destruido automaticamente no final do script.
?>