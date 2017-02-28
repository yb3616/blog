<?php
// 定义命名空间
namespace Blog\Controller;
// 加载父类控制器
use Think\Controller;
// 声明类并继承父类控制器
class BackController extends Controller {
    // 对外被访问方法"index"
    public function index(){
        /*
        $model = M('art');
        $data['id'] = 14;
        $data['title'] = '控制器中栏目列表方法的实现';
        dump($model -> data($data) -> save());
        */
    }
}
