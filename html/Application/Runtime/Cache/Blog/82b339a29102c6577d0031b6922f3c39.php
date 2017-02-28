<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>栏目列表</title>
<link rel="stylesheet" href="/Public/Blog/css/reset.css">
<link rel="stylesheet" href="/Public/Blog/css/adm.css">
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
            <table>
                <tr>
                    <td>序号</td>
                    <td>栏目名称</td>
                    <td>文章</td>
                    
                </tr>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["id"]); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><span class="badge"><?php echo ($vo["art_number"]); ?></span></td>
                    
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
    </div>
    <footer>
Email: 285554318@qq.com&nbsp;&nbsp;&nbsp;&nbsp;Tel: 13757205037
</footer>

</body>
</html>