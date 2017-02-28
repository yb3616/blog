<?php
// 定义命名空间
namespace Blog\Controller;
// 引入分页类
use Think\Page;
// 声明类并继承父类控制器
class ManageController extends CommonController {
    // 对外被访问方法"catlist"
    public function catlist(){
        // 实例化模型
        $model = M('cat');
        // 查询数据
        $data  = $model -> field('name,art_number') -> limit(0,10) -> order('id desc') -> select();
        // 添加序号
        $length = count($data);
        for($i=0; $i<$length; $i++) {
            // 添加序号
            $data[$i]['id'] = $i+1;
        }
        // 分配二维数组
        $this -> assign('data', $data);
        // 展示模板
        $this -> display();
    }
    // 对外被访问方法"catadd"
    public function catadd(){
        // 判断有无POST数据
        if(IS_POST) {   // 提交数据
            // 获得数据
            $name = I('post.catname');
            // 判断"$name"是否为空
            if($name) { // 不为空
                // 整理数据
                $data['name'] = $name;
                $data['art_ids'] = '';
                // 实例化模型
                $model = M('cat');
                // 提交数据
                $result = $model -> data($data) -> add();
                if($result) {   // 成功
                    $this -> success('添加成功');
                } else {        // 失败
                    $this -> error('添加失败');
                }
            } else {    // 为空
                // 提示为空
                $this -> error('栏目名称不能为空');
            }
        } else {        // 默认显示
            // 展示模板
            $this -> display();
        }
    }
    // 对外被访问方法"artlist"
    public function artlist(){
        // 实例化数据库类模型
        $model = M();
        $count = $model -> table('blog_art') -> count();
        // 实例化分页类模型
        $page = new Page($count, 15);
        // 分页显示输出
        $show = $page -> show();
        // 联表查询数据
        $data = $model -> field('A.id,A.cre_date,A.title,B.name,A.ans_number,A.status') -> table('blog_art as A, blog_cat as B') -> where('A.cat_id = B.id') -> limit($page->firstRow.','.$page->listRows) -> order('A.id desc') -> select();
        // 添加排序,并截取标题
        $length = count($data);
        for($i=0; $i<$length; $i++){
            // 添加排序
            $data[$i]['t_id'] = $i+1;
            // 截取标题长度
            $temp = mb_substr($data[$i]['title'], 0, 20, 'utf-8');
            // 选择地添加'...'字符串
            if($temp != $data[$i]['title'])
                $temp .= '...';
            // 整理数组
            $data[$i]['title'] = $temp;
        }
        // 分配二维数组
        $this -> assign('data', $data);
        $this -> assign('pages', $show);
        // 展示模板
        $this -> display();
    }
    // 对外被访问方法"artadd"
    public function artadd(){
        // 判断有无POST数据
        if(IS_POST) {   // 提交数据
            $post = I('post.');
            // 若数据库设置默认时间，则无需生成
            $post['cre_date'] = date('Y-m-d');
            // 方便操作
            $id = I('post.cat_id');
            // 实例化模型
            $model = M('art');
            // 向数据库中添加数据
            $result = $model -> data($post) -> add();
            if($result) {
                // 更新"cat"表中的"art_number"字段
                $resu = M() -> table('blog_cat') -> where("id = $id") -> setInc('art_number');
                $this -> success('添加成功');
            } else {
                $this -> error('添加失败');
            }
        } else {        // 默认显示
            // 实例化模型
            $model = M('cat');
            // 获得数据
            $result = $model -> field('id,name') -> select();
            // 分配数组
            $this -> assign('data', $result);
            // 展示模板
            $this -> display();
        }
    }
    // 对外被访问方法"logout"
    public function logout(){
        // 清空"$_SESSION"
        session(null);
        // "$_SESSION"为空则跳转
        if(empty($_SESSION)) {
            // 跳转
            $this -> success('成功退出',U('Public/index'));
        }
    }
    // 显示/隐藏文章
    public function hide() {
        // 获得数据
        $data['status'] = I('get.status')?0:1;
        $where['id'] = intval(I('get.id'));
        // 实例化模型
        $model = M('art');
        // 更新数据
        $result = $model -> where($where) -> save($data);
        if($result) {
            $this -> success('数据更新成功');
        } else {
            $this -> error('数据更新失败');
        }
    }
}
