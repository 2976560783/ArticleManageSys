<!DOCTYPE html>
<html>
<head>
    <title>CMS后台登陆</title>
    <link rel="stylesheet" href="../includes/css/admin.css">
    <script src="../includes/js/admin_login.js" type="text/javascript"></script>
</head>
<body >
    <form id="login" action="manage.php?action=login" method="post" accept-charset="utf-8">
        <fieldset>
            <legend>CMS后台登陆</legend>
            <table>
                <tbody>
                    <tr>
                        <td>账 &nbsp;&nbsp;&nbsp;号:</td>
                        <td><input type="text" name="admin_name" value="" required="" autofocus=""></td>
                    </tr>
                    <tr>
                        <td>密 &nbsp;&nbsp;&nbsp;码:</td>
                        <td><input type="password" name="admin_pass" value="" required=""></td>
                    </tr>
                    <tr>
                        <td>验证码:</td>
                        <td><input type="text" name="code" value="" required=""></td>
                    </tr>
                    <tr>
                    <td class="tip" colspan="2"><label>输入下面的字符,不区分大小写.</label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><img src="../config/code.php" alt="验证码图片" onclick="javascript:this.src='../config/code.php?id='+Math.random()"></td>
                    </tr>
                    <tr>
                    <td class="tip" colspan="2"><label><input type="submit"class="login" onclick="info_check()" name="send" value="登陆"></label></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
</body>
</html>