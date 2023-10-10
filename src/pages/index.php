<?php 

$posts = new app\Post($GLOBALS['connect']->connect);

$allPosts = $posts->getAll();

$postHtml = '';

foreach($allPosts as $post) {
    $postHtml .= ob_include(__DIR__ . '/posts/post.phtml', [
        'id' => $post['id'],
        'postName' => $post['name'],
        'postDate' => $post['date'],
        'postCreatorName' => $post['user'],
        'postText' => $post['text'],
    ]);
}

echo ob_include(__DIR__ . '/main/main.phtml', ['posts' => $postHtml]);