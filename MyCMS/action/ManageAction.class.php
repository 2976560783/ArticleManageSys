<?php 
/**
* 管理操作控制器
*/
class ManageAction extends Action
{

    function __construct(&$tpl)
    {
        parent::__construct($tpl,new ManagesModel());
        $this->action();
        $tpl->display('manage.tpl');
    }

    private function action(){
    if (!isset($_GET['action'])) {
        Tools::alertBack("非法操作");
    }
    if ($_GET['action'] == 'login') {
        $this->login();
    }
    Validate::sessionCheck();
    switch ($_GET['action']) {
        case 'add':
            $this->add();
            break;

        case 'delete':
            $this->delete();
            break;

        case 'show':
            $this->show();
            break;

        case 'update':
            $this->update();
            break;

        case 'logout':
            $this->logout();
            break;

        default:
            Tools::alertBack('非法操作');
            break;
     }
}
    //用户登录验证
    private function login(){
        if (isset($_POST['send'])) {
            $code=$_POST['code'];
            if (!Validate::checkLength($code, 4, 'eq') || Validate::checkNull($code)) {
                Tools::alertLocation('验证码必须四位非空字符!', 'admin_login.php');
            }
            elseif (!Validate::checkConsistency(strtolower($code), $_SESSION['code'])) {
                Tools::alertLocation('验证码错误!', 'admin_login.php');
            }
            elseif (Validate::checkNull($_POST['admin_name'])) {
                Tools::alertBack("警告:用户名不能为空!");
            }
            elseif (Validate::checkLength($_POST['admin_name'], 2, 'lt') ||
                 Validate::checkLength($_POST['admin_name'], 10, 'gt')) {
                Tools::alertBack("警告:用户名长度不合法!");
            }
            elseif (Validate::checkNull($_POST['admin_pass']) ||
                Validate::checkLength($_POST['admin_pass'],6,'lt')) {
                Tools::alertBack("警告:密码长度最少6位非空字符!");
            }else{
                $this->manage->admin_name=$_POST['admin_name'];
                $this->manage->admin_pass=md5($_POST['admin_pass']);
                 $this->manage->lastIp=$_SERVER['REMOTE_ADDR'];
                $login=$this->manage->getLogin();
                if ($login) {
                    $_SESSION['admin']['admin_name']=$login->admin_name;
                    $_SESSION['admin']['level_name']=$login->level_name;
                    $this->manage->setLoginInfo();
                    header('Location:admin.php');
                }else{
                    Tools::alertBack("            警告:登录失败!\\n         用户名或密码错误!");
                }
            }
        }else{
            Tools::alertLocation(null,'admin_login.php');
        }

    }

    private function logout(){
        Tools::unSession();
        Tools::alertLocation(null, 'admin_login.php');
    }
    //添加管理员
    private function add(){
        if (isset($_POST['addManager'])) {
            if (Validate::checkNull($_POST['admin_name'])) {
                Tools::alertBack("警告:用户名不能为空!");
            }
            if (Validate::checkLength($_POST['admin_name'], 2, 'lt') ||
                 Validate::checkLength($_POST['admin_name'], 10, 'gt')) {
                Tools::alertBack("警告:用户名长度不合法!");
            }
            if (Validate::checkNull($_POST['admin_pass']) ||
                Validate::checkLength($_POST['admin_pass'],6,'lt')) {
                Tools::alertBack("警告:密码长度最少6位非空字符!");
            }
            if (!Validate::checkConsistency($_POST['admin_pass'], $_POST['admin_pass_check'])) {
                Tools::alertBack("警告:两次填写密码不一致!");
            }
            $this->manage->admin_name=$_POST['admin_name'];
            if (Validate::checkNameExists($this->manage)) {
                Tools::alertBack("用户名已存在!");
            }
            $this->manage->admin_level=$_POST['admin_level'];
            $this->manage->admin_pass=md5($_POST['admin_pass']);
            $this->manage->lastIp=$_SERVER['REMOTE_ADDR'];
              if (1 == $this->manage->addManage()) {
                  Tools::alertLocation('添加管理员成功！', 'manage.php?action=show');
              }else{
                  Tools::alertBack('很遗憾，添加管理员失败，请重试!');
              }
        }
        $levelModel=new LevelModel();
        $this->tpl->assign('add',true);
        $this->tpl->assign('show',false);
        $this->tpl->assign('update',false);
        $this->tpl->assign('delete',false);
        $this->tpl->assign('title','添加管理员');
        $this->tpl->assign('allLevel',$levelModel->getAllLevel());
    }

    //删除管理员
    private function delete(){
        if (isset($_GET['id']) && preg_match('/^\d+$/',$_GET['id'])) {
            $this->manage->id=$_GET['id'];
            if (1 == $this->manage->deleteManage()) {
                Tools::alertLocation('删除操作成功！','manage.php?action=show');
            }else{
                Tools::alertBack('删除失败，请稍后重试!');
            }
        }
    }

    //展示全部管理员
    private function show(){
        parent::page($this->manage->getManageCount());
        $this->tpl->assign('show',true);
        $this->tpl->assign('update',false);
        $this->tpl->assign('delete',false);
        $this->tpl->assign('add',false);
        $this->tpl->assign('title','管理员列表');
        $this->tpl->assign('AllManagers',$this->manage->getAllManage());
        
    }


    //更新管理员
    private function update(){
        if (isset($_POST['updateManager'])) {
            if (!empty($_POST['admin_pass']) || !empty($_POST['admin_pass_check'])) {
                if (Validate::checkNull($_POST['admin_pass']) ||
                    Validate::checkLength($_POST['admin_pass'],6,'lt')) {
                    Tools::alertBack("警告:密码长度最少6位非空字符!");
                }
                if (!Validate::checkConsistency($_POST['admin_pass'], $_POST['admin_pass_check'])) {
                    Tools::alertBack("警告:两次填写密码不一致!");
                }
                $this->manage->pass_flag=true;
            }else{
                $this->manage->pass_flag=false;
            }
            $this->manage->id=$_POST['id'];
            $this->manage->admin_pass=md5($_POST['admin_pass']);
            $this->manage->admin_level=$_POST['admin_level'];
            if (1 == $this->manage->updateManage() || 0 == $this->manage->updateManage()) {
                Tools::alertLocation('修改操作成功！',$_POST['prev_url']);
            }else{
                Tools::alertBack('操作失败,请重试!');
                    }
            }
        if (isset($_GET['id']) && preg_match('/^\d+$/',$_GET['id'])) {
            $this->manage->id=$_GET['id'];
            is_object($this->manage->getSingleManage()) && !empty($this->manage->getSingleManage())
                                                ?true:Tools::alertBack('传输参数错误');

            $levelModel=new LevelModel();
            $this->tpl->assign('admin_name',$this->manage->getSingleManage()->admin_name);
            $this->tpl->assign('id',$this->manage->id);
            $this->tpl->assign('allLevel',$levelModel->getAllLevel());
            $this->tpl->assign('level',$this->manage->getSingleManage()->admin_level);
            $this->tpl->assign('show',false);
            $this->tpl->assign('update',true);
            $this->tpl->assign('delete',false);
            $this->tpl->assign('add',false);
            $this->tpl->assign('title','修改管理员');
            $this->tpl->assign('prev_url',PREV_URL);
        }
    }
}