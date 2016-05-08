<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0042)# -->
    <html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>发布文章</title>

    <!-- Bootstrap core CSS -->
    <link href="/thinkweb/Public/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/thinkweb/Public/home/css/index.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    
<link rel="stylesheet" type="text/css" href="/thinkweb/Public/home/css/simditor.css" />
<link rel="stylesheet" href="/thinkweb/Public/home/css/simditor-markdown.css" media="screen" charset="utf-8" />

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
    
    <div class="col-xs-12 col-sm-12">
        <form action="#" method="post" accept-charset="utf-8">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">文章标题</span>
              <input type="text" class="form-control" placeholder="Title" aria-describedby="basic-addon1">
            </div> 
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">文章概要</span>
              <textarea class="form-control" style="resize: none;" maxlength="255"  placeholder="Summary"></textarea>
            </div>
            <textarea id="editor" placeholder="Content" autofocus name="content"></textarea>
            <hr>
            <button type="button" class="btn btn-primary" onclick="javascript:history.back();">返回</button>
            <button type="submit" class="btn btn-primary" style="float: right;">提交发布</button>
        </form>
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

  <script type="text/javascript" src="/thinkweb/Public/home/js/module.js"></script>
  <script type="text/javascript" src="/thinkweb/Public/home/js/hotkeys.js"></script>
  <script type="text/javascript" src="/thinkweb/Public/home/js/uploader.js"></script>
  <script type="text/javascript" src="/thinkweb/Public/home/js/marked.js"></script>
  <script type="text/javascript" src="/thinkweb/Public/home/js/simditor.js"></script>
  <script type="text/javascript" src="/thinkweb/Public/home/js/to-markdown.js"></script>
  <script type="text/javascript" src="/thinkweb/Public/home/js/simditor-markdown.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
     $(function() {
      var editor = new Simditor({
        textarea: $('#editor'),
        markdown: true,
        toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment', '|', 'markdown']
      });
    });   
});
  </script>


</body>
</html>