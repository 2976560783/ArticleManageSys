<?php if (!defined('THINK_PATH')) exit();?><!-- 
    <div class="main">
        <div class="btn-group-vertical" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  类别管理
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">查看内容分类</a></li>
                  <li><a href="#">查看剧情分类</a></li>
                </ul>
             </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  视频管理
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">查看全部</a></li>
                  <li><a href="/thinkphp/admin/video/addVideo">新增视频</a></li>
                </ul>
             </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  音频管理
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">查看全部</a></li>
                  <li><a href="#">新增音频</a></li>
                </ul>
             </div>
             <button type="button" class="logout"><a href="/thinkphp/admin/user/logout" title="">退出登录</a></button>
        </div>
    </div>  
 -->
 <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#movie" aria-controls="movie" role="tab" data-toggle="tab">电影</a></li>
    <li role="presentation"><a href="#play" aria-controls="play" role="tab" data-toggle="tab">番剧</a></li>
    <li role="presentation"><a href="#anime" aria-controls="anime" role="tab" data-toggle="tab">动漫</a></li>
    <li role="presentation"><a href="#add" aria-controls="add" role="tab" data-toggle="tab">添加</a></li>
    <li><a href="/thinkphp/admin/user/logout">退出登录</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="movie">
        fdsfd
    </div>
    <div role="tabpanel" class="tab-pane" id="play">
        
    </div>
    <div role="tabpanel" class="tab-pane" id="anime">
        
    </div>
    <div role="tabpanel" class="tab-pane" id="add">
        
    </div>
  </div>

</div>