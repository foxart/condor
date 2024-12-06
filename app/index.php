<?php

use common\RouterHandler;

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
function debug(mixed $data, string $class = 'debug'): void
{
    echo "<pre class='$class'>";
    print_r($data);
    echo "</pre>";
}

function debugException(Throwable $e): void
{
    debug([
        'message' => $e->getMessage(),
        'code' => $e->getCode(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
    ], 'error');
}

$routerHandler = new RouterHandler(__DIR__ . '/index.tpl');
$routerHandler->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
