<?php

$request = strtok($_SERVER["REQUEST_URI"], '?');

switch ($request) {

    case '/getanswer':
        require __DIR__ . '/getanswer.php';
        break;

    case '/':
        require __DIR__ . '/home.php';
        break;

    default:
        header('Location: http://localaichat');
        break;
}