<?php 
require substr(dirname(__FILE__),0,-6).'\init.inc.php';
require ROOT_PATH.'\model\Manages.class.php';

$manage=new Manages();

$tpl->assign('AllManagers',$manage->addManage());
$tpl->display('manage.tpl');
