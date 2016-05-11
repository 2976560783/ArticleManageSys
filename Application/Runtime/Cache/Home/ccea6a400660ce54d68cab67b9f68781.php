<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0042)# -->
    <html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>欢迎页</title>
    <!-- Bootstrap core CSS -->
    <link href="/thinkphp/Public/home/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    
  <style type="text/css" media="screen">
   body{
    background-color: #777777;
   }
  </style>

</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">简书</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav" style="float: right;">
           <li class="active"><a href="#">欢迎</a></li>
            <li><a href="#login"  data-toggle="modal">登陆</a></li>
            <li><a href="#register" data-toggle="modal">注册</a></li>
            <li><a href="#about"  data-toggle="modal">关于</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    

<br>
<br>
<br>
<br>
<br><div style="">
    <div class="container theme-showcase" role="main" style="">
    <div class="jumbotron">
      <h2>知乎 - 与世界分享你的知识、经验和见解</h2>
      <p>一个真实的网络问答社区，帮助你寻找答案，分享知识。  知乎 与世界分享你的知识、经验和见解.</p>
      <p style="text-align: right;"><a  class="btn btn-primary btn-lg" href="#login"  data-toggle="modal" role="button">立刻前往</a></p>
    </div>
</div>

  </div>



            <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">注册</h4>
                  </div>
                  <form  action="#" method="post" accept-charset="utf-8">
                  <div class="modal-body">

                        <div class="form-group">
                          <label for="exampleInputEmail1">用户名</label>
                          <input type="text" class="form-control" id="reg_userName" placeholder="UserName" required="" maxlength="20"  data-container="body" data-toggle="popover" data-placement="top" data-content="fdfddf">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">电子邮箱</label>
                          <input type="email" class="form-control" id="email" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">密码</label>
                          <input type="password" class="form-control" id="reg_password" placeholder="Password" required="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">密码确认</label>
                          <input type="password" class="form-control" id="confirmPwd" placeholder="Confirm password" required="">
                        </div>
                        <div class="form-group">
                          <label for="avatar">上传头像</label>
                          <input type="file" id="avatar">
                          <p class="help-block">图片文件不能过大,展示效果:50*50.</p>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> 记住我
                          </label>
                        </div>
                      
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" id="reg" class="btn btn-primary">提交信息</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">登陆</h4>
                  </div>
                  <form action="#" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">邮箱地址:</label>
                        <input type="email" class="form-control" id="recipient-name" placeholder="UserName">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="control-label">密码:</label>
                        <input type="password" class="form-control" id="recipient-name" placeholder="password">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="control-label">验证码:</label>
                        <input type="password" class="form-control" id="recipient-name" placeholder="Verification code">
                      </div>
                      <img src="" alt="验证码" style="width: 150px;height: 70px;">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default"  style="float: left;"><a href="#" title="忘记密码">忘记密码</a></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">登入</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">关于</h4>
                  </div>
                 
                  <div class="modal-body">
                        这是关于页面
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                  </div>
                </div>
              </div>
            </div>

<script src="/thinkphp/Public/home/js/jquery.min.js"></script>
<script src="/thinkphp/Public/home/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#reg_userName').focus(function () {
       $(this).popover('show');
    })
    $('#reg_userName').blur(function () {
       $(this).popover('hide');
    })
      $('#reg').click(function () {
         var pwd = $('#reg_password') .val();
         var rpwd  = $('#confirmPwd') .val();
         if (pwd != rpwd) {
          alert('no');
          return false;
         }
      })
    });
</script>


</body>
</html>