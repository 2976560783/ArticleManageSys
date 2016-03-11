<?php 
require substr(dirname(__FILE__),0,-6).'\init.inc.php';
require ROOT_PATH.'\model\Manages.class.php';

switch ($_GET['action']) {

    case 'add':
        $tpl->assign('add',true);
        $tpl->assign('list',false);
        $tpl->assign('update',false);
        $tpl->assign('delete',false);
        $tpl->assign('title','添加管理员');
        break;

    case 'delete':
        $tpl->assign('list',false);
        $tpl->assign('delete',true);
        $tpl->assign('update',false);
        $tpl->assign('add',false);
        $tpl->assign('title','删除管理员');
        break;

    case 'list':
        $tpl->assign('list',true);
        $tpl->assign('update',false);
        $tpl->assign('delete',false);
        $tpl->assign('add',false);
        $tpl->assign('title','管理员列表');
        break;

    case 'update':
        $tpl->assign('list',false);
        $tpl->assign('update',true);
        $tpl->assign('delete',false);
        $tpl->assign('add',false);
        $tpl->assign('title','修改管理员');
        break;

    default:
        echo "非法操作";
        break;
}

$manage=new Manages();


$tpl->assign('AllManagers',$manage->getManage());
$tpl->display('manage.tpl');
