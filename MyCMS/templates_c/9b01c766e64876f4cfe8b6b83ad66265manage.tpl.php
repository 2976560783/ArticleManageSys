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
        首页管理&gt;&gt;管理员首页&gt;&gt;<strong id="title"><?php echo $this->var['title']; ?></strong>
    </div>
    <ol>
        <li><a href="manage.php?action=show" class="selected" title="">管理员列表</a></li>
        <li><a href="manage.php?action=add" title="">添加管理员</a></li>
    <?php if($this->var['update']){ ?>
        <li><a href="manage.php?action=update" title="">修改管理员</a></li>
    <?php };?>
    </ol><br><hr>
<?php if($this->var['show']){ ?>
    <table cellspacing="0" class="listManager">
        <thead>
            <tr>
                <th>编号</th>
                <th>用户名</th>
                <th>等级</th>
                <th>最近登录IP</th>
                <th>登录次数</th>
                <th>上次登录</th>
                <th>注册时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($this->var['AllManagers'] as $key=>$value){?>
            <tr>
                <td><?php echo $value->id;?></td>
                <td><?php echo $value->admin_name;?></td>
                <td><?php echo $value->level_name;?></td>
                <td><?php echo $value->last_login_ip;?></td>
                <td><?php echo $value->login_count;?></td>
                <td><?php echo $value->last_login_time;?></td>
                <td><?php echo $value->reg_time;?></td>
                <td><a href="manage.php?action=update&id=<?php echo $value->id;?>">修改</a>|<a href="manage.php?action=delete&id=<?php echo $value->id;?>" onclick="admin_main_check()">删除</a></td>
            </tr>
        <?php };?>
        </tbody>
    </table>
    <p class="adm"><a href="manage.php?action=add">[新增管理员]</a></p>

<?php };?>

<?php if($this->var['update']){ ?>
<form action="manage.php?action=update" method="post" accept-charset="utf-8">
    <input type="text" name="id" id="id" hidden="hidden" value="<?php echo $this->var['id']; ?>" placeholder="">
    <input type="text" name="level" id="level" hidden="hidden" value="<?php echo $this->var['level']; ?>" placeholder="">
    <table class="add_update">
        <caption>修改管理员信息</caption>
        <tbody>
            <tr>
                <th>用户名:</th>
                <td><input type="text" name="admin_name" class="text" value="<?php echo $this->var['admin_name']; ?>" readonly="readonly" placeholder="管理员名称" ></td>
            </tr>
            <tr>  
                 <th>密  码:</th>
                 <td><input type="password" name="admin_pass" class="text" value="" required="true" placeholder="设置密码" ></td>
            </tr>
            <tr>
                 <th>等  级:</th>
                 <td><select name="admin_level">
                    <?php foreach($this->var['allLevel'] as $key=>$value){?>
                        <option value="<?php echo $value->id;?>"><?php echo $value->level_name;?></option>}
                    <?php };?>
                 </select></td>
            </tr>
            <tr>     
                <td colspan="2"><input type="submit" class="submit" name="updateManager" value="确认修改">&nbsp;&nbsp;[<a href="manage.php?action=show">返回列表</a>]</td>
            </tr>
        </tbody>
    </table>

</form>
<?php };?>


<?php if($this->var['add']){ ?>
<form action="manage.php?action=add" method="post" accept-charset="utf-8">
    <table class="add_update">
        <caption>新增管理员信息</caption>
        <tbody>
            <tr>
                <th>用户名:</th>
                <td><input type="text" name="admin_name" class="text" value="" placeholder="管理员名称" required=""></td>
            </tr>
            <tr>  
                 <th>密  码:</th>
                 <td><input type="password" name="admin_pass" class="text" value="" placeholder="设置密码" required=""></td>
            </tr>
            <tr>
                 <th>等  级:</th>
                 <td><select name="admin_level">
                    <?php foreach($this->var['allLevel'] as $key=>$value){?>
                        <option value="<?php echo $value->id;?>"><?php echo $value->level_name;?></option>}
                    <?php };?>
                 </select></td>
            </tr>
            <tr>     
                <td colspan="2"><input type="submit" class="submit" name="addManager" value="添加管理员">&nbsp;&nbsp;[<a href="manage.php?action=show">返回列表</a>]</td>
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