<?php 

namespace app;


class Post {

    private $connect;

    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function getAll() {
        $sql = "SELECT * FROM `posts`";
        $query = $this->connect->query($sql);
        $posts = [];
        while($post = $query->fetchArray(SQLITE3_ASSOC)) {
            $posts[] = $post;
        }
        return $posts;
    }
    public function getOnePost($id) {
        if(!$id) {
            return null;
        }
        $sql = "SELECT * FROM `posts` WHERE `id` = '$id'";
        $post = $this->connect->query($sql)->fetchArray(SQLITE3_ASSOC);
        
        return $post;
    }
    public function add($data):void {
        $name = $this->connect->escapeString($data['name']);
        $text = $this->connect->escapeString($data['text']);
        $user = $this->connect->escapeString($data['user']);
        $date = $this->connect->escapeString($data['date']);
        
        $sql = "INSERT INTO `posts` (
                `name`, `date`, `user`, `text`) 
                VALUES (
                '$name', '$date', '$user', '$text')";
        
        $this->connect->query($sql);
    }
    public function change($date):void {
        $id = $this->connect->escapeString($date['id']);
        $name = $this->connect->escapeString($date['name']);
        $text = $this->connect->escapeString($date['text']);

        $sql = "UPDATE `posts` 
                SET `name` = '$name', `text` = '$text'
                WHERE `id` = $id";
        $this->connect->query($sql);
    }
    public function delete($id):void {
        $id = $this->connect->escapeString($id);

        $sql = "DELETE FROM `posts` WHERE `id` = '$id'";

        $this->connect->query($sql);
    }
}