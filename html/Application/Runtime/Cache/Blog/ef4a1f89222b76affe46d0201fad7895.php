<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php if(I('get.catid')): echo ($data["0"]["name"]); else: ?>首页<?php endif; ?></title>
<link rel="stylesheet" href="/Public/Blog/css/reset.css">
<link rel="stylesheet" href="/Public/Blog/css/index.css">

<link rel="stylesheet" href="/Public/Blog/plugin/ue/third-party/SyntaxHighlighter/shCoreDefault.css">
<script src="/Public/Blog/plugin/ue/third-party/SyntaxHighlighter/shCore.js"></script>
<script src="/Public/Blog/js/jquery.js"></script>
<style rel="stylesheet">
div.entry_content {
height: 180px;
overflow: hidden;
}
</style>
</head>
<body>
    <header>
    <h1>姚斌的个人博客</h1>
    <h4>求收留!!</h4>
</header>
<nav>
    <ul>
        <li><a href="/index.php/public/index">首页</a></li>
        <?php if(is_array($line)): $i = 0; $__LIST__ = $line;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php/public/index/catid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</nav>

    <div id="main">
        <div id="lside">
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><article>
                <h2><a href="/index.php/public/art/id/<?php echo ($vo["id"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></h2>
                <div class="entry_header">
                    <time><?php echo ($vo["cre_date"]); ?></time>
                    by
                    <a href="javascript:void(0);">姚斌</a>
                    <a class="catlink" href="/index.php/public/index/catid/<?php echo ($vo["cid"]); ?>"><?php echo ($vo["name"]); ?></a>
                    <a class="comment" href="/index.php/public/art/id/<?php echo ($vo["id"]); ?>#comments" target="_blank"><?php echo ($vo["ans_number"]); ?>条评论</a>
                </div>
                <div class="entry_content"><?php echo ($vo["content"]); ?></div>
            </article><?php endforeach; endif; else: echo "" ;endif; ?>
            <div id="pagebar"><?php echo ($pages); ?></div>
        </div>
        <div id="rside">
    <aside>
        <input type="text" placeholder="Search..." id="search"/>
    </aside>

    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><aside>
        <h4><?php echo ($vo["name"]); ?></h4>
        <ul><?php if(is_array($vo["list"])): $i = 0; $__LIST__ = $vo["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li><a href="/index.php/public/art/id/<?php echo ($vol["id"]); ?>"><?php echo ($vol["title"]); ?></a>&nbsp;(<?php echo ($vol["ans_number"]); ?>)</li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
    </aside><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
<script>
$('#search').keydown(function(e){
    if(e.keyCode == 13){
        top.location.href="/index.php/public/index/title/"+this.value;
    }
});
</script>

    </div>
    <footer>
Email: 285554318@qq.com&nbsp;&nbsp;&nbsp;&nbsp;Tel: 13757205037
</footer>

<script>
$(function(){
    SyntaxHighlighter.highlight();
    $("table.syntaxhighlighter").each(function () {
        if (!$(this).hasClass("nogutter")) {
            var $gutter = $($(this).find(".gutter")[0]);
            var $codeLines = $($(this).find(".code .line"));
            $gutter.find(".line").each(function (i) {
                $(this).height($($codeLines[i]).height());
                $($codeLines[i]).height($($codeLines[i]).height());
            });
        }
    });
});
</script>
</body>
</html>