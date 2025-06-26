<?php 
// COPIAR, MOVER, RENOMEAR E ELIMINAR FICHEIROS

// Para copiar um ficheiro
copy(__DIR__ . '/origem/file1.nfo', __DIR__ . '/destino/file1.nfo');

// Na cópia, alterar o nome do ficheiro de destino
copy(__DIR__ . '/origem/file1.nfo', __DIR__ . '/destino/new_file.nfo');

// IMPORTANTE: Se o ficheiro de destino existir, vai ser esmagado
?>