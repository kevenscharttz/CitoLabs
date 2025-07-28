<?php

declare(strict_types=1);
$path = __DIR__;
require_once $path . '/../vendor/autoload.php';

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    require_once $path . '/../listagem-videos.php';
} elseif ($_SERVER['PATH_INFO'] === '/novo-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once $path . '/../formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once $path . '/../novo-video.php';
    }
}  elseif ($_SERVER['PATH_INFO'] === '/editar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once $path . '/../formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once $path . '/../editar-video.php';
    }
} else if ($_SERVER['PATH_INFO'] === '/remover-video') {
    require_once $path . '/../remover-video.php';
} else {
    http_response_code(404);
}