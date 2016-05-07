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
    
   <style type="text/css" media="screen">
       .gender:hover{
            cursor: pointer;
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
                    <td><?php echo ($baseInfo["username"]); ?></td>
                </tr>
                <tr>
                    <td>电子邮件</td>
                    <td><?php echo ($baseInfo["email"]); ?></td>
                </tr>
                <tr>
                    <td>生日</td>
                    <td><?php echo (substr($baseInfo["birthday"],0,10)); ?></td>
                </tr>
                <tr>
                    <td>性别</td>
                    <td>
                        <?php switch($baseInfo["gender"]): case "0": ?>保密<?php break;?>
                            <?php case "1": ?>女<?php break;?>
                            <?php case "2": ?>男<?php break; endswitch;?>
                    </td>
                </tr>
                <tr>
                    <td>文章数量</td>
                    <td><?php echo ($baseInfo["acount"]); ?></td>
                </tr>
                <tr>
                    <td>登陆次数</td>
                    <td><?php echo ($baseInfo["login_count"]); ?></td>
                </tr>
                <tr>
                    <td>上次登录时间</td>
                    <td><?php echo (date('Y-m-d',$baseInfo["last_login_time"])); ?></td>
                </tr>
                <tr>
                    <td>上次登录IP</td>
                    <td><?php echo (long2ip($baseInfo["last_login_ip"])); ?></td>
                </tr>
                <tr>
                    <td>加入时间</td>
                    <td><?php echo (date('Y-m-d',$baseInfo["createtime"])); ?></td>
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
                <?php if(is_array($commentInfo)): $i = 0; $__LIST__ = $commentInfo;if( count($__LIST__)==0 ) : echo "暂时没有记录" ;else: foreach($__LIST__ as $key=>$com): $mod = ($i % 2 );++$i;?><tr>
                        <td class="head"><?php echo ($com["title"]); ?></td>
                        <td class="content"><?php echo ($com["content"]); ?></td>
                        <td><?php echo (date('Y-m-d h:m:s',$com["time"])); ?></td>
                    </tr><?php endforeach; endif; else: echo "暂时没有记录" ;endif; ?>
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
                <?php if(is_array($replyFromMe)): $i = 0; $__LIST__ = $replyFromMe;if( count($__LIST__)==0 ) : echo "暂时没有记录" ;else: foreach($__LIST__ as $key=>$repf): $mod = ($i % 2 );++$i;?><tr>
                        <td class="head"><?php echo ($repf["username"]); ?></td>
                        <td class="content"><?php echo ($repf["content"]); ?></td>
                        <td><?php echo (date('Y-m-d h:m:s',$repf["time"])); ?></td>
                    </tr><?php endforeach; endif; else: echo "暂时没有记录" ;endif; ?>
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
                <?php if(is_array($replyToMe)): $i = 0; $__LIST__ = $replyToMe;if( count($__LIST__)==0 ) : echo "暂时没有记录" ;else: foreach($__LIST__ as $key=>$rept): $mod = ($i % 2 );++$i;?><tr>
                        <td class="head"><?php echo ($rept["username"]); ?></td>
                        <td class="content"><?php echo ($rept["content"]); ?></td>
                        <td><?php echo (date('Y-m-d h:m:s',$rept["time"])); ?></td>
                    </tr><?php endforeach; endif; else: echo "暂时没有记录" ;endif; ?>
            </tbody>
        </table>
    </div>
  </div>

  <div role="tabpanel" class="tab-pane fade" id="sysInfo">
    <div class="panel panel-default">
      <!-- Table -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>发布者</th>
                    <th>通知详情</th>
                    <th>通知时间</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($replyToMe)): $i = 0; $__LIST__ = $replyToMe;if( count($__LIST__)==0 ) : echo "暂时没有记录" ;else: foreach($__LIST__ as $key=>$rept): $mod = ($i % 2 );++$i;?><tr>
                        <td class="head">admin</td>
                        <td class="content"><?php echo ($rept["content"]); ?></td>
                        <td><?php echo (date('Y-m-d h:m:s',$rept["time"])); ?></td>
                    </tr><?php endforeach; endif; else: echo "暂时没有记录" ;endif; ?>
            </tbody>
        </table>
    </div>
  </div>

  <div role="tabpanel" class="tab-pane fade" id="settings">
    <div class="panel panel-default">
      <!-- Table -->
      <table class="table table-bordered">
      <form id="setInfo" action="setUserInfo" method="post" enctype="multipart/form-data">
        <tr>
            <th colspan="" rowspan="" headers=""><br><br>当前头像</th>
            <td colspan="" rowspan="" headers="">
                <label><span class="default-tx"></span></label>&nbsp;<img src="<?php echo ($setInfo["imgpath"]); ?>" alt="..." class="img-circle imgtx" style="width: 80px;height: 80px">
                <label for="img" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上传预览 &nbsp;<img src="" alt="" class="img-circle" id="show_pic" style="width: 80px;height: 80px"></label>
                <input type="file" name="myfile" id="uploadtx" value="" accept=".jpg,.png,.jpeg" placeholder="">
            </td>
        </tr>
        <tr>
            <th colspan="" rowspan="" headers="">修改用户名:</th>
            <td colspan="" rowspan="" headers=""><input type="text" name="username" class="form-control" value="<?php echo ($setInfo["username"]); ?>" placeholder=""></td>
        </tr>
        <tr>
            <th colspan="" rowspan="" headers="">修改电子邮箱</th>
            <td colspan="" rowspan="" headers=""><input type="email" class="form-control" name="email" value="<?php echo ($setInfo["email"]); ?>" placeholder=""></td>
        </tr>
        <tr>
            <th colspan="" rowspan="" headers="">修改生日:</th>
            <td colspan="" rowspan="" headers=""><input type="date" class="form-control" name="birthday" value="<?php echo (substr($setInfo["birthday"],0,10)); ?>" placeholder=""></td>
        </tr>
        <tr>
            <th colspan="" rowspan="" headers="">性别:</th>
            <td colspan="" rowspan="" headers=""><span class="label label-default gender" value="1">男</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-default gender" value="2">女</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-default gender" value="0">保密</span></td>
        </tr>
        <input type="hidden" name="gender" id="gender" value="<?php echo ($setInfo["gender"]); ?>">
        <tr>
            <td colspan="" rowspan="" headers=""></td>
            <td colspan="" rowspan="" headers="">
                <button type="submit" class="btn btn-primary">保存更改</button>
            </td>
        </tr>
        </form>
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

