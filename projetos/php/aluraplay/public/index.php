<?php

declare(strict_types=1);

use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Repository\VideoRepository;
$path = __DIR__;
require_once __DIR__ . '/../vendor/autoload.php';
require_once $path . '/../connection.php';

$videoRepository = new VideoRepository($pdo);

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    $controller = new VideoListController($videoRepository);
    $controller->processaRequisicao();
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