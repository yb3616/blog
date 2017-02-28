<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($data["title"]); ?></title>
<link rel="stylesheet" href="/Public/Blog/css/reset.css">
<link rel="stylesheet" href="/Public/Blog/css/index.css">
<link rel="stylesheet" href="/Public/Blog/css/art.css">

<link rel="stylesheet" href="/Public/Blog/plugin/ue/third-party/SyntaxHighlighter/shCoreDefault.css">
<script src="/Public/Blog/plugin/ue/third-party/SyntaxHighlighter/shCore.js"></script>
<script>SyntaxHighlighter.all();</script>
<link rel="stylesheet" href="/Public/Blog/plugin/layer/skin/default/layer.css">
<script src="/Public/Blog/js/jquery.js"></script>
<script src="/Public/Blog/plugin/layer/layer.js"></script>
</head>
<body>
    <header>
    <h1>姚斌的个人博客</h1>
    <h4>求收留!!</h4>
</header>
<nav>
    <ul>
        <li><a href="/index.php/Public/index">首页</a></li>
        <?php if(is_array($line)): $i = 0; $__LIST__ = $line;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Public/index/catid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</nav>

    <div id="main">
        <div id="lside">
            <article>
                <h2><a href="javascript:void(0);"><?php echo ((isset($data["title"]) && ($data["title"] !== ""))?($data["title"]):'该文章已删除'); ?></a></h2>
                <div class="entry_header">
                    <time><?php echo ((isset($data["cre_date"]) && ($data["cre_date"] !== ""))?($data["cre_date"]):'NULL'); ?></time>
                    by
                    <a href="javascript:void(0);">姚斌</a>
                    <a class="catlink" href="/index.php/Public/index/catid/<?php echo ($data["id"]); ?>"><?php echo ((isset($data["name"]) && ($data["name"] !== ""))?($data["name"]):'NULL'); ?></a>
                    <a class="comment" href="#comments"><?php echo ((isset($data["ans_number"]) && ($data["ans_number"] !== ""))?($data["ans_number"]):'NULL'); ?>条评论</a>
                </div>
                <div class="entry_content"><?php echo ((isset($data["content"]) && ($data["content"] !== ""))?($data["content"]):'NULL'); ?></div>
            </article>
            <div id="comments">
            <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ol>
                    <li>
                        <img src="/Public/Blog/img/icon_head.png" alt="">
                        <cite><a href="javascript:void(0);" onclick="layer.tips('E-mail:&nbsp;&nbsp;<?php echo ($vo["email"]); ?>', this, {tips:[1, '#3595cc'],time: 4000});"><?php echo ($vo["name"]); ?></a></cite> <br>
                        <time><?php echo ($vo["cre_time"]); ?></time>
                    </li>
                    <li><?php echo ($vo["content"]); ?></li>
                </ol><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div id="respond" class="comment-respond">
                <h3>Leave a Comment</h3>
                <form action="/index.php/Public/comment" method="post">
                <p>
                    <input placeholder="your name" name="name" type="text" value="" size="30">
                </p>
                <p>
                    <input placeholder="Email" name="email" type="text" value="" size="30">
                </p>
                <p>
                    <textarea name="content" cols="45" rows="8" aria-required="true"></textarea>
                </p>
                <input type="hidden" name="art_id" value="<?php echo ($id); ?>" />
                <p>
                    <input type="submit" value="Post Comment">
                </p>
                </form>
            </div>
        </div>
        <div id="rside">
    <aside>
        <input type="text" placeholder="Search..." id="search"/>
    </aside>

    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><aside>
        <h4><?php echo ($vo["name"]); ?></h4>
        <ul><?php if(is_array($vo["list"])): $i = 0; $__LIST__ = $vo["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Public/art/id/<?php echo ($vol["id"]); ?>"><?php echo ($vol["title"]); ?></a>&nbsp;(<?php echo ($vol["ans_number"]); ?>)</li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
    </aside><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
<script>
$('#search').keydown(function(e){
    if(e.keyCode == 13){
        top.location.href="/index.php/Public/index/title/"+this.value;
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