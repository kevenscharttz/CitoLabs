<?php 
// A SIMPLES E COMPLEXA VALIDAÇÃO DE DADOS

// Validação se tem número de caracteres válidos (3 a 20)
$nome = "Keven Willians";

if (strlen($nome) < 3 || strlen($nome) > 20) {
    echo "A quantidade de caracteres está incorreta";
} else {
    echo "Variável nome com quantidade de caracteres válida.";
}
echo "<br>";

// Validar de um email é válido;
$email = 'Kevenwillians@gmail.com';

if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "O email está com formato correto";
} else {
    echo "O email não está em um formato correto";
}

echo "<br>";
// Validar uma URL
$url = "https://www.google.com/";
if (filter_var($url, FILTER_VALIDATE_URL)){
    echo "A URL está em um formato válido";
} else {
    echo "A URL está em um formato incorreto para o uso";
}
// FILTER_VAR retorna o valor, caso seja válido, ou false, se o valor não estiver de acordo com a validação pretendida


// Validar se um telefone começa com 9 e tem 9 digitos
var_dump(preg_match("/^9{1}\d{8}$/", "966213456"));
// 1 = expressão regular confirma o valor analisado
// 0 = expressão regular não confirma o valor analisado
// false = aconteceu um erro

// Veremos mais detalhes sobre expressões regulares no módulo mais avançado de PHP


?>

