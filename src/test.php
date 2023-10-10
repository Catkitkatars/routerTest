<?php 

$sqlite3 = new SQLite3('database/main.db');

$date = new DateTime();

$toDay = $date->format('Y-m-d');

$createPostTable = "CREATE TABLE `posts` (
    `id` integer primary key AUTOINCREMENT,
    `name` text,
    `date` text,
    `user` text,
    `text` text 
)";

$addElem = "INSERT INTO `posts` (
    `name`, `date`, `user`, `text`) VALUES (
    'italian bell',
    '$toDay', 
    'peseniy',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste animi quis tempore ea sit accusamus fugiat obcaecati dicta eius repudiandae!'
)";


$selectAll = "SELECT * FROM `posts`";

// $sqlite3->query($createPostTable);
$result = $sqlite3->query($selectAll);

while($elem = $result->fetchArray(SQLITE3_ASSOC)){
    var_dump($elem);
    echo '<br><br>';
}


