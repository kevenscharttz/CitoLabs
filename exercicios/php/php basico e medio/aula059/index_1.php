<?php 
// TRATAMENTO DE ERROS

/*
No vídeo anterior vimos como ativar e controlar a forma como o PHP apresenta (ou não) os erros dos nossos scripts. No entanto, o desafio está em executar o nosso código de forma a que, sempre que um potencial erro ocorra, a nossa aplicação seja capaz de o capturar e seguir um caminho alternativo

É sobre isso que iremos falar neste vídeo

Vamos começar por tratamento de exceções.
É um mecanismo que serve para alterar o fluxo normal da execução do código, se ocorrer um erro especificado (excepcional).
Está condição é chamada de exceção
*/

function adicionar($a, $b){
    if (!is_numeric($a) || !is_numeric($b)){
        throw new Exception("Pelo menos um dos valores não é númerico");
    }
    return $a + $b;
}

// echo adicionar('joao', 1000);

// Agora usando a estrutura do try catch para impedir o fim da execução
try {
    echo adicionar('joao', 1000);
} catch (Exception $erro) {
    echo $erro->getMessage();
}

echo "<br>Fim do script.";
?>