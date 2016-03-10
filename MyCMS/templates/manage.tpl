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
        首页管理&gt;&gt;管理员首页
    </div>
    <table cellspacing="0">
        <thead>
            <tr>
                <th>编号</th>
                <th>用户名</th>
                <th>等级</th>
                <th>最近登录IP</th>
                <th>登录次数</th>
                <th>上次登录</th>
                <th>注册时间</th>
            </tr>
        </thead>
        <tbody>
        {foreach $AllManagers($key,$value)}
            <tr>
                <td>{@value->id}</td>
                <td>{@value->admin_user}</td>
                <td>{@value->admin_level}</td>
                <td>{@value->last_login_ip}</td>
                <td>{@value->login_count}</td>
                <td>{@value->last_login_time}</td>
                <td>{@value->reg_time}</td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</body>
</html>