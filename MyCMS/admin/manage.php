<?php 
//管理员管理操作入口
require substr(dirname(__FILE__),0,-6).'\init.inc.php';

new ManageAction($tpl);
