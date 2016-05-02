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
    <link href="/thinkphp/Public/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/thinkphp/Public/home/css/index.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    
<link rel="stylesheet" type="text/css" href="/thinkphp/Public/home/css/category.css">

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
          <a class="navbar-brand" href="/thinkphp">简书</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if(isset($index)): ?><li class="active" id="index"><a href="/thinkphp">主页</a></li>
              <?php else: ?>
              <li id="index"><a href="/thinkphp">主页</a></li><?php endif; ?>
            <li id="about"><a href="/thinkphp/index.php/Home/index/about">关于</a></li>
            <li id="contact"><a href="#contact">联系</a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><img src="/thinkphp/Public/home/imgs/tx.jpg" alt="头像" class="img-circle" style="width: 50px;height: 50px;"></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo (session('logined')); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="#" title="">个人中心</a></li>
              <li><a href="#" title="">发布文章</a></li>
              <li><a href="#" title="">我的文章</a></li>
              <li><a href="#" title="">帮助</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/thinkphp/index.php/Home/user/logout" title="">注销</a></li>
          </ul>
        </li>
      </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->


<div class="container">
<div class="row row-offcanvas row-offcanvas-right">
    
<ol class="breadcrumb">
  <li><a href="/thinkphp">主页</a></li>
  <li><a href="/thinkphp/index.php/Home/Article/category">全部</a></li>
  <?php if($category): ?><li><a href="#"><?php echo ($category); ?></a></li><?php endif; ?>
</ol>
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">侧栏</button>
          </p>
<!--         <ul class="jumbotron" style="list-style: none;width:100%;height:100%;padding: 5px;min-height: 760px;">
            <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><hr>
            <li class="article-list" style="width:100%;height:125px;">
                <div class="col-md-10 col-sm-5" style="height: 100%" >
                    <p class="list-top" style="font-size: 10px;line-height: 20px;">
                            <a href="#" ><?php echo ($list["username"]); ?></a>
                            <em>·</em>
                            <span class="time" publish="<?php echo ($list["publish"]); ?>"></span>
                    </p>
                    <h4 class="title">
                        <a href="/thinkphp/index.php/Home/Article/details?artid=<?php echo ($list["id"]); ?>"><?php echo ($list["title"]); ?></a>
                    </h4>
                    <div class="list-footer">
                             <a href="/thinkphp/index.php/Home/Article/details?artid=<?php echo ($list["id"]); ?>"> 阅读 <?php echo ($list["hits"]); ?></a>
                             <span><em>·</em><?php echo ($list["tagname"]); ?></span>
                             <span><em>·</em> <span class="glyphicon glyphicon-heart like" aria-hidden="true" value='<?php echo ($list["id"]); ?>' id="like<?php echo ($list["id"]); ?>"><?php echo ($list["likes"]); ?></span></span>
                    </div>
                </div>
               <div class="col-md-2 col-sm-5" >
                 <a href="/thinkphp/index.php/Home/Article/details?artid=<?php echo ($list["id"]); ?>" title=""><img src="/thinkphp/Public/home/imgs/jianth.png" alt="..." class="img-rounded media-object" style="width: 100%;height: 100%;margin-top: 13%;"></a>
               </div>
            </li>


          <ul class="media-list">
            <li class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="..." alt="...">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                ...
              </div>
            </li>
          </ul><?php endforeach; endif; else: echo "" ;endif; ?>

           <?php if($lists == null): ?><p style="text-align: center;"><label>暂时没有此分类的文章,敬请期待!</label></p><?php endif; ?>
            <hr>
        </ul> -->
        <div class="panel panel-info">
          <div class="panel-heading"><?php echo ((isset($category) && ($category !== ""))?($category):'全部'); ?></div>
          <div class="panel-body">
              <ul class="media-list">
               <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li class="media">
                  <div class="media-body">
                    <p class="list-top" style="font-size: 10px;line-height: 20px;">
                            <a href="#" ><?php echo ($list["username"]); ?></a>
                            <em>·</em>
                            <span class="time" publish="<?php echo ($list["publish"]); ?>"></span>
                    </p>
                    <h4 class="title">
                        <a href="/thinkphp/index.php/Home/Article/details?artid=<?php echo ($list["id"]); ?>"><?php echo ($list["title"]); ?></a>
                    </h4>
                   <div class="list-footer">
                       <a href="/thinkphp/index.php/Home/Article/details?artid=<?php echo ($list["id"]); ?>"> 阅读 <?php echo ($list["hits"]); ?></a>
                       <span><em>·</em><?php echo ($list["tagname"]); ?></span>
                       <span><em>·</em> <span class="glyphicon glyphicon-heart like" aria-hidden="true" value='<?php echo ($list["id"]); ?>' id="like<?php echo ($list["id"]); ?>"><?php echo ($list["likes"]); ?></span></span>
                    </div>
                  </div>
                  <div class="media-right">
                    <a href="/thinkphp/index.php/Home/Article/details?artid=<?php echo ($list["id"]); ?>">
                      <img class="media-object" src="<?php echo ($list["image"]); ?>" alt="..." style="width: 100px;height: 100px">
                    </a>
                  </div>
                </li>
                <hr><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
           <?php if($lists == null): ?><p style="text-align: center;"><label>暂时没有此分类的文章,敬请期待!</label></p><?php endif; ?>
          </div>
        </div>
        </div><!--/.col-xs-12.col-sm-9-->

    
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar1">
          <div class="list-group">
            <label class="list-group-item active"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> &nbsp;标签 <span class="badge">文章</span></label>
            <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="/thinkphp/index.php/Home/article/category?cat=<?php echo ($tag["tagname"]); ?>" class="list-group-item"><?php echo ($tag["tagname"]); ?><span class="badge"><?php echo ($tag["num"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
            <a href="/thinkphp/index.php/Home/article/category" class="list-group-item">全部<span class="badge"><?php echo ($count); ?></span></a>
            <br>
          <label class="list-group-item active"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp;时间线 <span class="badge">文章</span></label>
          <?php $__FOR_START_15907__=2016;$__FOR_END_15907__=2008;for($i=$__FOR_START_15907__;$i > $__FOR_END_15907__;$i+=-1){ ?><a href="#" class="list-group-item"><?php echo ($i); ?>  <span class="badge">4</span></a><?php } ?>
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

<script src="/thinkphp/Public/home/js/jquery.min.js"></script>
<script src="/thinkphp/Public/home/js/bootstrap.min.js"></script>
<script src="/thinkphp/Public/home/js/offcanvas.js"></script>

  <script>
    $(document).ready(function() {
      $('#index').removeClass('active');
      var now = new Date();
      var time = $('.time');
      time.each(function() {
        var pub = new Date($(this).attr('publish'));
        var td = Math.round((now-pub)/(24*3600*1000));
        if (td == 0) {
          $(this).text('今天');
        }else{
           $(this).text(td+'天以前');
        }
      });
     $('span.like').each(function() {
      var aid = $(this).attr('value');
      $.post('/thinkphp/index.php/Home/Article/like', {aid:aid,check:'c'}, function(data, textStatus, xhr) {
        if (textStatus == 'success') {
          if (data.cur == '1') {
            $('#like'+aid).css('color','red');
          }
          $('#like'+aid).text(data.sum);
        }
      });
     })
    });
  </script>


</body>
</html>