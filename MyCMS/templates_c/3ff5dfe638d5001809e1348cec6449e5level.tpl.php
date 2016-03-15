<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>main</title>
    <link rel="stylesheet" href="../includes/css/admin.css">
    <script src="../includes/js/admin_manage.js" type="text/javascript"></script>
</head>
<body id="main">
    <div class="map">
        首页管理&gt;&gt;等级管理&gt;&gt;<strong id="title"><?php echo $this->var['title']; ?></strong>
    </div>
    <ol>
        <li><a href="level.php?action=show" class="selected" title="">等级列表</a></li>
        <li><a href="level.php?action=add" title="">新增等级</a></li>
    <?php if($this->var['update']){ ?>
        <li><a href="level.php?action=update" title="">修改等级</a></li>
    <?php };?>
    </ol><br><hr>
<?php if($this->var['show']){ ?>
    <table cellspacing="0" class="listLevel">
        <thead>
            <tr>
                <th>编号</th>
                <th>等级名</th>
                <th>描述</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($this->var['AllLevels'] as $key=>$value){?>
            <tr>
                <td><?php echo $value->id;?></td>
                <td><?php echo $value->level_name;?></td>
                <td><?php echo $value->level_info;?></td>
                <td><a href="level.php?action=update&id=<?php echo $value->id;?>">修改</a>|<a href="level.php?action=delete&id=<?php echo $value->id;?>" onclick="admin_main_check()">删除</a></td>
            </tr>
        <?php };?>
        </tbody>
    </table>
    <p class="adm"><a href="level.php?action=add">[新增管理员]</a></p>

<?php };?>

<?php if($this->var['update']){ ?>
<form action="level.php?action=update" method="post" accept-charset="utf-8">
    <input type="text" name="id" id="id" hidden="hidden" value="<?php echo $this->var['id']; ?>" placeholder="">
    <table class="add_update">
        <caption>修改等级信息</caption>
        <tbody>
            <tr>
                <th>等 &nbsp;级 &nbsp;名:</th>
                <td><input type="text" name="level_name" class="text" value="<?php echo $this->var['level_name']; ?>" placeholder="等级名称" required="true" ></td>
            </tr>
            <tr>  
                 <th>等级描述:</th>
                 <td><textarea name="level_info" rows="5" cols="26" placeholder="等级描述信息" style="resize: none;" required="true"><?php echo $this->var['level_info']; ?></textarea></td>
            </tr>
            <tr>     
                <td colspan="2"><input type="submit" class="submit" name="updateLevel" value="确认修改">&nbsp;&nbsp;[<a href="level.php?action=show">返回列表</a>]</td>
            </tr>
        </tbody>
    </table>

</form>
<?php };?>


<?php if($this->var['add']){ ?>
<form action="level.php?action=add" method="post" accept-charset="utf-8">
    <table class="add_update">
        <caption>新增管理员信息</caption>
        <tbody>
            <tr>
                <th>等级名称:</th>
                <td><input type="text" name="level_name" class="text" value="" placeholder="等级名称" required=""></td>
            </tr>
            <tr>  
                 <th>描述信息:</th>
                 <td><textarea name="level_info" rows="5" cols="26" placeholder="等级描述信息" style="resize: none;" required="true"></textarea></td>
            </tr>
            <tr>     
                <td colspan="2"><input type="submit" class="submit" name="addLevel" value="添加管理员">&nbsp;&nbsp;[<a href="level.php?action=show">返回列表</a>]</td>
            </tr>
        </tbody>
    </table>
</form>
<?php };?>


<?php if($this->var['delete']){ ?>
删除管理员
<?php };?>
</body>
</html>