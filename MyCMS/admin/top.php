<?php 
//后台目录顶部展示
require substr(dirname(__FILE__),0,-6).'\init.inc.php';
Validate::sessionCheck();
$tpl->assign('admin_name',$_SESSION['admin']['admin_name']);
$tpl->assign('level_name',$_SESSION['admin']['level_name']);
$tpl->display('top.html');