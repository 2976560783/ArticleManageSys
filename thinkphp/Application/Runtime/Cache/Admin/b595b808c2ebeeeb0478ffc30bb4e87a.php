<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/thinkphp/Public/js/adminManage.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="/thinkphp/Public/css/adminIndex.css">
</head>
<body>
    <div class="top">
        <span><?php echo ($title); ?></span>
        <p>当前管理员,<b><?php echo ($userName); ?></b></p>
    </div>
    <hr>
    <div class="main">
            <div class="main">
        <div class="btn-group-vertical" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  类别管理
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">查看内容分类</a></li>
                  <li><a href="#">查看剧情分类</a></li>
                </ul>
             </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  视频管理
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">查看全部</a></li>
                  <li><a href="/thinkphp/admin/video/addVideo">新增视频</a></li>
                </ul>
             </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  音频管理
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">查看全部</a></li>
                  <li><a href="#">新增音频</a></li>
                </ul>
             </div>
             <button type="button" class="logout"><a href="/thinkphp/admin/user/logout" title="">退出登录</a></button>
        </div>
    </div>  


    </div>
</body>
</html>