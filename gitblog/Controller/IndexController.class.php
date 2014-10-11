<?php 
namespace gitblog\Controller;
use jsbyz\Controller;

class IndexController extends Controller {
    /**
    * 列出所有文章
    */
    public function index() {
        $m = M('Post');
        $posts = $m->getPostList();
        $this->assign('posts',$posts);
        $this->display();
    }

    /**
    * 添加文章
    */
    public function addPost() {
        $m = M('Post');
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
             $this->assign('categorys',$m->getCategory());
            $this->display();
        } else {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $cid = $_POST['category'];
            $result = $m->addPost($title,$content,$cid);
            var_dump($result);
        }
    }

    /**
    * 编辑文章
    */
    public function  edit() {
        $m = M('Post');
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $post = $m->getPost($id);
            $this->assign('post',$post[0]);
            $this->assign('categorys',$m->getCategory());
            $this->display();
        } else {
            $postid = $_POST['postid'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $cid = $_POST['category'];
            $result = $m->updatePost($postid,$title,$content,$cid);
            var_dump($result);
        }
    }
}