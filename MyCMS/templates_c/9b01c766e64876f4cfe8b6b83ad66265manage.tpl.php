<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>main</title>
    <link rel="stylesheet" href="../includes/css/admin.css">
</head>
<body id="main">
    <div class="map">
        首页管理&gt;&gt;管理员首页&gt;&gt;<strong><?php echo $this->var['title']; ?></strong>
    </div>
<?php if($this->var['list']){ ?>
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
                <td><?php echo $value->admin_user;?></td>
                <td><?php echo $value->level_name;?></td>
                <td><?php echo $value->last_login_ip;?></td>
                <td><?php echo $value->login_count;?></td>
                <td><?php echo $value->last_login_time;?></td>
                <td><?php echo $value->reg_time;?></td>
                <td><a href="manage.php?action=update">修改</a>|<a href="manage.php?action=delete">删除</a></td>
            </tr>
        <?php };?>
        </tbody>
    </table>
    <p class="adm"><a href="manage.php?action=add">[新增管理员]</a></p>

<?php };?>

<?php if($this->var['update']){ ?>
<form action="#" method="post" accept-charset="utf-8">
    <table class="addManager">
        <caption>修改管理员信息</caption>
        <tbody>
            <tr>
                <th>用户名:</th>
                <td><input type="text" name="admin_name" class="text" value="" placeholder="管理员名称" ></td>
            </tr>
            <tr>  
                 <th>密  码:</th>
                 <td><input type="password" name="admin_pass" class="text" value="" placeholder="设置密码" ></td>
            </tr>
            <tr>
                 <th>等  级:</th>
                 <td><select name="level">
                     <option value="1">游客</option>
                     <option value="2">会员</option>
                     <option value="3">发帖专员</option>
                     <option value="4">评论专员</option>
                     <option value="5">普通管理员</option>
                     <option value="6">超级管理员</option>
                 </select></td>
            </tr>
            <tr>     
                <td colspan="2"><input type="submit" class="submit" name="addManager" value="添加管理员">&nbsp;&nbsp;[<a href="manage.php?action=list">返回列表</a>]</td>
            </tr>
        </tbody>
    </table>

</form>
<?php };?>


<?php if($this->var['add']){ ?>
<form action="manage.handle.php?action=addManager" method="post" accept-charset="utf-8">
    <table class="addManager">
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
                 <td><select name="level">
                     <option value="1">游客</option>
                     <option value="2">会员</option>
                     <option value="3">发帖专员</option>
                     <option value="4">评论专员</option>
                     <option value="5">普通管理员</option>
                     <option value="6">超级管理员</option>
                 </select></td>
            </tr>
            <tr>     
                <td colspan="2"><input type="submit" class="submit" name="addManager" value="添加管理员">&nbsp;&nbsp;[<a href="manage.php?action=list">返回列表</a>]</td>
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