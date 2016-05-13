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
    
    <style type="text/css" media="screen">
        p.list-top a{
            color: #4094C7;
            text-decoration: none;
        }
        p.list-top a:hover{
            color: blue;
        }
        h4.title a{
            color: black;
            font-weight: bold;
            font-size: 20px;
            line-height: 1.5;
            color: #555555;
            text-decoration: none;
            line-height: 60px;
        }
        h4.title a:hover{
            color: black;
        }
        .list-footer{
            line-height: 50px;
            color: #B5B5B5;
        }
        .list-footer span:hover{
           color: #3D411C;
        }
        .list-footer a{
            color: #B5B5B5;
            font-size: 10px;
        }
        .list-footer a:hover{
            color: #3D411C;
            text-decoration: none;
        }
    </style>

</head>
<body>

    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index">简书</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index">主页</a></li>
            <li><a href="#about">关于</a></li>
            <li><a href="#contact">联系</a></li>
          </ul>
        <div class="col-md-2 col-md-offset-7">
        <!-- Single button -->        
        <img src="/thinkphp/Public/home/imgs/tx.jpg" alt="头像" class="img-circle" style="width: 50px;height: 50px;float: left; ">
            <div class="dropdown" style="float: right; margin-top: 10%; margin-right: 35%; ">
              <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <label style="color: white;">付立</label>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dLabel">
                <li><a href="#" title="">个人中心</a></li>
                <li><a href="#" title="">设置</a></li>
                <li><a href="#" title="">帮助</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#" title="">注销</a></li>
              </ul>
            </div>
        </div>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->


<div class="container">
<div class="row row-offcanvas row-offcanvas-right">
    
<ol class="breadcrumb">
  <li><a href="#">主页</a></li>
  <li><a href="#">热门</a></li>
