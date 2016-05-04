<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0042)# -->
    <html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>个人中心</title>

    <!-- Bootstrap core CSS -->
    <link href="/thinkweb/Public/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/thinkweb/Public/home/css/index.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    
</head>
<body>

    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">侧栏</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/thinkweb">简书</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if(isset($index)): ?><li class="active" id="index"><a href="/thinkweb">主页</a></li>
              <?php else: ?>
              <li id="index"><a href="/thinkweb">主页</a></li><?php endif; ?>
            <li id="about"><a href="/thinkweb/index.php/Home/index/about">关于</a></li>
            <li id="contact"><a href="#contact">联系</a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><img src="/thinkweb/Public/home/imgs/tx.jpg" alt="头像" class="img-circle" style="width: 50px;height: 50px;"></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id='logined'><?php echo (session('logined')); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="/thinkweb/index.php/Home/user/userInfo" title="">个人中心</a></li>
              <li><a href="#" title="">发布文章</a></li>
              <li><a href="#" title="">我的文章</a></li>
              <li><a href="#" title="">帮助</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/thinkweb/index.php/Home/user/logout" title="">注销</a></li>
          </ul>
        </li>
      </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->


<div class="container">
<div class="row row-offcanvas row-offcanvas-right">
    
    <div class="col-xs-12 col-sm-12" >
        <div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#baseInfo" aria-controls="baseInfo" role="tab" data-toggle="tab">基本信息</a></li>
            <li role="presentation"><a href="#msgInfo" aria-controls="msgInfo" role="tab" data-toggle="tab">留言信息</a></li>
            <li role="presentation"><a href="#sysInfo" aria-controls="sysInfo" role="tab" data-toggle="tab">系统消息</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">设置</a></li>
          </ul>
          <!-- Tab panes -->

<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="baseInfo">
    <div class="panel panel-default">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <td>用户名:</td>
                    <td>付立</td>
                </tr>
                <tr>
                    <td>电子邮件</td>
                    <td>674310383@qq.com</td>
                </tr>
                <tr>
                    <td>生日</td>
                    <td>1994/09/21</td>
                </tr>
                <tr>
                    <td>性别</td>
                    <td>男生</td>
                </tr>
                <tr>
                    <td>文章数量</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>登陆次数</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>上次登录时间</td>
                    <td>2016-05-03 16:05:33</td>
                </tr>
                <tr>
                    <td>上次登录IP</td>
                    <td>127.0.0.1</td>
                </tr>
                <tr>
                    <td>加入时间</td>
                    <td>2016-05-03 16:05:33</td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>

  <div role="tabpanel" class="tab-pane fade" id="msgInfo">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">我的留言</div>
      <!-- Table -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>文章名</th>
                    <th>留言详情</th>
                    <th>留言时间</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>留言详情</td>
                    <td>留言详情</td>
                    <td>留言详情</td>

                </tr>
                <tr>
                    <td>奋斗奋斗</td>
                    <td>奋斗奋斗</td>
                    <td>奋斗奋斗</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">我的回复</div>
      <!-- Table -->
      <div class="table-responsive">
         <table class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <th>用户ID</th>
                    <th>回复详情</th>
                    <th>回复时间</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>留言详情</td>
                    <td>留言详情</td>
                    <td>留言详情</td>

                </tr>
                <tr>
                    <td>奋斗奋斗</td>
                    <td>奋斗奋斗</td>
                    <td>奋斗奋斗</td>
                </tr>
            </tbody>
        </table>         
      </div>

    </div>
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">回复我的</div>
      <!-- Table -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>回复者</th>
                    <th>回复详情</th>
                    <th>回复时间</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>留言详情</td>
                    <td>留言详情</td>
                    <td>留言详情</td>

                </tr>
                <tr>
                    <td>奋斗奋斗</td>
                    <td>奋斗奋斗</td>
                    <td>奋斗奋斗</td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>

  <div role="tabpanel" class="tab-pane fade" id="sysInfo">
    <div class="panel panel-default">
      <!-- Table -->
      <table class="table">
        <tr>
            <td colspan="" rowspan="" headers="">用户名</td>
            <td colspan="" rowspan="" headers="">付立</td>
        </tr>
      </table>
    </div>
  </div>

  <div role="tabpanel" class="tab-pane fade" id="settings">
    <div class="panel panel-default">
      <!-- Table -->
      <table class="table">
        <tr>
            <td colspan="" rowspan="" headers="">用户名</td>
            <td colspan="" rowspan="" headers="">付立</td>
        </tr>
      </table>
    </div>
  </div>

</div>
        </div>
    </div>

    

</div>

</div>

      <footer>
        <hr>
        <p style="text-align: center;">&copy; Company 2014 <label style="float: right;"><a href="#top" title="">回到顶部 &nbsp; <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a></label></p>
      </footer>

<script src="/thinkweb/Public/home/js/jquery.min.js"></script>
<script src="/thinkweb/Public/home/js/bootstrap.min.js"></script>
<script src="/thinkweb/Public/home/js/offcanvas.js"></script>



</body>
</html>