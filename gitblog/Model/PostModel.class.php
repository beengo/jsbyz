<?php
namespace gitblog\Model;
use jsbyz\Model;

class PostModel extends Model {
    public function getPostList() {
        $sql = "SELECT * FROM posts";
        return $this->query($sql);
    }

    public function updatePost($id,$title,$content,$cid) {
        $sql = "UPDATE posts SET title='{$title}',content='{$content}',cid='{$cid}' WHERE id={$id}";
        return $this->execute($sql);
    }

    public function addPost($title,$content,$cid) {
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO posts(title,content,posttime,cid) VALUES('{$title}','{$content}','{$date}','{$cid}')";
        return $this->execute($sql);
    }

    public function getPost($id) {
        $sql = "SELECT posts.id AS pid,title,content,cid,name FROM posts,category 
        WHERE posts.id='{$id}' AND posts.cid=category.id  LIMIT 1";
        return $this->query($sql);
    }

    public function getCategory() {
        return $this->query("SELECT * FROM category");
    }

    public function getHomePost() {
        $sql = "SELECT id,title FROM posts LIMIT 10";
        return $this->query($sql);
    }
}