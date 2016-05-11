<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0042)# -->
    <html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>我的文章</title>
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
              <li><a href="/thinkweb/index.php/Home/article/addArticle" title="">发布文章</a></li>
              <li><a href="/thinkweb/index.php/Home/article/myArticles" title="">我的文章</a></li>
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
    
    <div class="panel panel-info">
      <div class="panel-heading">我的文章</div>
      <div class="panel-body">
        <table  class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Ordinal</th>
                <th>Title</th>
                <th>Tag</th>
                <th>Time</th>
                <th>Hits</th>
                <th>Likes</th>
                <th>Operations</th>
            </tr>
        </thead>
            <tbody>
                <?php if(is_array($myarts)): $key = 0; $__LIST__ = $myarts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$myart): $mod = ($key % 2 );++$key;?><tr>
                    <td><?php echo ($key + $order); ?></td>
                    <td><?php echo ($myart["title"]); ?></td>
                    <td><?php echo ($myart["tagname"]); ?></td>
                    <td><?php echo (date("Y-m-d H:s:s",$myart["time"])); ?></td>
                    <td><?php echo ($myart["hits"]); ?></td>
                    <td><?php echo ($myart["likes"]); ?></td>
                    <td><a type="button" class="btn btn-warning  btn-xs" href="/thinkweb/index.php/Home/Article/editArticle?aid=<?php echo ($myart["aid"]); ?>">编辑</a>&nbsp;&nbsp;
                        <a type="button" class="btn btn-danger  btn-xs" href="/thinkweb/index.php/Home/Article/deleteArticle?aid=<?php echo ($myart["aid"]); ?>" onclick="javescript:return confirm('确认删除这篇文章?')">删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
      </div>
    </div>

    

</div>

  <nav class="col-md-6 col-md-offset-5">
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



</body>
</html>