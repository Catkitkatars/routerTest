<?php 
require __DIR__ . '/../../init.php';
require __DIR__ . '/../../vendor/autoload.php';


$id = $_GET['id'] ?? null;



if($id) {
    $post = new app\Post($GLOBALS['connect']->connect);

    $requestedPost = $post->getOnePost($id);

    echo ob_include(__DIR__ .'/edit.phtml', 
    [
        'id' => $id,
        'name' => $requestedPost['name'], 
        'date' => $requestedPost['date'], 
        'user' => $requestedPost['user'], 
        'text' => $requestedPost['text']
    ]);
}
else
{
    echo ob_include(__DIR__ .'/edit.phtml', 
    [
        'name' => '', 
        'text' => ''
    ]);
}


?>


