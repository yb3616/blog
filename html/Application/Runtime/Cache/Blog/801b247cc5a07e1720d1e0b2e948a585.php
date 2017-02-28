<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
<link rel="stylesheet" href="/Public/Blog/css/reset.css">
<link rel="stylesheet" href="/Public/Blog/css/index.css">
<link rel="stylesheet" href="/Public/Blog/css/art.css">
<style>
form {
width:30%;
margin:0 auto;
}
</style>
</head>
<body>
    <header>
    <h1>博客后台管理界面</h1>
</header>

    <div id="main">
        <div id="respond" class="comment-respond">
            <form action="#" method="post">
                <p><input placeholder="用户名" name="username" type="text" value="" size="30"></p>
                <p><input placeholder="密&nbsp;&nbsp;&nbsp;码" name="password" type="text" value="" size="30"></p>
                <p><img src='/index.php/Public/code' onclick="this.src='/index.php/Public/code'" style="margin-bottom:10px;" /></p>
                <p><input placeholder="验证码" name="code" type="text" value="" size="30"></p>
                <p><input type="submit" value="登陆"></p>
            </form>
        </div>
    </div>
    <footer>
Email: 285554318@qq.com&nbsp;&nbsp;&nbsp;&nbsp;Tel: 13757205037
</footer>

</body>
</html>