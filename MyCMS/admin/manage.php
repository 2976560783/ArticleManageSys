<?php 
//管理员管理操作入口
require substr(dirname(__FILE__),0,-6).'\init.inc.php';
require ROOT_PATH.'\action\Action.class.php';
require ROOT_PATH.'\action\ManageAction.class.php';
require ROOT_PATH.'\model\Manages.class.php';

new ManageAction($tpl);

$tpl->display('manage.tpl');
