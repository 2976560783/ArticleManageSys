<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0042)# -->
    <html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    
  <title>主页</title>

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
        <li><img src="<?php echo (session('imgpath')); ?>" alt="头像" class="img-circle" style="width: 50px;height: 50px;"></li>
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
    
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">侧栏</button>
          </p>

        <div class="jumbotron" style="background-image: url('/thinkweb/Public/home/imgs/lunbo2.png');">
          <h1 class="text-primary">Master Password</h1>
          <p class="text-info"><small>一款跨平台且非常安全的密码管理工具</small></p>
          <p><a class="btn btn-primary " href="#" role="button">点击了解</a></p>
        </div>

          <div class="row">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lis): $mod = ($i % 2 );++$i;?><div class="col-xs-6 col-lg-4">
              <a href="/thinkweb/index.php/Home/article/details?artid=<?php echo ($lis["id"]); ?>" class="htitle " ><h2 ><?php echo ($lis["title"]); ?></h2></a>
              <p style="height: 75px;text-indent: 15px" class="text-info index-summary"><?php echo ($lis["summary"]); ?></p>
             <a style="margin-right: 15%;" class="btn btn-info" href="/thinkweb/index.php/Home/article/details?artid=<?php echo ($lis["id"]); ?>" role="button">Details &raquo;</a><span  class="badge">H:<?php echo ($lis["hits"]); ?></span> <span  class="badge"><?php echo ($lis["tagname"]); ?></span>
            </div><!--/.col-xs-6.col-lg-4--><?php endforeach; endif; else: echo "" ;endif; ?>
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

    
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar1">
          <div class="list-group">
            <label class="list-group-item active"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> &nbsp;标签 <span class="badge">文章</span></label>
            <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="/thinkweb/index.php/Home/article/category?cat=<?php echo ($tag["tagname"]); ?>" class="list-group-item"><?php echo ($tag["tagname"]); ?><span class="badge"><?php echo ($tag["num"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
            <a href="/thinkweb/index.php/Home/article/category" class="list-group-item">全部<span class="badge"><?php echo ($count); ?></span></a>
            <br>
          <label class="list-group-item active"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp;时间线 <span class="badge">文章</span></label>
          <?php $__FOR_START_5038__=2016;$__FOR_END_5038__=2008;for($i=$__FOR_START_5038__;$i > $__FOR_END_5038__;$i+=-1){ ?><a href="#" class="list-group-item"><?php echo ($i); ?>  <span class="badge">4</span></a><?php } ?>
          </div>
        </div><!--/.sidebar-offcanvas-->
    
</div>

  <nav class="col-md-6 col-md-offset-3">
  <?php echo ($page); ?>
</nav>


</div>

      <footer>
        <hr>
        <p style="text-align: center;">&copy; Company 2014 <label style="float: right;"><a href="#top" title="">回到顶部 &nbsp; <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a></label></p>
      </footer>

<script src="/thinkweb/Public/home/js/jquery.min.js"></script>
<script src="/thinkweb/Public/home/js/bootstrap.min.js"></script>
<script src="/thinkweb/Public/home/js/offcanvas.js"></script>

    <script src="/thinkweb/Public/home/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/thinkweb/Public/home/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript"> 
      $(document).ready(function() {
        var summary;
         $('.index-summary').each(function () {
            summary = $(this).text();
            if (summary.length > 70) {
              $(this).text(summary.substring(0,70)+'...');
            }
         })
        
      });
    </script>


</body>
</html>