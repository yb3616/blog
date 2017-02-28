<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章列表</title>
<link rel="stylesheet" href="/Public/Blog/css/reset.css">
<link rel="stylesheet" href="/Public/Blog/css/adm.css">
<link rel="stylesheet" href="/Public/Blog/plugin/layer/skin/default/layer.css">
<script src='/Public/Blog/js/jquery.js'></script>
<script src="/Public/Blog/plugin/layer/layer.js"></script>
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
                    <td>日期</td>
                    <td>标题</td>
                    <td>分类</td>
                    <td>回复</td>
                    <td>状态</td>
                </tr>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["t_id"]); ?></td>
                    <td><?php echo ($vo["cre_date"]); ?></td>
                    <td><a href="/index.php/Public/art/id/<?php echo ($vo["id"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><span class="badge"><?php echo ($vo["ans_number"]); ?></span></td>
                    <td><a href="javascript:void(0);" onclick="layer.confirm('确认<?php if($vo["status"] == 1): ?>隐藏<?php else: ?>显示<?php endif; ?>操作？', {btn: ['确认','取消']}, function(){top.location.href='/index.php/Manage/hide/id/<?php echo ($vo["id"]); ?>/status/<?php echo ($vo["status"]); ?>'});"><?php switch($vo["status"]): case "1": ?>已发布<?php break;?>
                        <?php case "0": ?>已隐藏<?php break; endswitch;?></a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div id="pagebar"><?php echo ($pages); ?></div>
        </div>
    </div>
    <footer>
Email: 285554318@qq.com&nbsp;&nbsp;&nbsp;&nbsp;Tel: 13757205037
</footer>

</body>
</html>