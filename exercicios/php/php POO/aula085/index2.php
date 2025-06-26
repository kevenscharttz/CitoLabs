<?php 
// FUNÇÕES ÚTEIS PARA VERIFICAÇÃO DE CLASSES

/*
Há no entanto um pequeno detalhe. Se as nossas classes são carregadas com spl_autoload_register() as nossas classes não existem a não se quando são instanciadas.

Para isso resolvemos da seguinte forma:
*/

    function carregar_classes ($nome_da_classe) {
        $path = 'classes/'.$nome_da_classe.'.php';
        if (file_exists($path)){
            require_once($path);
        }
    }

    spl_autoload_register('carregar_classes');


//verificar se uma classe existe
echo class_exists('Humano', true) ? 'Sim' : 'Não';
echo '<br>';

//verificar se um método existe dentro de uma classe
echo class_exists('Humano', 'falar') ? 'Sim' : 'Não';
echo '<br>';

//verificar se uma classe existe
echo class_exists('Humano', 'sobrenome') ? 'Sim' : 'Não';
echo '<br>';
?>