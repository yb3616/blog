<?php
// 定义命名空间
namespace Blog\Controller;
// 加载父类控制器
use Think\Controller;
// 声明类并继承父类控制器
class CommonController extends Controller {
    // thinkphp提供的构造方法
    public function _initialize(){
        $is_login = session('is_login');
        if(empty($is_login)) {
            $url = U('Public/login');
            echo "<script>top.location.href='$url'</script>";exit;
        }
    }
    /*
    public function _empty() {
        $this->display('Public/404');
        die;
    }
    */
}
