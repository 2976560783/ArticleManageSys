<?php 
//后台登陆页面
require substr(dirname(__FILE__),0,-6).'\init.inc.php';
if (isset($_SESSION['admin'])) {
    Tools::alertLocation(null,'admin.php');
}
$tpl->display('admin_login.html');
