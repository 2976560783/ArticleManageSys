<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/thinkphp/Public/js/adminManage.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="/thinkphp/Public/css/adminIndex.css">
</head>
<body>
    <div class="top">
        <span><?php echo ($title); ?></span>
        <p>当前管理员,<b><?php echo ($userName); ?></b></p>
    </div>
    <hr>
    <div class="main">
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>addVideo</title>
    <link rel="stylesheet" href="/thinkphp/Public/css/addvideo.css">
    <script src="/thinkphp/Public/js/addvideo.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
<div class="addVideo">
    <form action="addvideo" method="post" accept-charset="utf-8">
        <div class="input-group" >
        <span class="input-group-addon" id="basic-addon1">视频名称:</span>
        <input type="text" class="form-control" placeholder="VideoName(Up to 20 characters)" aria-describedby="basic-addon1" maxlength="40" required="" autofocus="" name="videoName"  value="">
        </div>

          <div class="col-lg-13" style="background-color: white;">
            <div class="input-group">
              <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">视频类别
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="videofl" style="max-height: 90px;overflow:auto;">
                  <?php if(is_array($className)): foreach($className as $key=>$class): ?><li><a href="#"><?php echo ($class); ?></a></li><?php endforeach; endif; ?>
                </ul>
              </div><!-- /btn-group -->
              <input type="text" class="form-control" readonly="" id="ivideofl" name="className" value="" aria-label="..." placeholder="class" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择一个视频分类!" >
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->


        <div class="input-group" >
        <span class="input-group-addon" id="basic-addon1">主演/角色:</span>
        <input type="text" class="form-control" placeholder="Stars(Each name is separated by '/')/(Up to 50 characters)" required="" maxlength="50" aria-describedby="basic-addon1" name="actors">
        </div>

          <div class="col-lg-13">
            <div class="input-group">
              <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">内容标签 <span class="caret"></span></button>
                <ul class="dropdown-menu" id="contentfl" style="max-height: 90px;overflow:auto;">
                  <?php if(is_array($tagName)): foreach($tagName as $key=>$tag): ?><li><a href="#"><?php echo ($tag); ?></a></li><?php endforeach; endif; ?>                  
                </ul>
              </div><!-- /btn-group -->
              <input type="text" class="form-control" readonly=""  id="icontentfl" value="" aria-label="..." placeholder="Content tag" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择一个内容分类!" name="tagName">
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->

          <div class="col-lg-13">
            <div class="input-group">
              <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">地区选择 <span class="caret"></span></button>
                <ul class="dropdown-menu" id="areafl" style="max-height: 90px;overflow:auto;">
                  <?php if(is_array($areaName)): foreach($areaName as $key=>$area): ?><li><a href="#"><?php echo ($area); ?></a></li><?php endforeach; endif; ?>  
                </ul>
              </div><!-- /btn-group -->
              <input type="text" class="form-control" readonly="" id="iareafl" aria-label="..." placeholder="area" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择一个地区!"  name="areaName">
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->

          <div class="col-lg-13">
            <div class="input-group">
              <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">语言种类 <span class="caret"></span></button>
                <ul class="dropdown-menu" id="languagefl" style="max-height: 90px;overflow:auto;">
                  <?php if(is_array($languageName)): foreach($languageName as $key=>$language): ?><li><a href="#"><?php echo ($language); ?></a></li><?php endforeach; endif; ?>  
                </ul>
              </div><!-- /btn-group -->
              <input type="text" class="form-control" readonly="" id="ilanguagefl" aria-label="..." placeholder="Language" data-container="body" data-toggle="popover" data-placement="right" data-content="请选择一中语言类别!" name="languageName">
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->

        <div class="input-group" style="background-color: white;">
          <span class="input-group-addon" id="basic-addon1">发布时间:</span>
          <input type="date" name="releaseTime" value="" placeholder="">
        </div>

        <div class="input-group" >
        <span class="input-group-addon" id="basic-addon1">内容介绍:</span>
        <textarea name="summary" rows="4" cols="63" style="resize:none;" required="" placeholder="Summary(Up to 200 characters)" maxlength="200"></textarea>
        </div>
        <div class="input-group" style="background-color: white;">
        <span class="input-group-addon" id="basic-addon1">豆瓣评分:</span>
        <input type="number" required="" name="score" max="10" min="1" value="" placeholder="">
        </div>
        <input type="submit" class="submit" name="" value="添加" >
    </form>
      <br>
    <button type="button" style="width: 100px;height: 30px; border-radius: 5px;"><a href="/thinkphp/index.php/index/index" title="">回主界面</a></button>
</div>
</body>
</html>
    </div>
</body>
</html>