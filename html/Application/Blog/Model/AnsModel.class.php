<?php
// 声明命名空间
namespace Blog\Model;
// 引入父类模型
use Think\Model;
// 声明类并继承父类模型
class AnsModel extends Model{
    // 定义自动验证规则
    protected $_validate = array(
          array('username' ,'require'   ,'用户名必须')
        , array('email'    ,'email'     ,'E-Mail格式错误')
        , array('comment'  ,'require'   ,'请填写评论')
    );
}
