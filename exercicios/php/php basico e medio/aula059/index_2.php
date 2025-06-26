<?php 
// Quando identificamos um espaço no nosso código que pode originar um erro dinamicamente, podemos usar a estrutura try... catch... finally...

// A estrutura é a seguinte:

/* 
try {
    Código que pretendemos executar de forma segura
}
catch (Throwable $e){
    código que será executado no caso de acontecer um erro
}
finally {
    código que será sempre executado, quer tudo ocorra bem, quer tudo ocorra mal
}

Colocamos o código que pretendemos executar sem errors destrutivos dentro do bloco try.

Se algum erro ocorrer, será automaticamente guardada a mensagem de erro no Exception $e e é executado o código dentro do bloco catch.

Adicionalmente, podemos colocar um bloco finally para código que será sempre executado a seguir a um try ou catch.

*/


$valor1 = 10;
$valor2 = 0;

//$resultado = $valor1 / $valor2;

try {
    $resultado = $valor1 / $valor2;
    echo $resultado;
} catch (Throwable $e){
    echo 'ERRO: '. $e->getMessage();
} finally {
    echo '<br>Fim do código';
}

// Iremos perceber melhor quando usar este tipo de estrutura nos exemplos e exercícios que temos servados para o final deste módulo
?>