<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-cn" xml:lang="zh-cn">
<head>
    <title>多用户留言系统</title>
    <link rel="stylesheet" type="text/css" href="/M-Msg/Public/css/moodle.css" />
    <link rel="stylesheet" type="text/css" href="/M-Msg/Public/css/moodle2.css" />
    <script type="text/javascript" src="/M-Msg/Public/script.js"></script>
</head>
 
<body  class="login course-1 notloggedin dir-ltr lang-zh_cn_utf8" id="login-index"> 
    <div id="page">
        <div id="header" class="clearfix"> 
            <h1 class="headermain">多用户留言系统</h1> 
            <div class="headermenu">
                <div class="logininfo">
                <?php if(isset($_SESSION['loginedUser'])): ?>欢迎您，<?php echo (session('loginedUser')); ?>！ | <a href="/user/logout">注销</a>
                <?php else: ?>
                    您尚未登录(<a  href='/user/login/'>登录</a>)&nbsp;
                    还没有用户名(<a href='/user/register/'>注册</a>)<?php endif; ?>
                </div>
            </div> 
        </div>      

        <!-- 面包屑（即“留言板->登录”之类的内容）-->
        <div class="navbar clearfix"> 
            <div class="breadcrumb"> 
                <ul> 
                    <li class="first"><a href="/">多用户留言系统</a></li>
                    <li> <span class="arrow sep">&#x25BA;</span> <?php echo ($view_title); ?> </li>
                </ul>
            </div>          
        </div> 

        <!-- START OF CONTENT --> 
        <div id="content">
            
        </div> 
        <!-- END OF CONTENT --> 

        
        <!-- START OF FOOTER -->
        <div id="footer">
            &copy;2015 <a href="http://www.maiziedu.com/">麦子学院</a><br />
        </div>
        <!-- END OF FOOTER -->
    </div>
</body>
</html>