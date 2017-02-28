<?php
// 定义命名空间
namespace Blog\Controller;
// 引入控制器
use Think\Controller;
// 继承父类控制器
class PublicController extends Controller {
    // 对外访问方法"index"
    public function index(){
        // 实例化模型
        $model = M();
        // 获得总数
        $catid = I('get.catid');
        // 将类似"%5D%2D%1C"的字符转义成正确的中文字符
        $title = urldecode(I('get.title'));
        if($catid) {        // 按分类展示数据
            // 计算总条数
            $count = $model -> table('blog_art') -> where('status=1 and cat_id='.$catid) -> count();
        } else if($title) { // 按标题展示数据
            // 计算总条数
            $map['title'] = array('like', '%'.$title.'%');
            $map['status'] = 1;
            $count = $model -> table('blog_art') -> where($map) -> count();
        } else {            //  按"id"展示数据
            // 计算总条数
            $count = $model -> table('blog_art') -> where('status=1') -> count();
        }
        // 实例化分页类
        $page = new \Think\Page($count, 4);
        // 分页显示输出
        $show = $page -> show();
        // 查询结果
        if($catid) {        // 若GET到"catid"变量
            // 查询相应的数据
            $result = $model -> field('A.id,A.cre_date,A.title,A.content,B.name,B.id as cid,A.ans_number') -> table('blog_art as A,blog_cat as B') -> where('A.cat_id = B.id and A.cat_id='.$catid.' and A.status=1') -> limit($page->firstRow.','.$page->listRows) -> order('A.id desc') -> select();
        } else if($title) { // 若GET到"title"变量
            // 查询符合的数据
            $map['title'] = array('like', '%'.$title.'%');
            $map['status'] = 1;
            $result = $model -> table('blog_art') -> where($map) -> limit($page->firstRow.','.$page->listRows) -> order('id desc') -> select();
        } else {            // 若无以上变量
            // 查询相应的数据
            $result = $model -> field('A.id,A.cre_date,A.title,A.content,B.name,B.id as cid,A.ans_number') -> table('blog_art as A,blog_cat as B') -> where('A.cat_id = B.id and A.status=1') -> limit($page->firstRow.','.$page->listRows) -> order('A.id desc') -> select();
        }
        // 分割内容字符串
        /*
        $length = count($result);
        for($i=0; $i<$length; $i++) {
            $temp = mb_substr($result[$i]['content'],0,500,'utf-8');
            if($temp != $result[$i]['content']) {
                $temp .= '...';
            }
            $result[$i]['content'] = $temp;
        }
        */
        foreach($result as &$value) {
            $value['content'] = htmlspecialchars_decode($value['content']);
        }
        // 获得导航栏
        $line = $model -> field('name,id') -> table('blog_cat') -> select();
        // 获得标题列表
        $list = $model -> field('name, id') -> table('blog_cat') -> select();
        $len = count($list);
        for($i=0; $i<$len; $i++) {
            $list[$i]['list'] = $model -> field('title,id,ans_number') -> table('blog_art') -> where('status=1 and cat_id='.$list[$i]['id']) -> select();
            // 限定字串长度
            $length = count($list[$i]['list']);
            for($j=0; $j<$length; $j++){
                $temp = mb_substr($list[$i]['list'][$j]['title'],0,10,'utf-8');
                if($temp != $list[$i]['list'][$j]['title'])
                    $temp .= '...';
                $list[$i]['list'][$j]['title'] = $temp;
            }
        }
        // 分配模板变量
        $this -> assign('list', $list);
        $this -> assign('line', $line);
        $this -> assign('data', $result);
        $this -> assign('pages', $show);
        $this -> display();
    }
    // 对外访问方法"art"
    public function art(){
        // 保存"$id"
        $id = I('get.id');
        if(!$id) {  // 若"$id"为空，则报错
            $this -> error('无效ID',U('Public/index'));
        } else {    // 否则就往下执行
            // 实例化模型
            $model = M();
            // 联表查询
            // 管理员可见隐藏表
            if(!session('is_login')) {
                $where = ' AND A.status = 1';
            }
            $result = $model -> field('A.cre_date,A.title,A.content,B.id,B.name,A.ans_number') -> table('blog_art as A,blog_cat as B') -> where('A.cat_id = B.id AND A.id = '.$id.$where) -> find();
            $result['content'] = htmlspecialchars_decode($result['content']);
            // 获得导航栏
            $line = $model -> field('name,id') -> table('blog_cat') -> select();
            // 获得评论
            $comment = $model -> field('email, name, content, cre_time') -> table('blog_ans') -> where('art_id='.$id) -> select();
            // 获得标题列表
            $list = $model -> field('name, id') -> table('blog_cat') -> select();
            $len = count($list);
            for($i=0; $i<$len; $i++) {
                $list[$i]['list'] = $model -> field('title,id,ans_number') -> table('blog_art') -> where('status=1 and cat_id='.$list[$i]['id']) -> select();
                // 限定字串长度
                $length = count($list[$i]['list']);
                for($j=0; $j<$length; $j++){
                    $temp = mb_substr($list[$i]['list'][$j]['title'],0,10,'utf-8');
                    if($temp != $list[$i]['list'][$j]['title'])
                        $temp .= '...';
                    $list[$i]['list'][$j]['title'] = $temp;
                }
            }
            // 分配模板变量
            $this -> assign('line', $line);
            $this -> assign('data',$result);
            $this -> assign('id', $id);
            $this -> assign('comment', $comment);
            $this -> assign('list', $list);
            // 展示模板
            $this -> display();
        }
    }
    // 对外访问方法"login"
    public function login(){
        if(IS_POST) {
            // 进行登录操作
            // 用户名、密码保存在文件中
            $user = 'admin_yb';
            $pasd = 'yaobin_123456.abc';
            // 检测验证码
            $verify = new \Think\Verify();
            if(!$verify->check(I('post.code'))){
                $this->error('验证码错误');
                die;
            }
            // 验证
            if(I('post.username')===$user && I('post.password')===$pasd) {
                session('is_login', '1');
                $this->success('登录成功',U('Manage/artlist'));
            } else {
                $this->error('登录失败');
            }
        } else {
            // 首次进入管理页面
            // 判断是否有已登录的"SESSION"
            if(session('is_login')) {
                // 直接跳转到后台管理页面
                $this->error('无需重复登录',U('Manage/artlist'));
            } else {
                // 展示模板
                $this->display();
            }
        }
    }
    // 提交评论
    public function comment() {
        // 实例化模型
        $model = D('Ans');
        // 自动验证
        if(!$model->create()){
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            $this -> error($model->getError());
        } else {
            // 验证通过
            // 入库
            $result = $model -> add();
            if($result) {
                // 更新 blog_art 表中的数据
                $model = M();
                $res = $model -> table('blog_art as A, blog_ans as B') -> where('A.id = '.I('post.art_id')) -> setInc('A.ans_number');
                if($res) {
                    $this -> success('评论成功');
                } else {
                    $this -> error('更新评论数失败');
                }
            } else {
                $this -> error('评论失败');
            }
        }
    }
    // 生成验证码
    public function code() {
        $verify = new \Think\Verify();
        $verify -> imageW = 317;
        $verify -> useImgBg = True;
        $verify -> entry();
    }
    // 空操作
    /*
    public function _empty() {
        $this->display('Public/404');
        die;
    }
    */
}
