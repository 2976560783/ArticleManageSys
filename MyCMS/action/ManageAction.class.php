<?php 
/**
* \
*/
class ManageAction extends Action
{

    function __construct(&$tpl)
    {
        parent::__construct($tpl,new Manages());
        $this->action();
    }

    private function action(){
        switch ($_GET['action']) {
            case 'add':
                $this->add();
                break;

            case 'delete':
                $this->delete();
                break;

            case 'list':
                $this->show();
                break;

            case 'update':
                $this->update();
                break;

            default:
                Tools::alertBack('非法操作');
                break;
         }
    }

    //添加管理员
    public function add(){
        if (isset($_POST['addManager'])) {
                $this->manage->admin_name=$_POST['admin_name'];
                $this->manage->admin_level=$_POST['admin_level'];
                $this->manage->admin_pass=md5($_POST['admin_pass']);
          if (1 == $this->manage->addManage()) {
              Tools::alertLocation('添加管理员成功！', 'manage.php?action=list');
          }else{
              Tools::alertBack('很遗憾，添加管理员失败，请重试!');
          }
        }
        $this->tpl->assign('add',true);
        $this->tpl->assign('list',false);
        $this->tpl->assign('update',false);
        $this->tpl->assign('delete',false);
        $this->tpl->assign('title','添加管理员');
    }

    //删除管理员
    public function delete(){
        if (isset($_GET['id'])) {
            $this->manage->id=$_GET['id'];
            if (1 == $this->manage->deleteManage()) {
                Tools::alertLocation('删除操作成功！','manage.php?action=list');
            }else{
                Tools::alertBack('删除失败，请稍后重试!');
            }
        }
        $this->tpl->assign('list',false);
        $this->tpl->assign('delete',true);
        $this->tpl->assign('update',false);
        $this->tpl->assign('add',false);
        $this->tpl->assign('title','删除管理员');
    }

    //展示全部管理员
    public function show(){
        $this->tpl->assign('list',true);
        $this->tpl->assign('update',false);
        $this->tpl->assign('delete',false);
        $this->tpl->assign('add',false);
        $this->tpl->assign('title','管理员列表');
        $this->tpl->assign('AllManagers',$this->manage->getAllManage());
    }


    //更新管理员
    public function update(){
        if (isset($_POST['updateManager'])) {
            $this->manage->id=$_POST['id'];
            $this->manage->admin_pass=$_POST['admin_pass'];
            $this->manage->admin_level=$_POST['admin_level'];
            if (1 == $this->manage->updateManage()) {
                Tools::alertLocation('修改操作成功！','manage.php?action=list');
            }else{
                Tools::alertBack('操作失败,请重试!');
                    }
            }
        if (isset($_GET['id']) && preg_match('/^\d+$/',$_GET['id'])) {
            $this->manage->id=$_GET['id'];
            is_object($this->manage->getSingleManage()) && !empty($this->manage->getSingleManage())
                                                ?true:Tools::alertBack('传输参数错误');
            $this->tpl->assign('admin_name',$this->manage->getSingleManage()->admin_name);
            $this->tpl->assign('id',$this->manage->id);
            $this->tpl->assign('level',$this->manage->getSingleManage()->admin_level);
        }
        $this->tpl->assign('list',false);
        $this->tpl->assign('update',true);
        $this->tpl->assign('delete',false);
        $this->tpl->assign('add',false);
        $this->tpl->assign('title','修改管理员');
    }
}