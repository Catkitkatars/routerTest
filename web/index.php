<?php 
require __DIR__  . '/../src/init.php';
require __DIR__ . '/../src/vendor/autoload.php';


$uri = $_SERVER['REQUEST_URI'];

if(isset($_SERVER['QUERY_STRING'])) {
    $uri = str_replace('?'.$_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);
}


// $router = new app\Router([
//     '~^GET /$~' => 'main.php',
//     '~^(?<method>(GET|POST)) /(?<file>(?!main)[^/]+)$~' => '{file}.php',
//     '~^(?<method>(GET|POST)) /(?<file>(?!main)[^/]+)/(?<id>[^/]+)$~' => '{file}.php'
// ]);

$router = new app\Router([
    '~^/$~' => '/index.php', // Переход на index.php файл
    '~^/(?<module>[^/]+)$~' => '/{module}/index.php', // Запуск индекс файла в модуле
    '~^/(?<module>[^/]+)/edit$~' => '/{module}/edit.php', // Запуск edit файла в модуле
    '~^/(?<module>[^/]+)/send$~' => '/{module}/send.php', // Запуск edit файла в модуле
    '~^/(?<module>[^/]+)/delete$~' => '/{module}/delete.php', // Запуск edit файла в модуле
    '~^/(?<module>[^/]+)/(?<id>.+)$~' => '/{module}/id.php', // Запуск id файла в модуле
]);


[$path, $params] = $router->route($uri);

$checkPath = realpath($GLOBALS['config']['dir']['pages'] . $path);

if($checkPath) {
    require $checkPath;
}
else
{
    require $GLOBALS['config']['dir']['pages'] . '/404.php';
}


