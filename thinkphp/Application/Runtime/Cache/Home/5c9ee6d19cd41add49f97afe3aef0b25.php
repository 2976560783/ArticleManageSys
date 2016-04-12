<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=1, user-scalable=no">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/thinkphp/Public/css/index.css">
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="header">
         <span><a href="#" title="">资料下载</a></span>
         <span><a href="#" title="">设为首页</a></span>
         <span><a href="#" title="">加入收藏</a></span>
    </div>
    <div class="top">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/thinkphp/">西华师大</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">推荐 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">排行榜</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">栏目列表 <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">动画</a></li>
                    <li><a href="#">电影</a></li>
                    <li><a href="#">番剧</a></li>
                    <li><a href="#">音乐</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">没有了</a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
              </form>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">关于</a></li>
                <?php if($logined == 'true'): ?><li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($userName); ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">我的主页</a></li>
                    <li><a href="#">我的等级</a></li>
                    <li><a href="#">个人设置</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href='/thinkphp/index.php/Home/user/logout'>登出</a></li>
                  </ul>
                </li>
                <?php else: ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">游客请登录 </a>
                  </li><?php endif; ?>
              </ul>
            </div>
          </div>
        </nav>
    </div>
    <div id="content">
      <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>登陆</title>
    <link rel="stylesheet" href="/thinkphp/Public/css/login.css">
    <script type="text/javascript" src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
    <script src="/thinkphp/Public/js/logcheck.js" type="text/javascript" charset="utf-8" ></script>
</head>
<body style="height: auto;">
    <div id="container">
        <h1>登陆信息</h1>
        <hr>
        <div id="logInfo">
            <form action="login" method="post" accept-charset="utf-8">
                 <input type="text" class="userName" id="userName" name="userName" autofocus="" value="" placeholder="输入用户名" required="">
                <input type="password" class="password" id="password" name="password" value="" placeholder="输入用户密码" required="">
                <input type="text" name="code" id="code" value="" placeholder="输入下方验证码" required="">
                <img class="code" src="captche" alt="验证码">&nbsp;<span>看不清?点一下,换一张!</span>
                <input type="submit" class="submit" name="logInfo" value="登陆">
                <a href="#" class="forgpwd" title="忘记密码">忘记密码</a>
                <a href="register.html" class="gologin" title="">没有账号？前往注册</a>
            </form>
        </div>
    </div>

</body>
</html>


    </div>
    <div class="footer">
        <h1 >这是一个<abbr title="如果细心的你看到这里,说明。。。。并没有什么暖用！！！" class="initialism">网站</abbr>的底部 <a href="#" title="">点我回顶部</a></h1>

        
    </div>

</body>
</html>