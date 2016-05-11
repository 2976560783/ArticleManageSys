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
    
  <style type="text/css" media="screen">
    dd{
      text-indent: 28px;
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
    
<ol class="breadcrumb">
  <li><a href="/thinkweb">主页</a></li>
  <li><a href="/thinkweb/index.php/Home/Article/category">全部</a></li>
  <li><a href="/thinkweb/index.php/Home/Article/category?cat=<?php echo ($details["tagname"]); ?>"><?php echo ($details["tagname"]); ?></a></li>
  <li class="active">详细</li>
<!--   <input type="hidden" name="uid" id="uid" value="<?php echo ($details["uid"]); ?>"> -->
  <input type="hidden" name="aid" id="aid" value="<?php echo ($details["aid"]); ?>">
</ol>
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">侧栏</button>
          </p>
          <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo ($details["title"]); ?></h3>
              </div>
              <div class="panel-body">
                <h1 style="font-family: 微软雅黑"><?php echo ($details["title"]); ?></h1>
                <br>
                  <label for=""><span class="glyphicon glyphicon-user" aria-hidden="true"><?php echo ($details["username"]); ?></span></label>&nbsp;&nbsp;
                  <label for=""><span class="glyphicon glyphicon-time" aria-hidden="true"><?php echo (date("Y-m-d h:m:s",$details["publish"])); ?></span></label>&nbsp;&nbsp;
                  <label for=""><span class="glyphicon glyphicon-tag" aria-hidden="true"><?php echo ($details["tagname"]); ?> </span></label>&nbsp;&nbsp;
                  <label for=""><span class="glyphicon glyphicon-eye-open" aria-hidden="true"><?php echo ($details["hits"]); ?> </span></label>
                  <label style="float: right;"><span id="like" class="glyphicon glyphicon-thumbs-up" aria-hidden="true">点赞</span></label>
                  <hr>
            <p style="text-indent: 2em;"><?php echo (htmlspecialchars_decode($details["content"])); ?></p>
              </div>
          </div>
          <?php if(isset($prev)): ?><a href="/thinkweb/index.php/Home/Article/details?artid=<?php echo ($prev); ?>" title="">
                      <button type="button" class="btn btn-info">
                        <span class="glyphicon glyphicon-backward" aria-hidden="true">
                        上一篇
                        </span>
                    </button>
              </a>
              <?php else: ?>
              <a href="#" title="">
                      <button type="button" class="btn btn-info">
                        <span class="glyphicon glyphicon-backward" aria-hidden="true">
                        上一篇
                        </span>
                    </button>
              </a><?php endif; ?>

          <?php if(isset($next)): ?><a href="/thinkweb/index.php/Home/Article/details?artid=<?php echo ($next); ?>" title="">
                  <button type="button" class="btn btn-info" style="float: right;">&nbsp;
                    <span class="  glyphicon glyphicon-forward" aria-hidden="true">
                    下一篇
                    </span>
                </button>
          </a>
          <?php else: ?>
          <a href="#" title="">
                  <button type="button" class="btn btn-info" style="float: right;">&nbsp;
                    <span class="  glyphicon glyphicon-forward" aria-hidden="true">
                    下一篇
                    </span>
                </button>
          </a><?php endif; ?>
      <hr>
      <button class="btn btn-primary" role="button" data-toggle="collapse" data-parent="#accordion" href="#comments" aria-expanded="false" aria-controls="comments" id="view-comments">
        查看留言
      </button>
      <div class="collapse in" id="comments">
        <div class="well">
          <form action="addComment" method="post">
              <div class="input-group">
                <textarea name="comment"  id="user-comment" placeholder="写下你的看法" maxlength="200" rows="3" style="resize: none;" class="form-control"></textarea>
                <input type="hidden" name="aid" value="<?php echo ($details["aid"]); ?>" class="comment">
                <span class="input-group-btn">
                  <button class="btn btn-info" type="submit" id="submit">提交</button>
                </span>
              </div>
            </form>
              <br>
          <div class="panel panel-default" id="comments">
            <div class="panel-heading">最近留言</div>
            <div class="panel-body">
              <?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><dl>
                      <dt>

                        <p class="text-primary"><img src="<?php echo ($comment["imgpath"]); ?>" style="width: 40px;height: 40px" alt="fd">&nbsp;
                        <?php if($comment['pid'] == 0): ?><span class="cuser cid<?php echo ($comment["cid"]); ?>" style="color: #6C7A89"><?php echo ($comment["username"]); ?></span> 发表留言:
                           <?php else: ?>
                           <span class="cuser cid<?php echo ($comment["cid"]); ?>" style="color: #6C7A89"><?php echo ($comment["username"]); ?></span> 回复 <span class="pid" value="<?php echo ($comment["pid"]); ?>" style="color: #6C7A89"></span> 留言:<?php endif; ?>

                        <span style="float: right;"><?php echo (date('Y-m-d H:m:s',$comment["time"])); ?> &nbsp;&nbsp;

                        <?php if($_SESSION['uid']== $details['uid'] and $comment['uid'] == $details['uid']): ?><a href="deleteComment?cid=<?php echo ($comment["cid"]); ?>" title="" onclick="return confirm('确认要删除本条留言?')"><button type="button" class="btn btn-warning btn-xs">删除</button></a>
                              
                        <?php elseif($_SESSION['uid']== $details['uid']): ?>
                              <button type="button" class="btn btn-success btn-xs reply">回复</button>
                              <a href="deleteComment?cid=<?php echo ($comment["cid"]); ?>" title="" onclick="return confirm('确认要删除本条留言?')"><button type="button" class="btn btn-warning btn-xs">删除</button></a>

                        <?php elseif($_SESSION['uid']== $comment['uid']): ?>
                              <a href="deleteComment?cid=<?php echo ($comment["cid"]); ?>" title="" onclick="return confirm('确认要删除本条留言?')"><button type="button" class="btn btn-warning btn-xs">删除</button></a>

                        <?php else: ?>
                              <button type="button" class="btn btn-success btn-xs reply">回复</button><?php endif; ?>
                              <span type="hidden" class="cid" value="<?php echo ($comment["cid"]); ?>"></span></span>
                        </p>
                    </dt>
                    <dd id="<?php echo ($comment["cid"]); ?>"><p class="text-info"><?php echo ($comment["content"]); ?></p></dd>
                  </dl>
                      <hr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>

            </div>
          </div>  
        </div>
      </div>
    </div><!--/.col-xs-12.col-sm-9-->

    
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar1">
          <div class="list-group">
            <label class="list-group-item active"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> &nbsp;标签 <span class="badge">文章</span></label>
            <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="/thinkweb/index.php/Home/article/category?cat=<?php echo ($tag["tagname"]); ?>" class="list-group-item"><?php echo ($tag["tagname"]); ?><span class="badge"><?php echo ($tag["num"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
            <a href="/thinkweb/index.php/Home/article/category" class="list-group-item">全部<span class="badge"><?php echo ($count); ?></span></a>
            <br>
          <label class="list-group-item active"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp;时间线 <span class="badge">文章</span></label>
          <?php $__FOR_START_11431__=2016;$__FOR_END_11431__=2008;for($i=$__FOR_START_11431__;$i > $__FOR_END_11431__;$i+=-1){ ?><a href="#" class="list-group-item"><?php echo ($i); ?>  <span class="badge">4</span></a><?php } ?>
          </div>
        </div><!--/.sidebar-offcanvas-->
    
</div>

</div>

      <footer>
        <hr>
        <p style="text-align: center;">&copy; Company 2014 <label style="float: right;"><a href="#top" title="">回到顶部 &nbsp; <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a></label></p>
      </footer>

<script src="/thinkweb/Public/home/js/jquery.min.js"></script>
<script src="/thinkweb/Public/home/js/bootstrap.min.js"></script>
<script src="/thinkweb/Public/home/js/offcanvas.js"></script>

  <script>
    $(document).ready(function() {
      var act = $('#navbar').find('li.active');
      act.removeClass('active');
       $.post('/thinkweb/index.php/Home/Article/like', {aid:<?php echo ($details["aid"]); ?>,check:'c'}, function(data, textStatus, xhr) {
         if (textStatus == 'success') {
            if (data.cur == '1') {
               $('#like').css('color','red');
                $('#like').text('已赞');
             }
         }
       });
      $('#like').click(function() {
         $.post('/thinkweb/index.php/Home/Article/like', {aid:<?php echo ($details["aid"]); ?>}, function(data, textStatus, xhr) {
           if (textStatus == 'success') {
              if (data == '0') {
                 $('#like').css('color','red');
                  $('#like').text('已赞');
               }else{
                $('#like').css('color','black');
                $('#like').text('点赞');
               }
           }
         });
      });
      $('#submit').click(function () {
          if ($('.comment').val() == '') {
            alert('留言不能为空!');
            return false;
          }
      })
      $('.reply').click(function () {
        if($(this).parents('dt').nextAll().hasClass('reform')){
          $('.reform').remove();
        }else{
          var pid = $(this).siblings('span').attr('value');
          $(this).parents('dt').next().after('<div class="reform"><form action="addComment" method="post"><div><textarea name="comment" id="comment" placeholder="回复留言" maxlength="200" rows="2" style="resize: none;" class="form-control"></textarea><input type="hidden" name="aid" value="<?php echo ($details["aid"]); ?>" required=""><input type="hidden" name="pid" value="'+pid+'" required=""><span class="input-group-btn"><button class="btn btn-info" type="submit" id="re-submit" style="float:right">回复</button></span></div></form></div>');
        }
      });
      var comments = <?php echo ($comments_json); ?>;
      var username = $('#logined').text();
      $('span.cuser').each(function () {
          if ($(this).text() == username) {
            $(this).text('我');
          }
      })
      $('span.pid').each(function () {
          var pid = $(this).attr('value');
          var replyname = $('span.cid'+pid).text();
          if (username == replyname) {
            $(this).text('我');
          }else{
            $(this).text('@'+replyname);
          }
      })
         $('img').each(function () {
            $(this).addClass('img-responsive') ;
         })
    });
  </script>


</body>
</html>