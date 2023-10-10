<?php 
require __DIR__ . '/../../init.php';
require __DIR__ . '/../../vendor/autoload.php';

$id = $_GET['id'] ?? null;

if($id) {
    $post = new app\Post($GLOBALS['connect']->connect);

    $post->delete($id);
    
    header('location: /');
    die();
}
else 
{
    header('location: /');
    die();
}