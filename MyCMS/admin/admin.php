<?php 
//后台框架页面展示
require substr(dirname(__FILE__),0,-6).'\init.inc.php';
Validate::sessionCheck();
$tpl->display('admin.tpl');