<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布文章</title>
<link rel="stylesheet" href="/Public/Blog/css/reset.css">
<link rel="stylesheet" href="/Public/Blog/css/adm.css">

<script src='/Public/Blog/plugin/ue/ueditor.config.js'></script>
<script src='/Public/Blog/plugin/ue/ueditor.all.min.js'></script>
<script src='/Public/Blog/plugin/ue/lang/zh-cn/zh-cn.js'></script>
</head>
<body>
    <header>
    <h1>博客后台管理界面</h1>
</header>

    <div id="main">
        <div id="lside">
    <aside>
        <h4>栏目管理</h4>
        <ul>
            <li><a href="/index.php/Manage/catlist">栏目列表</a></li>
            <li><a href="/index.php/Manage/catadd">添加栏目</a></li>
        </ul>
    </aside>
    <aside>
        <h4>文章管理</h4>
        <ul>
            <li><a href="/index.php/Manage/artlist">文章列表</a></li>
            <li><a href="/index.php/Manage/artadd">发布文章</a></li>
        </ul>
    </aside>
    <aside>
        <h4>个人中心</h4>
        <ul>
            
            <li><a href="/index.php/Manage/logout">退出登陆</a></li>
        </ul>
    </aside>
</div>

        <div id="rside">
            <form action="" method="post">
                <div class="form-group">
                    <label>标题:</label>
                    <p>
                        <input type="text" name="title">
                    </p>
                </div>
                <div class="form-group">
                    <label>栏目:</label>
                    <p>
                        <select name="cat_id">
                            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </p>
                </div>
                <div class="form-group">
                    <label >内容:</label>
                    <p><script id="editor" name="content" type="text/plain" style="width:518px;height:300px;"></script></p>
                </div>
                
                <div class="form-group">
                    <label>&nbsp;</label>
                    <p>
                        <button type="submit">提交</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
<script>
var ue = UE.getEditor('editor');
</script>
    <footer>
Email: 285554318@qq.com&nbsp;&nbsp;&nbsp;&nbsp;Tel: 13757205037
</footer>

</body>
</html>