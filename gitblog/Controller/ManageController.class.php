<?php
namespace gitblog\Controller;
use jsbyz\Controller;
class ManageController extends Controller {
    public function index() {
        $this->display();
    }

    /**
    * 获取检查结果
    * @return json
    */
    public function check() {
        $result = array('index'=>false,
            'post' => false);
        if(file_exists(C('THEME_PATH').'/index.html')){
            $result['index'] = true;
        }
        if(file_exists(C('THEME_PATH').'/post.html')) {
            $result['post'] = true;
        }
        $m = M('Post');
        $result['postlist'] = $m->getHomePost();
        echo json_encode($result);
    }

    public function generate() {
        $response = array(
            's' => false
            );
        if(isset($_GET['home'])) {

        } else {
            $id = $_GET['id'];
            $response['s'] = true;
        }
        echo json_encode($response);

    }
}