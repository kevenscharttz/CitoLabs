<?php

$uri = $_SERVER['PATH_INFO'];
$method = $_SERVER['REQUEST_METHOD'];

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    require_once 'listagem-videos.php';
} elseif ($uri === '/new-video') {
    if ($method === 'GET') {
        require_once 'forms.php';
    } elseif ($method === 'POST') {
        require_once 'new-video.php';
    }
}  elseif ($uri === '/edit-video') {
    if ($method === 'GET') {
        require_once 'forms.php';
    } elseif ($method === 'POST') {
        require_once 'edit-video.php';
    }
} else if ($uri === '/remove-video') {
    require_once 'remove-video.php';
}