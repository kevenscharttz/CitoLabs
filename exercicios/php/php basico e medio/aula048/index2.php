<?php 
// MOVER

// Para mover um ficheiro (a cópia duplica), usamos a função rename
//rename(__DIR__ . '/file_to_move.nfo', __DIR__ . "/destino/file_to_move.nfo");

// Esta função também serve para renomear o ficheiro, desde que seja mantido o caminho
rename(__DIR__ . '/file_to_move.nfo', __DIR__ . "/destino/luva_de_processo.nfo");
?>