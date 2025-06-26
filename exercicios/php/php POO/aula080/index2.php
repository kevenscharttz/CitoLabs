<?php 
//  DECLARAÇÃO DE STRICK TYPES

/*
Para que o php obrigue a passar argumentos que correspondem ao tipo de dado esperado, temos que ativar o strict_types = 1;
*/

declare(strict_types = 1);

function apresentar1($mensagem) {
    echo "Mensagem: $mensagem".'<br>';
}

function apresentar2(string $mensagem) {
    echo "Mensagem: $mensagem".'<br>';
}

apresentar1('FDSHFOIDFSIDJFSODJFOSDFSIDFDSOIFJDSFO');
apresentar2(200);

// agora a segunda função não irá funcionar
?>