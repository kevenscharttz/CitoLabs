<?php 
    // Podemos agrupar vários valores em análise para execução do memso bloco de código.

    $estado_encomenda = 'em processamento';

    switch ($estado_encomenda) {
        case 'em processamento':
        case 'em análise':
            # Código
            break;
        
        case 'anulada':
        case 'cancelada':
        case 'inválida':
            # Código
            break;

        case 'enviada':
            # Código
            break;

        default:
            # Código
            break;
    }
?>