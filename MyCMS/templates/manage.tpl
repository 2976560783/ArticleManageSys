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
        首页管理&gt;&gt;管理员首页&gt;&gt;<strong id="title">{$title}</strong>
    </div>
    <ol>
        <li><a href="manage.php?action=show" class="selected" title="">管理员列表</a></li>
        <li><a href="manage.php?action=add" title="">添加管理员</a></li>
    {if $update}
        <li><a href="manage.php?action=update" title="">修改管理员</a></li>
    {/if}
    </ol><br><hr>
{if $show}
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
        {foreach $AllManagers($key,$value)}
            <tr>
                <td>{@value->id}</td>
                <td>{@value->admin_name}</td>
                <td>{@value->level_name}</td>
                <td>{@value->last_login_ip}</td>
                <td>{@value->login_count}</td>
                <td>{@value->last_login_time}</td>
                <td>{@value->reg_time}</td>
                <td><a href="manage.php?action=update&id={@value->id}">修改</a>|<a href="manage.php?action=delete&id={@value->id}" onclick="admin_main_check()">删除</a></td>
            </tr>
        {/foreach}
        </tbody>
    </table>
    <br><hr>
    <div id="page">
        {$pageInfo}
    </div>

{/if}

{if $update}
<form action="manage.php?action=update" method="post" accept-charset="utf-8">
    <input type="text" name="id" id="id" hidden="hidden" value="{$id}" placeholder="">
    <input type="text" name="level" id="level" hidden="hidden" value="{$level}" placeholder="">
    <table class="add_update">
        <caption>修改管理员信息</caption>
        <tbody>
            <tr>
                <th>用 &nbsp;户 &nbsp;名:</th>
                <td><input type="text" name="admin_name" maxlength="10" class="text" value="{$admin_name}" readonly="readonly" placeholder="*设置2至10位用户名*" ></td>
            </tr>
            <tr>  
                 <th>新 密&nbsp;&nbsp;码:</th>
                 <td><input type="password" name="admin_pass" class="text" value="" placeholder="*至少6位，最多15位*" ></td>
            </tr>
            <tr>  
                 <th>确认密码:</th>
                 <td><input type="password" name="admin_pass_check" class="text" value="" placeholder="*确认已填写的密码*" ></td>
            </tr>
            <tr>
                 <th>等 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 级:</th>
                 <td><select name="admin_level">
                    {foreach $allLevel($key,$value)}
                        <option value="{@value->id}">{@value->level_name}</option>}
                    {/foreach}
                 </select></td>
            </tr>
            <tr>     
                <td colspan="2"><input type="submit" class="submit" name="updateManager" onclick="pass_check()" value="确认修改">&nbsp;&nbsp;[<a href="manage.php?action=show">返回列表</a>]</td>
            </tr>
        </tbody>
    </table>

</form>
{/if}


{if $add}
<form action="manage.php?action=add" method="post" accept-charset="utf-8">
    <table class="add_update">
        <caption>新增管理员信息</caption>
        <tbody>
            <tr>
                <th>用户名:</th>
                <td><input type="text" name="admin_name" maxlength="10" class="text" value="" placeholder="*设置2至10位用户名*" required=""></td>
            </tr>
            <tr>  
                 <th>密  码:</th>
                 <td><input type="password" name="admin_pass" class="text" value="" placeholder="*至少6位，最多15位*" required=""></td>
            </tr>
            <tr>  
                 <th>确认密码:</th>
                 <td><input type="password" name="admin_pass_check" class="text" value="" required="true" placeholder="*确认已填写的密码*" ></td>
            </tr>
            <tr>
                 <th>等  级:</th>
                 <td><select name="admin_level">
                    {foreach $allLevel($key,$value)}
                        <option value="{@value->id}">{@value->level_name}</option>}
                    {/foreach}
                 </select></td>
            </tr>
            <tr>     
                <td colspan="2"><input type="submit" class="submit" name="addManager"  onclick="pass_check()" value="添加管理员">&nbsp;&nbsp;[<a href="manage.php?action=show">返回列表</a>]</td>
            </tr>
        </tbody>
    </table>
</form>
{/if}


{if $delete}
删除管理员
{/if}
</body>
</html>