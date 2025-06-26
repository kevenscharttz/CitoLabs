<?php 
    // EXPRESSÃO MATCH

    /* 
        É uma estrutura muito semelhante ao SWITCH
        O parâmetro é o valor a ser avaliado
        Cada 'case' verifica se o valor é igual e executa o código a seguir aos: 

        break - ignora o resto do código

        default é semelhante ao else - executado se nenhuma das comparações resultar em verdadeiro.
    */

    $estado_encomenda = 'em processamento';

    //-------------------------------------

    switch ($estado_encomenda) {
        case 'em processamento':
            # código
            break;
        case 'anulada':
        case 'cancelada':
            #código
            break;
        
        case 'enviada':
            #código
            break;
        default:
            # código
            break;
        }
    //-------------------------------------

    $resultado = match ($estado_encomenda) {
        'em processamento' => 'A encomenda está sendo processada',
        'anulada', 'cancelada' => 'A encomenda foi anulada ou cancelada',
        'enviada' => 'A encomenda foi enviada',
        default => 'Estado da encomenda desconhecido'
    };

    echo $resultado;
?>