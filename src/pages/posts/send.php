<?php 

require __DIR__ . '/../../init.php';
require __DIR__ . '/../../vendor/autoload.php';

$id = $_GET['id'] ?? null;
$data = $_POST;

$post = new app\Post($GLOBALS['connect']->connect);

if($id) {
    $data['id'] = $id;

    $post->change($data);
    header('location: /');
    die();
}
else
{
    $date = new DateTime();

    $data['user'] = 'peseniy';
    $data['date'] = $date->format('Y-m-d');


    $post->add($data);
    header('location: /');
    die();
}