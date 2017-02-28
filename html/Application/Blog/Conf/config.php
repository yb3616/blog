<?php
return array(
    //'配置项'=>'配置值'

    // 自定义模板常量
    'TMPL_PARSE_STRING' => array(
        '__BLOG__' => '/Public/Blog',
    ),

    // 当前绑定的控制器
    'DEFAULT_CONTROLLER' => 'Public',

    'SHOW_PAGE_TRACE' => false, // 显示页面Trace信息

    // 默认错误跳转对应的模板文件
    'TMPL_ACTION_ERROR'     =>  MODULE_PATH.'View/Public/error.html',
    // 默认成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  MODULE_PATH.'View/Public/success.html',
    // 异常页面的模板文件
    'TMPL_EXCEPTION_FILE'   =>  MODULE_PATH.'View/Public/exception.html',

    //数据库配置信息
    // 数据库类型
    'DB_TYPE'   => 'mysql',
    // 服务器地址
    'DB_HOST'   => 'localhost',
    // 数据库名
    'DB_NAME'   => 'db_blog',
    // 用户名
    'DB_USER'   => 'blog',
    // 密码
    'DB_PWD'    => 'blog123',
    // 端口
    'DB_PORT'   => 3306,
    // 数据库表前缀 
    'DB_PREFIX' => 'blog_',
    // 字符集
    'DB_CHARSET'=> 'utf8',
    // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    'DB_DEBUG'  =>  FALSE
);
