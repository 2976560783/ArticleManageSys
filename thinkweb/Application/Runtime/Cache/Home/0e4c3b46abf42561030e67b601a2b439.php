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
    
<link rel="stylesheet" href="/thinkweb/Public/home/css/simditor-markdown.css" media="screen" charset="utf-8" />
<link rel="stylesheet" type="text/css" href="/thinkweb/Public/home/css/simditor.css" />
<link rel="stylesheet" type="text/css" href="/thinkweb/Public/home/css/simditor-fullscreen.css" />
<style type="text/css" media="screen">
    .tags{
        margin-right: 20px;
    }
</style>

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
              <span class="input-group-addon" id="basic-addon1"  required="" maxlength="15">文章标题</span>
              <input type="text" class="form-control" id="title" placeholder="Title" aria-describedby="basic-addon1" name="title">
            </div> 
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"  required="" maxlength="100">文章概要</span>
              <input type="text" class="form-control" style="resize: none;" maxlength="255"  placeholder="Summary" name="summary" id="summary">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1" >封面图片</span>
              <input type="text" class="form-control" placeholder="Cover Image" aria-describedby="basic-addon1" name="cover" maxlength="200">
            </div>
            <textarea id="editor" class="content" class="form-control" placeholder="Content" autofocus name="content" required=""></textarea>
            <p class="text-warning">图片附件提示：暂不支持动态上传图片附件。但您可以将图片上传至网络，复制其网络地址，以链接地址的形式添加到封面或正文图片。</p>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1" >Tag</span>&nbsp;&nbsp;

            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-default btn-sm active tags">
                <input type="radio" name="tag" value="0" autocomplete="on" checked> 未分类
              </label>
                <?php if(is_array($tags)): $k = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($k % 2 );++$k;?><label class="btn btn-default btn-sm  tags">
                    <input type="radio" name="tag" value="<?php echo ($k); ?>" autocomplete="off"> <?php echo ($tag); ?>
                  </label><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

            </div>
            <hr>
            <button type="button" class="btn btn-primary" onclick="javascript:history.back();">返回</button>
            <button type="submit" id="submit" class="btn btn-primary" name="artsubmit" style="float: right;">提交发布</button>
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

     $(function() {
      var editor = new Simditor({
        textarea: $('#editor'),
        markdown: true,
        toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment', '|', 'markdown']
      });
    });   
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#submit').click(function () {
         if ($('#title').val() == '') {
              alert('请填写标题');
              return false;
         }
         if ($('#summary').val() == '') {
              alert('请填写内容概要');
              return false;
         }
         if ($('#summary').val().length >70) {
            $('#summary').val($('#summary').val.substring(0,70));
         }
         if ($('.content').val() == '') {
              alert('请填写文章内容');
              return false;
         }
         return true;
      })
    });
  </script>


</body>
</html>