</ol>
        <div class="col-xs-12 col-sm-9">
        <ul class="jumbotron" style="list-style: none;width:100%;height:100%;padding: 5px">
            <li class="article-list" style="width:100%;height:125px;">
                <div class="col-md-10 col-sm-5" style="height: 100%" >
                    <p class="list-top" style="font-size: 10px;line-height: 20px;">
                            <a target="_blank" href="#" >许大威仔</a>
                            <em>·</em>
                            <span class="time" data-shared-at="2016-04-21T23:58:17+08:00">1天之前</span>
                    </p>
                    <h4 class="title">
                        <a target="_blank" href="#">故事不够吸引人？那是因为缺乏逻辑表现力</a>
                    </h4>
                    <div class="list-footer">
                            <a target="_blank" href="">
                                阅读 1541
                             </a>        
                            <a target="_blank" href="">
                               <em>·</em> 评论 17
                             </a>   
                             <span><em>·</em> 热门</span>
                            <span><em>·</em> 喜欢 64</span>
                    </div>
                </div>
               <div class="col-md-2 col-sm-5" >
                 <a href="#" title=""><img src="/thinkphp/Public/home/imgs/jianth.png" alt="..." class="img-rounded" style="width: 100%;height: 100%;margin-top: 13%;"></a>
               </div>
            </li>
            <hr>
            <li class="article-list" style="width:100%;height:125px;">
                <div class="col-md-10 col-sm-5" style="height: 100%" >
                    <p class="list-top" style="font-size: 10px;line-height: 20px;">
                            <a target="_blank" href="#" style="color: #4094C7;">许大威仔</a>
                            <em>·</em>
                            <span class="time" data-shared-at="2016-04-21T23:58:17+08:00">1天之前</span>
                    </p>
                    <h4 class="title">
                        <a target="_blank" href="#">故事不够吸引人？那是因为缺乏逻辑表现力</a>
                    </h4>
                    <div class="list-footer">
                            <a target="_blank" href="#">
                                阅读 1541
                             </a>        
                            <a target="_blank" href="">
                              <em>·</em> 评论 17
                             </a>       
                             <span><em>·</em> 热门</span>
                            <span><em>·</em> 喜欢 64</span>
                    </div>
                </div>
               <div class="col-md-2 col-sm-5" >
                 <img src="/thinkphp/Public/home/imgs/jianth.png" alt="..." class="img-rounded" style="width: 100%;height: 100%;margin-top: 13%;">   
               </div>
            </li>
            <hr>
            <li class="article-list" style="width:100%;height:125px;">
                <div class="col-md-10 col-sm-5" style="height: 100%" >
                    <p class="list-top" style="font-size: 10px;line-height: 20px;">
                            <a target="_blank" href="#" style="color: #4094C7;">许大威仔</a>
                            <em>·</em>
                            <span class="time" data-shared-at="2016-04-21T23:58:17+08:00">1天之前</span>
                    </p>
                    <h4 class="title">
                        <a target="_blank" href="#">故事不够吸引人？那是因为缺乏逻辑表现力</a>
                    </h4>
                    <div class="list-footer">
                            <a target="_blank" href="#">
                                阅读 1541
                             </a>        
                            <a target="_blank" href="">
                              <em>·</em> 评论 17
                             </a>       
                             <span><em>·</em> 热门</span>
                            <span><em>·</em> 喜欢 64</span>
                    </div>
                </div>
               <div class="col-md-2 col-sm-5" >
                 <img src="/thinkphp/Public/home/imgs/jianth.png" alt="..." class="img-rounded" style="width: 100%;height: 100%;margin-top: 13%;">   
               </div>
            </li>
            <hr>
            <li class="article-list" style="width:100%;height:125px;">
                <div class="col-md-10 col-sm-5" style="height: 100%" >
                    <p class="list-top" style="font-size: 10px;line-height: 20px;">
                            <a target="_blank" href="#" style="color: #4094C7;">许大威仔</a>
                            <em>·</em>
                            <span class="time" data-shared-at="2016-04-21T23:58:17+08:00">1天之前</span>
                    </p>
                    <h4 class="title">
                        <a target="_blank" href="#">故事不够吸引人？那是因为缺乏逻辑表现力</a>
                    </h4>
                    <div class="list-footer">
                            <a target="_blank" href="#">
                                阅读 1541
                             </a>        
                            <a target="_blank" href="">
                             <em>·</em> 评论 17
                             </a>       
                             <span><em>·</em> 热门</span>
                            <span><em>·</em> 喜欢 64</span>
                    </div>
                </div>
               <div class="col-md-2 col-sm-5" >
                 <img src="/thinkphp/Public/home/imgs/jianth.png" alt="..." class="img-rounded" style="width: 100%;height: 100%;margin-top: 13%;">   
               </div>
            </li>
            <hr>
            <li class="article-list" style="width:100%;height:125px;">
                <div class="col-md-10 col-sm-5" style="height: 100%" >
                    <p class="list-top" style="font-size: 10px;line-height: 20px;">
                            <a target="_blank" href="#" style="color: #4094C7;">许大威仔</a>
                            <em>·</em>
                            <span class="time" data-shared-at="2016-04-21T23:58:17+08:00">1天之前</span>
                    </p>
                    <h4 class="title">
                        <a target="_blank" href="#">故事不够吸引人？那是因为缺乏逻辑表现力</a>
                    </h4>
                    <div class="list-footer">
                            <a target="_blank" href="#">
                                阅读 1541
                             </a>        
                            <a target="_blank" href="">
                              <em>·</em> 评论 17
                             </a>       
                             <span><em>·</em> 热门</span>
                            <span> <em>·</em> 喜欢 64</span>
                    </div>
                </div>
               <div class="col-md-2 col-sm-5" >
                 <img src="/thinkphp/Public/home/imgs/jianth.png" alt="..." class="img-rounded" style="width: 100%;height: 100%;margin-top: 13%;">   
               </div>
            </li>
            <hr>
            <li class="article-list" style="width:100%;height:125px;">
                <div class="col-md-10 col-sm-5" style="height: 100%" >
                    <p class="list-top" style="font-size: 10px;line-height: 20px;">
                            <a target="_blank" href="#" style="color: #4094C7;">许大威仔</a>
                            <em>·</em>
                            <span class="time" data-shared-at="2016-04-21T23:58:17+08:00">1天之前</span>
                    </p>
                    <h4 class="title">
                        <a target="_blank" href="#">故事不够吸引人？那是因为缺乏逻辑表现力</a>
                    </h4>
                    <div class="list-footer">
                            <a target="_blank" href="#">
                                阅读 1541
                             </a>        
                            <a target="_blank" href="">
                               · 评论 17
                             </a>       
                             <span><em>·</em> 热门</span>
                            <span> · 喜欢 64</span>
                    </div>
                </div>
               <div class="col-md-2 col-sm-5" >
                 <img src="/thinkphp/Public/home/imgs/jianth.png" alt="..." class="img-rounded" style="width: 100%;height: 100%;margin-top: 13%;">   
               </div>
            </li>
            <hr>
        </ul>
        </div><!--/.col-xs-12.col-sm-9-->

    
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
          <label class="list-group-item active"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> &nbsp;时间线 <span class="badge">文章</span></label>
            <a href="#" class="list-group-item">2016  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">2015  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">2014  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">2013  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">2012  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">2011  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">2010  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">2009  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">2008  <span class="badge">4</span></a>
          </div>
        </div><!--/.sidebar-offcanvas-->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <label class="list-group-item active"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> &nbsp;标签 <span class="badge">文章</span></label>
            <a href="#" class="list-group-item">热门  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">新上榜  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">日报  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">七日热门  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">市集  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">有奖活动  <span class="badge">4</span></a>
            <a href="#" class="list-group-item">本站出版  <span class="badge">4</span></a>
          </div>
        </div><!--/.sidebar-offcanvas-->        
    

</div>

</div>

      <footer>
        <hr>
        <p style="text-align: center;">&copy; Company 2014 <label style="float: right;"><a href="#top" title="">回到顶部 &nbsp; <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span></a></label></p>
      </footer>

<script src="/thinkphp/Public/home/js/jquery.min.js"></script>
<script src="/thinkphp/Public/home/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      var act = $('#navbar').find('li.active');
      act.removeClass('active');
    });
  </script>


</body>
</html>