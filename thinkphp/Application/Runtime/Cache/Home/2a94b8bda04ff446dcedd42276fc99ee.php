<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=1, user-scalable=no">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/thinkphp/Public/css/index.css">
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="header">
         <span><a href="#" title="">资料下载</a></span>
         <span><a href="#" title="">设为首页</a></span>
         <span><a href="#" title="">加入收藏</a></span>
    </div>
    <div class="top">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/thinkphp/">西华师大</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">推荐 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">排行榜</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">栏目列表 <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">动画</a></li>
                    <li><a href="#">电影</a></li>
                    <li><a href="#">番剧</a></li>
                    <li><a href="#">音乐</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">没有了</a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
              </form>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">关于</a></li>
                <?php if($logined == 'true'): ?><li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($userName); ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">我的主页</a></li>
                    <li><a href="#">我的等级</a></li>
                    <li><a href="#">个人设置</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href='/thinkphp/home/user/logout'>登出</a></li>
                  </ul>
                </li>
                <?php else: ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">游客请登录 </a>
                  </li><?php endif; ?>
              </ul>
            </div>
          </div>
        </nav>
    </div>
    <div id="content">
                  <div id="myCarousel" class="carousel slide">
               <!-- 轮播（Carousel）指标 -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" </li>
                  <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
               </ol>   
               <!-- 轮播（Carousel）项目 -->
               <div class="carousel-inner">
                  <div class="item active">
                     <img src="/thinkphp/Public/images/轮播图1.png" alt="First slide">
                     <div class="carousel-caption">浅水很深</div>
                  </div>
                  <div class="item">
                     <img src="/thinkphp/Public/images/轮播图2.png" alt="Second slide">
                     <div class="carousel-caption">最强前端框架</div>
                  </div>
                  <div class="item">
                     <img src="/thinkphp/Public/images/轮播图3.png" alt="Third slide">
                     <div class="carousel-caption">浅水一笑</div>
                  </div>
               </div>
               <!-- 轮播（Carousel）导航 -->
               <a class="carousel-control left" href="#myCarousel" 
                  data-slide="prev"></a>
               <a class="carousel-control right" href="#myCarousel" 
                  data-slide="next"></a>
            </div> 
    <div class="fengexian">
        <p><span>我是优美的分割线</span></p>
    </div>
    <div class="content">
        <div class="panel panel-default">
              <div class="panel-heading" id="donghua">
                <h3 class="panel-title" >动画 &nbsp;<span class="glyphicon glyphicon-fire" aria-hidden="true"></span></h3>
              </div>
              <div class="panel-body">
                    <div class="list-group">
                      <a href="#" class="list-group-item">Dapibus ac facilisis in<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Porta ac consectetur ac<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Vestibulum at eros<span class="badge">Hits:14</span></a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                    </div>
              </div>
        </div>
        <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">电影&nbsp;<span class="glyphicon glyphicon-film" aria-hidden="true"></span></h3>
              </div>
              <div class="panel-body">
                    <div class="list-group">

                      <a href="#" class="list-group-item">Dapibus ac facilisis in<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Porta ac consectetur ac<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Vestibulum at eros<span class="badge">Hits:14</span></a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                    </div>
              </div>
        </div>
        <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">番剧&nbsp;<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></h3>
              </div>
              <div class="panel-body">
                    <div class="list-group">

                      <a href="#" class="list-group-item">Dapibus ac facilisis in<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Porta ac consectetur ac<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Vestibulum at eros<span class="badge">Hits:14</span></a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                    </div>
              </div>
        </div>
        <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">音乐&nbsp;<span class="glyphicon glyphicon-headphones" aria-hidden="true"></span></h3>
              </div>
              <div class="panel-body">
                    <div class="list-group">

                      <a href="#" class="list-group-item">Dapibus ac facilisis in<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Porta ac consectetur ac<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Vestibulum at eros<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Dapibus ac facilisis in<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus <span class="badge">Hits:14</span></a>
                      <a href="#" class="list-group-item">Morbi leo risus<span class="badge">Hits:14</span></a>

                    </div>
              </div>
        </div>
    </div>
    <hr>
    <div class="test">
        <div class="sum" >
        <div class="num">
                        <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="thumbnail">
                          <img src="/thinkphp/Public/images/thumbnail1.png" alt="...">
                          <div class="caption">
                            <h3>周星驰</h3>
                            <p>著名导演,优秀演员,集帅气与才华于一生的男银.</p>
                            <p><a href="#" class="btn btn-primary" role="button">View More</a> <a href="#" class="btn btn-default" role="button">电影</a></p>
                          </div>
                        </div>
                      </div>
                    </div>
        </div>
        <div class="num">
                        <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="thumbnail">
                          <img src="/thinkphp/Public/images/thumbnail2.png" alt="...">
                          <div class="caption">
                            <h3>明日香</h3>
                            <p>日本动漫EVA(福音战士)中女主角之一,颜值挺高的.</p>
                            <p><a href="#" class="btn btn-primary" role="button">View More</a> <a href="#" class="btn btn-default" role="button">动漫</a></p>
                          </div>
                        </div>
                      </div>
                    </div>
        </div>
        <div class="num">
                        <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="thumbnail">
                          <img src="/thinkphp/Public/images/thumbnail3.png" alt="...">
                          <div class="caption">
                            <h3>艾薇儿</h3>
                            <p>美国的一个漂亮的女歌手,靠声音和颜值吃饭.</p>
                            <p><a href="#" class="btn btn-primary" role="button">View More</a> <a href="#" class="btn btn-default" role="button">音乐</a></p>
                          </div>
                        </div>
                      </div>
                    </div>
        </div>
        <div class="num">
                        <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="thumbnail">
                          <img src="/thinkphp/Public/images/thumbnail4.png" alt="...">
                          <div class="caption">
                            <h3>忍者杀手SE</h3>
                            <p>这是哔哩哔哩上随便找的一个番剧,欲知详情如何,自己去看.</p>
                            <p><a href="#" class="btn btn-primary" role="button">View More</a> <a href="#" class="btn btn-default" role="button">番剧</a></p>
                          </div>
                        </div>
                      </div>
                    </div>
        </div>
                <div class="num">
                        <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="thumbnail">
                          <img src="/thinkphp/Public/images/thumbnail5.png" alt="...">
                          <div class="caption">
                            <h3>Linus谈科技</h3>
                            <p>看完之后,我想问:没有什么问的了!</p>
                            <p><a href="#" class="btn btn-primary" role="button">View More</a> <a href="#" class="btn btn-default" role="button">科技</a></p>
                          </div>
                        </div>
                      </div>
                    </div>
        </div>
        </div>
    </div>
    
      <div class="frendlinks">
            <div class="frendtxt">
            <span class="glyphicon glyphicon-link" aria-hidden="true">&nbsp;友情链接 &gt;&gt;</span>
            </div>
            <div class="linkimgs">
                <img src="/thinkphp/Public/images/baidu.png" alt="">
                <img src="/thinkphp/Public/images/google.png" alt="">
                <img src="/thinkphp/Public/images/baidu.png" alt="">
                <img src="/thinkphp/Public/images/google.png" alt="">
                <img src="/thinkphp/Public/images/baidu.png" alt="">
                <img src="/thinkphp/Public/images/google.png" alt="">
            </div>
    </div>


    </div>
    <div class="footer">
        <h1 >这是一个<abbr title="如果细心的你看到这里,说明。。。。并没有什么暖用！！！" class="initialism">网站</abbr>的底部 <a href="#" title="">点我回顶部</a></h1>

        
    </div>

</body>
</html>