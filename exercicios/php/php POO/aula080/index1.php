<?php 
//  DECLARAÇÃO DE STRICK TYPES

/*
A linguagem PHP é muito conhecida por ser fracamente tipada. Na realidade, muitos programadores ains usam o PHP com variáveis, métodos e parâmetros que não definem que tipo de valores aceitam ou retornam.

Com a evolução da linguagem, e apesar de não ser obrigatório o seu uso, a definição de tipos nas propriedades de uma classe, parâmetro e retorno de funções e métodos pasou a ser possível.

Neste vídeo vamos ver rapidamente alguns exemplos.
*/

function apresentar1($mensagem) {
    echo "Mensagem: $mensagem".'<br>';
}

function apresentar2(string $mensagem) {
    echo "Mensagem: $mensagem".'<br>';
}

apresentar1('FDSHFOIDFSIDJFSODJFOSDFSIDFDSOIFJDSFO');
apresentar2(200);

// ambos vão funcionar, pois o 200 será transformado para uma string
?>