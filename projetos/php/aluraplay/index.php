<?php

declare(strict_types=1);

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($url === '/' || $url === '') {
    require_once 'listagem-videos.php';
} elseif ($url === '/novo-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once 'formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'novo-video.php';
    }
} elseif ($url === '/editar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once 'formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'editar-video.php';
    }
} elseif ($url === '/remover-video') {
    require_once 'remover-video.php';
}
