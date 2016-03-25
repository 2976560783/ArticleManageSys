<?php 
//后台内容展示页面
require substr(dirname(__FILE__),0,-6).'\init.inc.php';
Validate::sessionCheck();
$tpl->display('main.html');