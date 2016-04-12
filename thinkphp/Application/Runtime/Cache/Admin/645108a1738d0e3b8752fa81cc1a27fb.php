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
    <title>showTag</title>
    <link rel="stylesheet" href="/thinkphp/Public/css/showmovie.css">
    <script>
        $(document).ready(function() {
            $('.dis').removeAttr('href');
            $('.dis').removeAttr('onclick');
            $('.dis').text('禁用');
            $('.dis').css('textDecoration','none');
            $('.dis').css('color','black');
        });
    </script>
</head>
<body>
<div id="showMovie">
        <table>
        <thead>
            <tr style="border-bottom: 1px solid #eee;" >
                <th>编号</th>
                <th>标签</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $k=>$tlist): ?><tr>
                <td class="listid"><?php echo ($k+$pageSize); ?></td>
                <td><?php echo ($tlist["tag_name"]); ?></td>
                <td><a href="/thinkphp/index.php/tag/editTag?id=<?php echo ($tlist["id"]); ?>" title="编辑" class="<?php echo ($tlist["dis"]); ?>">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="/thinkphp/index.php/Tag/deleteTag?id=<?php echo ($tlist["id"]); ?>" onclick="return confirm('确认要删除本条记录!');" title="删除" class="<?php echo ($tlist["dis"]); ?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <hr>
    <?php echo ($page); ?>
    <span><a href="/thinkphp/index.php/tag/addTag" title="主界面" style="color: blue;">新增标签</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span><a href="/thinkphp/index.php/index/index" title="主界面" style="color: blue;">管理主界面</a></span>
</div>
</body>
</html>
    </div>
</body>
</html>