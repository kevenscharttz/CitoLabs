<?php 
    //------------------------ TIPOS DE DADOS ESCALARES --------------------------
    
    //bool / booleano - aceita valores verdadeiros ou falsos ( true || false )
    $apresentarDados = true;

    //int / integer - aceita valores númericos sem casas decimais
    $valor = 0;
    $valor2 = 1233434234;
    $valor3 = -324412345;

    //float - aceita valores flutuantes (números com casas decimais)
    $float = 1.5;
    $float2 = 0.4342523;
    $float3 = 23143412.34245;
    $float4 = -3234234.34244;

    //string - aceita valores alfanúmericos (letras, palavras, números, simbolos)
    $nome = "joão";
    $apelido = "Zeca";
    $letraEscolhida = "a";
    $fraseDoDia = "AAAAAAAAAAAA1234...FFVADFJG";

    //-----------------------------------------------------------------------
    echo "------------------------".'<br>';
    echo "valor booleano: $apresentarDados<br>";
    echo "------------------------".'<br>';
    echo "valor inteiro: $valor<br>";
    echo "valor inteiro: $valor2<br>";
    echo "valor inteiro: $valor3<br>";
    echo "------------------------".'<br>';
    echo "valor flutuante: $float<br>";
    echo "valor flutuante: $float2<br>";
    echo "valor flutuante: $float3<br>";
    echo "valor flutuante: $float4<br>";
    echo "------------------------".'<br>';
    echo "valor string: $nome<br>";
    echo "valor string: $apelido<br>";
    echo "valor string: $letraEscolhida<br>";
    echo "valor string: $fraseDoDia<br>";
    echo "------------------------".'<br>';
    
    echo gettype($apresentarDados).'<br>';
    echo gettype($valor).'<br>';
    echo gettype($float).'<br>';
    echo gettype($nome).'<br>';
    echo "------------------------".'<br>';

    var_dump($apresentarDados);
    echo "<br>";
    var_dump($valor);
    echo "<br>";
    var_dump($nome);
    echo "<br>";
?>