<script>
    $(document).ready(function() {
       $('.content').each(function () {
            var context = $(this).text();
            if (context.length > 60) {
                $(this).text(context.substring(0,60)+'...');
            } 
            $(this).css('width','850px');
       });
       $('.head').each(function () {
            var context = $(this).text();
            if (context.length > 10) {
                $(this).text(context.substring(0,10)+'...');
            } 
       })
      var imgpath = $('.imgtx').attr('src');
      if (imgpath == "/thinkweb/Public/home/imgs/defaultx.png") {
        $('.default-tx').text('默认头像');
      };
      $('#uploadtx').on('change', function handleFileSelect(evt) {
        var files = evt.target.files, f = files[0];
            if (!/image\/\w+/.test(f.type)){
                 alert("请确保文件为图像类型");
                 return false;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
            return function(e) {
                $('#show_pic').attr('src',e.target.result);
            };
            })(f);
            reader.readAsDataURL(f);
    });
      $('.gender').each(function () {
           if ($(this).attr('value') == $('#gender').val()) {
            $(this).removeClass('label-default');
            $(this).addClass('label-warning');
           }
      })
      $('.gender').each(function () {
        $(this).click(function () {
             $(this).siblings().each(function () {
                  $(this).addClass('label-default');
                  $(this).removeClass('label-warning');
             });
             $(this).addClass('label-warning');
             $('#gender').val($(this).attr('value'));
        })
      })
    });
</script>


</body>
</html>