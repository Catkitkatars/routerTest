<?php 
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../init.php';


$id = $params['id'] ?? null;

$post = new app\Post($GLOBALS['connect']->connect);

$requestedPost = $post->getOnePost($id);

if($requestedPost) {
    echo ob_include(__DIR__ . '/post.phtml', [
        'id' => $requestedPost['id'],
        'postName' => $requestedPost['name'],
        'postDate' => $requestedPost['date'],
        'postCreatorName' => $requestedPost['user'],
        'postText' => $requestedPost['text'],
    ]); 
}
else 
{
    // header('location: /');
    require __DIR__ . '/../index.php';
}


