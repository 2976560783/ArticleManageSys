<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0042)# -->
    <html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>关于</title>
    <!-- Bootstrap core CSS -->
    <link href="/Public/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/home/css/index.css" rel="stylesheet">
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
          <a class="navbar-brand" href="">简书</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if(isset($index)): ?><li class="active" id="index"><a href="/">主页</a></li>
              <?php else: ?>
              <li id="index"><a href="/">主页</a></li><?php endif; ?>
            <li id="about"><a href="/Home/index/about">关于</a></li>
            <li id="contact"><a href="#contact">联系</a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><img src="<?php echo (session('imgpath')); ?>" alt="头像" class="img-circle" style="width: 50px;height: 50px;"></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id='logined'><?php echo (session('logined')); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="/Home/user/userInfo" title="">个人中心</a></li>
              <li><a href="/Home/article/addArticle" title="">发布文章</a></li>
              <li><a href="/Home/article/myArticles" title="">我的文章</a></li>
              <li><a href="#" title="">帮助</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/Home/user/logout" title="">注销</a></li>
          </ul>
        </li>
      </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->


<div class="container">
<div class="row row-offcanvas row-offcanvas-right">
    
        <div class="col-xs-12 col-sm-12"  style="min-height: 540px;">
          <div class="panel panel-primary">
             <div class="panel-heading"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>&nbsp;关于/日志</div>
              <div class="panel-body">
                <blockquote>
                  <p>本页面作为日常开发日志记录</p>
                </blockquote>
                <p>
                  <dl class="dl-horizontal">
                    <?php if(is_array($logs)): $i = 0; $__LIST__ = $logs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?><dt><?php echo (date('Y-m-d',$log["time"])); ?></dt>
                    <dd class="text-info"><?php echo ($log["loginfo"]); ?></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                  </dl>
                </p>
                <hr>
            <?php if($_SESSION['logined']== 'Admin'): ?><div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                修改日志 <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" style="max-height: 250px;overflow:auto;">
                <?php if(is_array($logs)): $i = 0; $__LIST__ = $logs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?><li><a href="/Home/Index/editlog?time=<?php echo ($log["time"]); ?>"><?php echo (date('Y-m-d',$log["time"])); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
            <button type="button" style="float: right;"  data-toggle="modal" data-target="#log" class="btn btn-primary">添加日志</button><?php endif; ?>
              </div>
          </div>
        </div><!--/.col-xs-12.col-sm-9-->

<div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">添加日志</h4>
      </div>
      <form method="post" action="about">
      <div class="modal-body">
          <div class="form-group">
            <label for="message-text" class="control-label">描述:</label>
            <textarea class="form-control" id="message-text" style="resize: none;" rows="10" name="info" placeholder="添加日志信息" required=""></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-primary">提交</button>
      </div>
      </form>
    </div>
  </div>
</div>


    

</div>

</div>

      <footer>
        <hr>
        <p style="text-align: center;">&copy; Company 2014 <label style="float: right;"><a href="#top" title="">回到顶部 &nbsp; <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a></label></p>
      </footer>

<script src="/Public/home/js/jquery.min.js"></script>
<script src="/Public/home/js/bootstrap.min.js"></script>
<script src="/Public/home/js/offcanvas.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#index').removeClass('active');
        $('#about').addClass('active');
      });
    </script>
  

</body>
</html>