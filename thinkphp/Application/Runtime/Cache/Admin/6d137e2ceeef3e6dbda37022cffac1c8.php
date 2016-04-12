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
    <title>movie show</title>
    <link rel="stylesheet" href="/thinkphp/Public/css/showmovie.css">
</head>
<body>
<div id="showMovie">
        <table>
        <thead>
            <tr style="border-bottom: 1px solid #eee;">
                <th>编号</th>
                <th>类别</th>
                <th>名称</th>
                <th>主角</th>
                <th>标签</th>
                <th>地区</th>
                <th>语言</th>
                <th>时间</th>
                <th>得分</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $k=>$vlist): ?><tr>
                <td class="listid"><?php echo ($k+$pageSize); ?></td>
                <td><?php echo ($vlist["class"]); ?></td>
                <td><?php echo ($vlist["video_name"]); ?></td>
                <td><?php echo ($vlist["actors"]); ?></td>
                <td><?php echo ($vlist["tag"]); ?></td>
                <td><?php echo ($vlist["area"]); ?></td>
                <td><?php echo ($vlist["language"]); ?></td>
                <td><?php echo ($vlist["release_time"]); ?></td>
                <td><?php echo ($vlist["score"]); ?></td>
                <td><a href="#" title="编辑">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="http//www.baidu.com" onclick="return confirm('real');" title="删除">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <hr>
    <?php echo ($page); ?>

</div>
</body>
</html>
    </div>
</body>
</html>